<x-layout>
    <x-slot:heading> Update Customer </x-slot:heading>
 
    <x-success-message/>  

    <div class="flex flex-auto">

    <div class="mt-16 mx-auto min-w-3xl rounded-2xl bg-white/5 p-10 shadow-xl backdrop-blur mb-28">
        
        <form action="{{ route('user.update' , $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            
            <div class="mb-10 text-center">
                <h2 class="text-4xl font-bold text-white">
                    Update Customer
                </h2>
                <p class="mt-2 text-gray-400">
                    Update Customer details below
                </p>
            </div>

            
            <div class="space-y-8">

                <h3>Old name : {{ $user->name }}</h3>
                
                <div class="relative mt-10 w-full">
                    <!-- INPUT -->
                    <input
                        id="name"
                        type="text"
                        name="name"
                        placeholder=" "
                        class="peer h-14 w-full rounded-xl border border-gray-300 bg-transparent px-4 text-sm text-white
                            focus:border-indigo-500 focus:outline-none"
                    />

                    <!-- LABEL -->
                    <label
                        for="name"
                        class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400
                            transition-all duration-300 ease-out
                            peer-focus:-top-7 peer-focus:left-3 peer-focus:text-s peer-focus:font-semibold peer-focus:text-white
                            peer-focus:translate-y-0
                            peer-[:not(:placeholder-shown)]:-top-7
                            peer-[:not(:placeholder-shown)]:left-20
                            peer-[:not(:placeholder-shown)]:text-s
                            peer-[:not(:placeholder-shown)]:font-semibold
                            peer-[:not(:placeholder-shown)]:text-white"
                    >
                        Name
                    </label>
                    </div>
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

  
            <div class="mt-12 flex justify-end">
                <button
                    type="submit"
                    class="rounded-xl bg-indigo-600 px-8 py-3 text-lg font-semibold text-white shadow-md transition-all duration-200 hover:-translate-y-1 hover:bg-green-600 hover:shadow-xl"
                >
                   Update
                </button>
            </div>
        </form>                
    </div>

    
        
    </div>
   
    

    
</x-layout>
