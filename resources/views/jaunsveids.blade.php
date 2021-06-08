<!DOCTYPE html>
<html>
<head>
<title>Jauns izstrādājums</title>
</head>
<body>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Izveidot jaunu izstrādājuma veidu
    </h2>
    <form method="POST" action="{{ action([App\Http\Controllers\VeidsController::class, 'store']) }}">
        @csrf

        <!-- Nosaukums -->
        <div>
            <label for="nosaukums" value="Nosaukums" />

            <input id="nosaukums" class="block mt-1 w-full" type="text" name="nosaukums" required autofocus :value="old(nosaukums)"/>

            <validation-error class="mb-4" :errors="$errors" title="n"/>          
        </div>
        <div class="flex items-center justify-end mt-4">
            <button class="ml-4">
                Saglabāt
            </button>
        </div>
    </form>
    </body>
</html>