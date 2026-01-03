<x-layout>
    <x-slot:heading> Create Customer </x-slot:heading>


     @if (session('success'))
               <div id="success-message" class="rounded-lg bg-green-600 px-6 py-3 text-white text-center shadow-lg animate-bounce">
                {{ session('success') }}
            </div>
            @endif

             <script>
        setTimeout(() => {
            const el = document.getElementById('success-message');
            if (el) {
                el.style.display = 'none';
            }
        }, 3000);
    </script>


</form>
    <div class="mx-20 my-20 pb-52">
        <form action="{{ route('customers.store') }}" method="POSt" >
            @csrf
            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12">
                    <h2 class="text-4xl font-semibold text-white">
                        Create new Customer
                    </h2>
                    <p class="mt-1 text-xl text-gray-400">
                        Please enter the customer details
                    </p>

                    <div
                        class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-4">
                            <label
                                for="name"
                                class="block text-xl font-medium  text-white"
                                >Name</label
                            >
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500"
                                >
                                   
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        placeholder="Raj Ram"
                                        class="block grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                                    />
                                </div>

                                @error('name')
                                <p  class="mt-1 text-red-500 font-semibold" >{{ $message }}</p>
                                    
                                @enderror
                            </div>
                        </div>

                         <div class="sm:col-span-4">
                            <label
                                for="Phone"
                                class="block text-xl font-medium  text-white"
                                >Phone</label
                            >
                            <div class="mt-2">
                                <div
                                    class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500"
                                >
                                   
                                    <input
                                        id="Phone"
                                        type="text"
                                        name="Phone"
                                        placeholder="1234567890"
                                        class="block  grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6"
                                    />
                                </div>
                                  @error('Phone')
                                <p class="mt-1 text-red-500 font-semibold" >{{ $message }}</p>
                                    
                                @enderror
                            </div>
                        </div>
                    
                      

            <div class="-mr-20 mt-6 flex items-center justify-end gap-x-6">
                
                <button
                    type="submit"
                    class="rounded-md bg-indigo-500 font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 px-4 py-2 text-lg hover:translate-y-[-2px] hover:shadow-lg hover:bg-green-600  hover:font-extrabold hover:text-sm transition-all duration-200"
                >
                    Save
                </button>

            </div>
           
        </form>

        

    </div>
     

</x-layout>
