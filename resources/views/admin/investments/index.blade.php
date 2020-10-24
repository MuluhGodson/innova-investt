<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Investments') }}
        </h2>
    </x-slot>

    <div class="mt-5">
    	<livewire:orders />
    </div>
</x-app-layout>