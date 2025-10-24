<div>
    <form wire:submit.prevent="submitForm">
        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold mb-2">Correo Electrónico</label>
            <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z" clip-rule="evenodd"/>
                    </svg>
                </span>
                <input
                    type="email"
                    name="email"
                    id="email"
                    wire:model="email"
                    class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                    required
                >
            </div>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold mb-2">Contraseña</label>
            <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"/>
                    </svg>
                </span>
                <input
                    type="password"
                    name="password"
                    id="password"
                    wire:model="password"
                    class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                    required
                >
            </div>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="confirmationCode" class="block text-sm font-semibold mb-2">Código de Verificación</label>
            <div class="flex items-center border border-gray-300 rounded overflow-hidden">
        <span class="text-gray-600 p-3 bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm-1 13.07a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0z" clip-rule="evenodd"/>
            </svg>
        </span>
                <input
                    type="text"
                    name="confirmationCode"
                    id="confirmationCode"
                    wire:model="confirmationCode"
                    class="w-full p-3 bg-transparent rounded-r focus:outline-none placeholder-gray-400 text-gray-800"
                    placeholder="Ej: ABCD-1234-EFGH"
                    oninput="formatConfirmationCode(this)"
                    required
                >
            </div>
            @error('confirmation_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>


        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-br from-blue-700 to-green-500 text-white py-3 px-6 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">Iniciar Sesión</button>
        </div>

        @if ($errorMessage)
            <div class="text-red-500 mt-4">{{ $errorMessage }}</div>
        @endif
    </form>
    <script>
        function formatConfirmationCode(input) {

            let cleanedInput = input.value.replace(/[^A-Za-z0-9]/g, '');

            // Limitar la longitud a 40 caracteres
            cleanedInput = cleanedInput.slice(0, 40);

            // Dividir en grupos de 10 con "-"
            let formattedCode = cleanedInput.match(/.{1,10}/g).join('-');

            // Establecer el valor formateado en el campo de entrada
            input.value = formattedCode;
        }
    </script>


</div>
