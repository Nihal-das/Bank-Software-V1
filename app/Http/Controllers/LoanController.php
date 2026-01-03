<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\Entry;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    // Show loan form
    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        return view('loans.create', compact('customers'));
    }

    // Give loan
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric|min:1',
            'mode'        => 'required|in:CASH,BANK',
        ]);

        DB::transaction(function () use ($request) {

            $tx = Transaction::create([
                'customer_id' => $request->customer_id,
                'type'        => 'LOAN',
                'remarks'     => 'Loan Given',
            ]);

            // Cash / Bank decreases
            Entry::create([
                'transaction_id' => $tx->id,
                'account_type'   => $request->mode,
                'debit'          => 0,
                'credit'         => $request->amount,
            ]);

            // Loan outstanding increases
            Entry::create([
                'transaction_id' => $tx->id,
                'account_type'   => 'LOAN',
                'account_id'     => $request->customer_id,
                'debit'          => $request->amount,
                'credit'         => 0,
            ]);
        });

        return back()->with('success', 'Loan given successfully');
    }

    // Show repayment form
    public function repay_form()
    {
        $customers = DB::table('entries')
            ->join('customers', 'customers.id', '=', 'entries.account_id')
            ->where('entries.account_type', 'LOAN')
            ->groupBy('customers.id', 'customers.name', 'customers.account_number')
            ->havingRaw('SUM(entries.debit) > SUM(entries.credit)')
            ->select(
                'customers.id',
                'customers.name',
                'customers.account_number',
                DB::raw('SUM(entries.debit - entries.credit) AS loan_balance')
            )
            ->orderBy('customers.name')
            ->get();

        return view('loans.repay', compact('customers'));
    }

    // Loan repayment
    public function repay(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric|min:1',
            'mode'        => 'required|in:CASH,BANK',
        ]);

        $loanBalance =
            Entry::where('account_type', 'LOAN')
            ->where('account_id', $request->customer_id)
            ->sum('debit')
            -
            Entry::where('account_type', 'LOAN')
            ->where('account_id', $request->customer_id)
            ->sum('credit');

        if ($loanBalance < $request->amount) {
            return back()->with('error', 'Repayment exceeds loan balance');
        }

        DB::transaction(function () use ($request) {

            $tx = Transaction::create([
                'customer_id' => $request->customer_id,
                'type'        => 'LOAN_REPAY',
                'remarks'     => 'Loan Repayment',
            ]);

            // Cash / Bank increases
            Entry::create([
                'transaction_id' => $tx->id,
                'account_type'   => $request->mode,
                'debit'          => $request->amount,
                'credit'         => 0,
            ]);

            // Loan outstanding decreases
            Entry::create([
                'transaction_id' => $tx->id,
                'account_type'   => 'LOAN',
                'account_id'     => $request->customer_id,
                'debit'          => 0,
                'credit'         => $request->amount,
            ]);
        });

        return back()->with('success', 'Loan repaid successfully');
    }
}
