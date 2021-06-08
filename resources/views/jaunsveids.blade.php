<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Izveidot jaunu izstrādājuma veidu</h2>
    </x-slot>
    <x-form>
    <form method="POST" action="{{ action([App\Http\Controllers\VeidsController::class, 'store']) }}">
        @csrf

        <!-- Nosaukums -->
        <div>
            <x-label for="nosaukums" value="Nosaukums" />

            <x-input id="nosaukums" class="block mt-1 w-full" type="text" name="nosaukums" required autofocus :value="old(nosaukums)"/>

            <x-validation-error class="mb-4" :errors="$errors" title="n"/>          
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Saglabāt
            </x-button>
        </div>
    </form>
    </x-form>
</x-app-layout>
