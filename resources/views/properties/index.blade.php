<x-property-layout>

<x-bladewind.tab-group name="car-pics">

  <x-slot name="headings">
      <x-bladewind.tab-heading
          name="front" active="true" label="Front View" />

      <x-bladewind.tab-heading
          name="back" label="Back View" />

      <x-bladewind.tab-heading
          name="inside" label="Inside View" />

      <x-bladewind.tab-heading
          name="dashboard" label="Dashboard" />
  </x-slot>
  
  <x-bladewind.tab-body>

      <x-bladewind.tab-content name="front" active="true">
          <img src="{{ asset('images/cars/front.jpeg') }}" class="mx-auto h-80 rounded-md"
              alt="front view" />
      </x-bladewind.tab-content>

      <x-bladewind.tab-content name="back">
          <img src="{{ asset('images/cars/back.jpeg') }}" class="mx-auto h-80 rounded-md"
              alt="back view" />
      </x-bladewind.tab-content>

      <x-bladewind.tab-content name="inside">
        <img src="{{ asset('images/cars/inside.jpeg') }}" class="mx-auto h-80 rounded-md"
              alt="inside view" />
      </x-bladewind.tab-content>

      <x-bladewind.tab-content name="dashboard">
        <img src="{{ asset('images/cars/dashboard.jpeg') }}" class="mx-auto h-80 rounded-md"
              alt="dashboard view" />
      </x-bladewind.tab-content>

  </x-bladewind.tab-body>

</x-bladewind.tab-group>
</div>

</x-property-layout>