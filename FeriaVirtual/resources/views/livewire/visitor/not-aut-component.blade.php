<div>
    <div class="text-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 lg:h-10 lg:w-10 text-green-500 mb-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10 2a2 2 0 012 2v2h2a2 2 0 110 4h-1v2h1a2 2 0 110 4h-2v2a2 2 0 11-4 0v-2H7a2 2 0 110-4H6v-2h1a2 2 0 110-4H8V4a2 2 0 012-2zM8 4v2h4V4a2 2 0 10-4 0zm7 8v-2h-1V8a4 4 0 10-8 0v4H5v2h1v2H4a1 1 0 010-2h1v-2H4a1 1 0 010-2H3a1 1 0 010-2h1V8a6 6 0 1112 0v4h1v2h-1a1 1 0 010-2h1z"/>
        </svg>

        <h2 class="text-xl lg:text-2xl font-bold mb-2">¡Inicie sesion!</h2>
    </div>
    @if (!Auth::guard('visitor')->check())
        @if ($errorMessage)
            <div class="text-red-500 text-sm">{{ $errorMessage }}</div>
        @endif
        <form method="POST" wire:submit.prevent="submitForm" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">Correo Electrónico</label>
                <div class="flex items-center border border-gray-300 rounded">
            <span class="text-gray-600 p-3">
                <!-- Ícono de correo electrónico -->
            </span>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                        required
                        wire:model="email"
                    >
                </div>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold mb-2">Contraseña</label>
                <div class="flex items-center border border-gray-300 rounded">
            <span class="text-gray-600 p-3">
                <!-- Ícono de contraseña -->
            </span>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                        required
                        wire:model="password"
                    >
                </div>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-br from-blue-700 to-green-500 text-white py-3 px-6 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">Iniciar Sesión</button>
            </div>
        </form>

    @endif
    <div class="text-center text-sm mt-4">
        <p class="text-gray-600">¿No está registrado? <a href="{{route('visitor.create')}}" class="text-blue-500">Regístrate aquí</a></p>
    </div>
</div>
