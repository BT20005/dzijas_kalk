<!DOCTYPE html>
<html>
<head>
<title>Jauna dzija</title>
</head>
<body>
<h2 class="font-semibold text-xl text-gray-800 leading-tight">Izveidot jaunu dziju</h2>
<form method="POST" action="{{ action([App\Http\Controllers\DzijaController::class, 'store']) }}">
        @csrf

        <!--Nosaukums -->
        <div>
            <xlabel for="nosaukums" value="Nosaukums" />

            <input id="nosaukums" class="block mt-1 w-full" type="text" name="nosaukums" :value="old('nosaukums')" required autofocus />

            <validation-error class="mb-4" :errors="$errors" title="nosaukums"/>            
        </div>

        <!-- Garums -->
        <div>
            <label for="gaums" value="Garums">

            <input id="garums" class="block mt-1 w-full" type="number" name="garums" :value="old('garums')" required />

            <validation-error class="mb-4" :errors="$errors" title="garums"/>            
        </div>

        <!-- Apraksts -->
        <div>
            <x-label for="apraksts" value="Apraksts" />

            <x-textarea id="apraksts" class="block mt-1 w-full" type="text" name="apraksts" :value="old('apraksts')" />

            <validation-error class="mb-4" :errors="$errors" title="apraksts"/>            
        </div>

        <!-- Ražotājs -->
        <div>
            <label for="razotajs" value="Ražotājs" >
            
            <select id="razotajs" class="block mt-1 w-full" name="genre" :list='$razotajs' :value="old('razotajs')">

            <validation-error class="mb-4" :errors="$errors" title="razotajs"/>            
        </div>  
        <div class="flex items-center justify-end mt-4">
            <button class="ml-4">
                Izveidot
            </button>
        </div>
    </form>
</body>
</html>