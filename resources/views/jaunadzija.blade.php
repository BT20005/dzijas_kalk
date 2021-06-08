<x-app-layout>
    <x-slot name="header">  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Izveidot jaunu dziju</h2>
    </x-slot>
    <x-form>
    <form method="POST" action="{{ action([App\Http\Controllers\DzijaController::class, 'store']) }}">
        @csrf

        <!--Nosaukums -->
        <div>
            <x-label for="nosaukums" value="Nosaukums" />

            <x-input id="nosaukums" class="block mt-1 w-full" type="text" name="nosaukums" :value="old('nosaukums')" required autofocus />

            <x-validation-error class="mb-4" :errors="$errors" title="nosaukums"/>            
        </div>

        <!-- Garums -->
        <div>
            <x-label for="gaums" value="Garums">

            <x-input id="garums" class="block mt-1 w-full" type="number" name="garums" :value="old('garums')" required />

            <x-validation-error class="mb-4" :errors="$errors" title="garums"/>            
        </div>

        <!-- Apraksts -->
        <div>
            <x-label for="apraksts" value="Apraksts" />

            <x-textarea id="apraksts" class="block mt-1 w-full" type="text" name="apraksts" :value="old('apraksts')" />

            <validation-error class="mb-4" :errors="$errors" title="apraksts"/>            
        </div>

        <!-- Ražotājs -->
        <div>
            <x-label for="razotajs" value="Ražotājs" />
            
            <x-select id="razotajs" class="block mt-1 w-full" name="genre" :list='$razotajs' :value="old('razotajs')"/>

            <x-validation-error class="mb-4" :errors="$errors" title="razotajs"/>            
        </div>  
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Izveidot
            </x-button>
        </div>
    </form>
    </x-form>
</x-app-layout>