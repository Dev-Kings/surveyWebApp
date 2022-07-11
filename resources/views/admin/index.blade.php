<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Admin Panel
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3">
                <x-bladewind.card class="cursor-pointer hover:shadow-gray-300 mx-auto">
                    <img src="{{ asset('images/farm.svg') }}" class="w-14 h-14 rounded-md"><br>
                    <span class="text-center ...">Lands</span><br>
                    <span class="text-center ...">Total :
                        {{ App\Models\Land::all()->count() }}
                    </span>
                </x-bladewind.card>
            
                <x-bladewind.card class="cursor-pointer hover:shadow-gray-300 mx-auto">
                    <img src="{{ asset('images/real-estate-house.svg') }}" class="w-14 h-14 rounded-md"><br>
                    <span class="text-center ...">Properties</span>
                </x-bladewind.card>
            
                <x-bladewind.card class="cursor-pointer hover:shadow-gray-300 mx-auto">
                    <img src="{{ asset('images/car.svg') }}" class="w-14 h-14 rounded-md"><br>
                    <span class="text-center ...">Other properties</span>
                </x-bladewind.card>
            </div>

        </div>
    </div>
</x-admin-layout>
