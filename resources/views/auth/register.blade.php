<x-layout>
    <x-slot:heading>Register</x-slot:heading>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">
                Create your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/register" method="POST" class="space-y-6">
                @csrf


                <!--Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-100">
                        Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="mt-2 block w-full rounded-md bg-white/5 px-3 py-1.5 text-white  outline-1 outline-white/10 focus:outline-indigo-500"
                        required
                    />
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-100">
                        Email address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="mt-2 block w-full rounded-md bg-white/5 px-3 py-1.5 text-white outline-1 outline-white/10 focus:outline-indigo-500"
                        required
                    />
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-100">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="mt-2 block w-full rounded-md bg-white/5 px-3 py-1.5 text-white  outline-1 outline-white/10 focus:outline-indigo-500"
                        required
                    />
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-100">
                        Confirm password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="mt-2 block w-full rounded-md bg-white/5 px-3 py-1.5 text-white  outline-1 outline-white/10 focus:outline-indigo-500"
                        required
                    />
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full rounded-md bg-indigo-500 py-2 text-sm font-semibold text-white hover:bg-indigo-400"
                >
                    Register
                </button>
            </form>

            <p class="mt-10 text-center text-sm text-gray-400">
                Already a member?
                <a href="/login" class="font-semibold text-indigo-400 hover:text-indigo-300">
                    Log in
                </a>
            </p>
        </div>
    </div>
</x-layout>
