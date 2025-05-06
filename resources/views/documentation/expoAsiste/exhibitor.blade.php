@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Expositores</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de expositores</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo expositor</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar expositor</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre los expositores que participarán en la feria virtual.
            Los expositores son fundamentales para mostrar productos y servicios a los asistentes.
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
            <p>Para editar un expositor, simplemente selecciona el expositor deseado y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de expositores.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de expositores</a></h2>

        <p>
            Se muestran todos los expositores existentes, incluyendo información relevante como nombre, imagen, categoría,
            redes sociales, etc.
        </p>
        <p>
            <picture alt='Imagen del módulo de expositores, listado de expositores'>
                <img src="{{asset('documentacion/expositoresAsistentes/exhbitor-list.png')}}" alt="modulo-expositores">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo expositor</a></h2>
        <p>
            Para crear un nuevo expositor, simplemente llena el formulario indicando los campos obligatorios y opcionales.
            El formulario está diseñado para facilitar el registro de nuevos expositores.
        </p>

        <p>
            <picture alt='Imagen del módulo de expositores, crear nuevo expositor'>
                <img src="{{asset('documentacion/expositoresAsistentes/exhbitor-create.png')}}" alt="modulo-expositores">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar expositor</a></h2>
        <p>
            Para editar un expositor, selecciona el expositor que deseas editar y realiza las modificaciones necesarias.
            Puedes editar campos como nombre, categoría, representante, ciudad, etc.
        </p>

        <picture alt='Imagen del módulo de expositores, selección de expositor para edición'>
            <img src="{{asset('documentacion/expositoresAsistentes/exhbitor-select.png')}}" alt="modulo-expositores">
        </picture>

        <picture alt='Imagen edición de expositor'>
            <img src="{{asset('documentacion/expositoresAsistentes/exhbitor-edit.png')}}" alt="modulo-expositores">
        </picture>
    </main>
@endsection
