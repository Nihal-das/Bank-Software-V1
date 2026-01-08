@if (session('error'))
        <div
            id="error-message"
            class="mx-auto mt-6 w-fit rounded-full bg-red-600/90 px-6 py-3 text-white shadow-lg transition-all duration-300"
        >
            {{ session('error') }}
        </div>
    @endif

    <script>
        setTimeout(() => {
            const el = document.getElementById('error-message');
            if (el) el.classList.add('opacity-0', 'translate-y-2');
        }, 3000);
    </script>