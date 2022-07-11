<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.lands.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Lands Homepage</a>
                </div>
                <div class="flex flex-col">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{ route('admin.lands.store') }}">
                            @csrf
                          <div class="sm:col-span-6 p-1">
                            <label for="land_location" class="block text-sm font-medium text-gray-700"> Land Location </label>
                            <div class="mt-1">
                              <input type="text" id="land_location" name="land_location" placeholder="E.g Waitaluk Centre" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('land_location')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="sm:col-span-6 p-2">
                            <label for="land_size" class="block text-sm font-medium text-gray-700"> Land Size </label>
                            <div class="mt-1">
                              <input type="text" id="land_size" name="land_size" placeholder="E.g 0.8 Acres" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('land_size')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="sm:col-span-6 p-2">
                            <label for="land_price" class="block text-sm font-medium text-gray-700"> Land Price </label>
                            <div class="mt-1">
                              <input type="text" id="land_price" placeholder="E.g 3 M/Acre" name="land_price" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('land_price')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="sm:col-span-6 p-2">
                            <label for="land_description" class="block text-sm font-medium text-gray-700"> Land Description </label>
                            <div class="mt-1">
                              <input type="textarea" id="land_description" placeholder="E.g Land status, title deed,..." name="land_description" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('land_description')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>

                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-green-700 rounded-md">Create</button>
                          </div>

                          {{-- <x-bladewind.notification />
                          <x-bladewind.button 
                                size="big"
                                can_submit="true"
                                onclick="showNotification(
                                    'Details Added Successfully',
                                    'Land Details Saved')">
                                Create
                          </x-bladewind.button> --}}

                        </form>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>