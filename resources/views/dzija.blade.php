<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dzijas info') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <p class='font-semibold text-xl'>{{ $dzija->nosaukums }}</p>
                <p class='text-lg'><strong class='font-semibold'>Ražotājs:</strong> <a href="{{ url('razotajs', $dzija->razotajs->id) }}">{{ $dzija->razotajs->nosaukums}}</a></p>
                <p class='text-lg'><strong class='font-semibold'>Garums:</strong> {{ $dzija->garums }}</p>
                @isset($dzija->apraksts)
                <p class='text-lg'><strong class='font-semibold'>Apraksts:</strong> {{ $dzija->apraksts }}</p>
            </div>
        </div>
    </div>      
</x-app-layout>
