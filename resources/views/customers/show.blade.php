<x-layout>
    <x-slot:heading> Customer Details </x-slot:heading>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-40 pb-80">
        <div class="rounded-lg border border-gray-700 bg-gray-800 p-6 shadow">
            <h2 class="text-2xl font-semibold text-white mb-4">{{ $customer->name }}</h2>
            <p class="text-gray-300 mb-2">Account Number: {{ $customer->account_number }}</p>
            <p class="text-gray-300 mb-2">Phone: {{ $customer->phone_number }}</p>
            
            <p class="text-gray-300 mb-2">Balance: {{ $customerBalance }}</p>
        </div>
    </div>
    </x-layout>