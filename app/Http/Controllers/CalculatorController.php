<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function show()
    {

        return view('calculator.show');
    }

    public function calculate(Request $request)
    {
        $expression = $request->expression;

        $result = eval("return {$request->expression};");

        return view('calculator.show', ['result' => $result, 'expression' => $expression]);
    }
}
