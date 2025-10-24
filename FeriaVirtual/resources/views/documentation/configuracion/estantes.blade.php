@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Stands</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de stands</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo stand</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar stand</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre los stands disponibles en la feria. Es importante
            destacar que los stands son elementos clave para la participación de los expositores en la feria virtual.
        </p>

        <blockquote>
            <p>En Fair360, al mostrar las diferentes listas de cada módulo, se presenta una columna llamada "Actions", donde
                se pueden realizar acciones como:</p>
            <ul>
                <li class="anchor-h2">Editar</li>
                <li class="anchor-h2">Eliminar</li>
            </ul>
        </blockquote>

        <blockquote>
            <p>Para editar un stand, simplemente selecciona el stand deseado y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de stands.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de stands</a></h2>

        <p>
            Se muestran todos los stands existentes, incluyendo información relevante como <span
                class="text-primary">imagen, nombre, ubicación, descripción, etc.</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de stands, listado de stands'>
                <img src="{{asset('documentacion/configuracion/stands-list.png')}}" alt="modulo-stands">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo stand</a></h2>
        <p>
            Para crear un nuevo stand, simplemente llena el formulario indicando los campos obligatorios y opcionales.
            El formulario está dividido en pestañas, cada una con información relevante del stand.
        </p>

        <p>
            <picture alt='Imagen del módulo de stands, crear nuevo stand'>
                <img src="{{asset('documentacion/configuracion/stand-create.png')}}" alt="modulo-stands">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar stand</a></h2>
        <p>
            Para editar un stand, selecciona el stand que deseas editar y realiza las modificaciones necesarias.
            Puedes editar campos como <span class="text-primary">nombre, ubicación, descripción, etc.</span>
        </p>

        <picture alt='Imagen del módulo de stands, selección de stand para edición'>
            <img src="{{asset('documentacion/configuracion/selection-stand-edit.png')}}" alt="modulo-stands">
        </picture>

        <picture alt='Imagen edición de stand'>
            <img src="{{asset('documentacion/configuracion/stand-edit.png')}}" alt="modulo-stands">
        </picture>
    </main>
@endsection
