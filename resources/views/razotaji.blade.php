<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Ražotāji') }}</h2>
    </x-slot>   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach ( $razotaji as $razotajs )
                    <p class='text-lg'>
                        <a href="{{ url('razotajs', $razotajs['id']) }}">{{ $razotajs->nosaukums }}</a>
                    </p>
                @endforeach
                
                <x-nav-link :href="route('razotajs.create')">
                    Izveidot jaunu 
                </x-nav-link>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>