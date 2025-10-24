<div>
    <div class="text-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 lg:h-10 lg:w-10 text-green-500 mb-4"
             viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M10 2a2 2 0 012 2v2h2a2 2 0 110 4h-1v2h1a2 2 0 110 4h-2v2a2 2 0 11-4 0v-2H7a2 2 0 110-4H6v-2h1a2 2 0 110-4H8V4a2 2 0 012-2zM8 4v2h4V4a2 2 0 10-4 0zm7 8v-2h-1V8a4 4 0 10-8 0v4H5v2h1v2H4a1 1 0 010-2h1v-2H4a1 1 0 010-2H3a1 1 0 010-2h1V8a6 6 0 1112 0v4h1v2h-1a1 1 0 010-2h1z"/>
        </svg>
    </div>
    <form wire:submit.prevent="submitForm" method="POST" class="w-full mx-auto">
        @csrf
        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                              clip-rule="evenodd"/>
                    </svg>
                </span>
                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        wire:model="first_name"
                        class="w-full p-2 bg-transparent rounded-r focus:outline-none"
                        required
                        placeholder="Primer Nombre"
                    >
                </div>
                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="w-1/2 ml-2">
                <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                              clip-rule="evenodd"/>
                    </svg>
                </span>
                    <input
                        type="text"
                        name="second_name"
                        id="second_name"
                        wire:model="second_name"
                        class="w-full p-2 bg-transparent rounded-r focus:outline-none"
                        required
                        placeholder="Segundo Nombre"
                    >
                </div>
                @error('first_last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                              clip-rule="evenodd"/>
                    </svg>
                </span>
                    <input
                        type="text"
                        name="first_last_name"
                        id="first_last_name"
                        wire:model="first_last_name"
                        class="w-full p-2 bg-transparent rounded-r focus:outline-none"
                        required
                        placeholder="Primer Apellido"
                    >
                </div>
                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="w-1/2 ml-2">
                <div class="flex items-center border border-gray-300 rounded">
                <span class="text-gray-600 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                              clip-rule="evenodd"/>
                    </svg>
                </span>
                    <input
                        type="text"
                        name="second_last_name"
                        id="second_last_name"
                        wire:model="second_last_name"
                        class="w-full p-2 bg-transparent rounded-r focus:outline-none"
                        required
                        placeholder="Segundo Apellido"
                    >
                </div>
                @error('first_last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <div class="flex items-center border border-gray-300 rounded">
        <span class="text-gray-600 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                      clip-rule="evenodd"/>
            </svg>
        </span>
                <input
                    type="email"
                    name="email"
                    id="email"
                    wire:model="email"
                    class="w-full p-2 text-sm bg-transparent rounded-r focus:outline-none"
                    required
                    placeholder="Correo Electrónico"
                >
            </div>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex mb-4">
            <div class="w-1/2 mr-2">
                <div class="mb-4">
                    <div class="flex items-center border border-gray-300 rounded">
            <span class="text-gray-600 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"
                          clip-rule="evenodd"/>
                </svg>
            </span>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            wire:model="phone"
                            class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                            required
                            placeholder="Número de Teléfono"
                        >
                    </div>
                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="w-1/2 mr-2">
                <div class="mb-4">
                    <select
                        name="gender"
                        id="gender"
                        wire:model="gender"
                        class="w-full p-2 bg-transparent rounded-r focus:outline-none"
                        required
                    >
                        <option value="seleccionar" disabled selected>Seleccionar</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="mb-4">

            <div class="flex items-center border border-gray-300 rounded">
            <span class="text-gray-600 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"/>
                </svg>
            </span>
                <input
                    type="password"
                    name="password"
                    wire:model="password"
                    id="password"
                    class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                    required
                    placeholder="**********"
                >
            </div>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">

            <div class="flex items-center border border-gray-300 rounded">
            <span class="text-gray-600 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"/>
                </svg>
            </span>
                <input
                    type="nationality"
                    name="nationality"
                    wire:model="nationality"
                    id="password"
                    class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                    required
                    placeholder="Nacionalidad"
                >
            </div>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="accept_terms" class="flex items-center">
                <input
                    type="checkbox"
                    name="accept_terms"
                    wire:model="accept_terms"
                    id="accept_terms"
                    class="mr-2 "
                    required
                    value="1"
                >
                <span class="text-sm">Acepto los términos y condiciones</span>
            </label>
            @error('accept_terms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="join_specialists_program" class="flex items-center">
                <input
                    type="checkbox"
                    name="join_specialists_program"
                    id="join_specialists_program"
                    wire:model="join_specialists_program"
                    class="mr-2"
                    required
                    value="1"
                >
                <span class="text-sm">Acepto las políticas</span>
            </label>
            @error('join_specialists_program') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <input type="hidden" wire:model="ipAddress">

        <div class="flex justify-end mb-4">
            <button type="submit"
                    class="bg-gradient-to-br from-blue-700 to-green-500 text-white py-3 px-6 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">
                Registrarse
            </button>
        </div>
    </form>
</div>
