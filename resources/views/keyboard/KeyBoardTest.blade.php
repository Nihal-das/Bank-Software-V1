@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-950 text-gray-200">
    <div class="max-w-3xl mx-auto px-4 py-12">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-xl font-semibold">ND Typing Test</h1>
            <p class="text-sm text-gray-400">
                Type the exact string. Press Enter to continue.
            </p>
        </div>

        {{-- Card --}}
        <div class="rounded-xl border border-gray-800 bg-gray-900 shadow-lg p-5 space-y-4">

            {{-- Target --}}
            <div>
                <span class="text-sm text-gray-400">Target</span>
                <div
                    id="targetText"
                    class="mt-2 font-mono text-lg break-words"
                    data-target="{{ $text }}"
                >
                    {{ $text }}
                </div>
            </div>

            {{-- Input --}}
            <form method="GET" action="{{ url('/keyboard/test') }}">
                <input
                    id="userInput"
                    type="text"
                    name="typed"
                    autofocus
                    autocomplete="off"
                    class="w-full rounded-lg bg-gray-800 border border-gray-700
                           text-gray-100 font-mono px-3 py-2"
                    placeholder="Type here and press Enter"
                />
            </form>

            {{-- Status --}}
            <div class="flex gap-4 text-sm">
                <span id="statusBadge"
                      class="rounded-full px-3 py-1 border bg-gray-800 border-gray-700">
                    Waiting…
                </span>

                <span>Matched: <strong id="matchInfo">0</strong></span>
                <span>Mistakes: <strong id="mistakeInfo">0</strong></span>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const targetEl = document.getElementById('targetText');
    const inputEl = document.getElementById('userInput');
    const statusBadge = document.getElementById('statusBadge');
    const matchInfo = document.getElementById('matchInfo');
    const mistakeInfo = document.getElementById('mistakeInfo');

    const target = targetEl.dataset.target;
    let mistakes = 0;

    function render(input) {
        targetEl.innerHTML = '';
        let matched = 0;
        let localMistakes = 0;

        for (let i = 0; i < target.length; i++) {
            const span = document.createElement('span');
            span.textContent = target[i];

            if (input[i] === undefined) {
                span.className = 'text-gray-400';
            } else if (input[i] === target[i]) {
                span.className = 'text-green-400';
                matched++;
            } else {
                span.className = 'bg-red-700/60 text-red-100 rounded px-0.5';
                localMistakes++;
            }

            targetEl.appendChild(span);
        }

        matchInfo.textContent = matched;
        mistakeInfo.textContent = localMistakes;
        mistakes = localMistakes;
    }

    function updateStatus(input) {
        if (input === target) {
            statusBadge.textContent = 'PASS';
            statusBadge.className =
                'rounded-full px-3 py-1 border bg-green-900 text-green-200 border-green-700';
        } else if (input.length > target.length || mistakes > 0) {
            statusBadge.textContent = 'FAIL';
            statusBadge.className =
                'rounded-full px-3 py-1 border bg-red-900 text-red-200 border-red-700';
        } else {
            statusBadge.textContent = 'In Progress';
            statusBadge.className =
                'rounded-full px-3 py-1 border bg-indigo-900 text-indigo-200 border-indigo-700';
        }
    }

    inputEl.addEventListener('input', e => {
        render(e.target.value);
        updateStatus(e.target.value);
    });
});
</script>
@endsection
