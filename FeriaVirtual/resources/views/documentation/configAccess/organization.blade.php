@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Organización</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de organizadores</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo organizador</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar organizador</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre los organizadores que participarán en la feria virtual.
            Los organizadores son fundamentales para coordinar y administrar el evento de manera eficiente.
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
            <p>Para editar un organizador, simplemente selecciona el organizador deseado y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de organizadores.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de organizadores</a></h2>

        <p>
            Se muestran todos los organizadores existentes, incluyendo información relevante como nombre, correo electrónico, teléfono,
            cargo, etc.
        </p>
        <p>
            <picture alt='Imagen del módulo de organizadores, listado de organizadores'>
                <img src="{{asset('documentacion/access/organizacion-lis.png')}}" alt="modulo-organizadores">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo organizador</a></h2>
        <p>
            Para crear un nuevo organizador, simplemente llena el formulario indicando los campos obligatorios y opcionales.
            El formulario está diseñado para facilitar el registro de nuevos organizadores.
        </p>

        <p>
            <picture alt='Imagen del módulo de organizadores, crear nuevo organizador'>
                <img src="{{asset('documentacion/access/organizacion-crear.png')}}" alt="modulo-organizadores">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar organizador</a></h2>
        <p>
            Para editar un organizador, selecciona el organizador que deseas editar y realiza las modificaciones necesarias.
            Puedes editar campos como nombre, correo electrónico, teléfono, cargo, etc.
        </p>

        <picture alt='Imagen del módulo de organizadores, selección de organizador para edición'>
            <img src="{{asset('documentacion/access/organizacion-select-2.png')}}" alt="modulo-organizadores">
        </picture>

    </main>
@endsection
