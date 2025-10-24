@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Asistentes</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de asistentes</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo asistente</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar asistente</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre los asistentes registrados para participar en la feria
            virtual. Los asistentes son fundamentales para el éxito del evento, ya que representan a la audiencia objetivo.
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
            <p>Para editar un asistente, simplemente selecciona el asistente deseado y realiza las ediciones necesarias.
                Esto se hace seleccionando los campos mostrados en la lista de asistentes.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de asistentes</a></h2>

        <p>
            Se muestran todos los asistentes registrados, incluyendo información relevante como <span
                class="text-primary">nombre, apellido, email, teléfono, etc.</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de asistentes, listado de asistentes'>
                <img src="{{asset('documentacion/expositoresAsistentes/asiste-create.png')}}" alt="modulo-asistentes">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo asistente</a></h2>
        <p>
            Para crear un nuevo asistente, simplemente llena el formulario indicando los campos obligatorios y opcionales.
            El formulario está diseñado para facilitar el registro de nuevos asistentes.
        </p>

        <p>
            <picture alt='Imagen del módulo de asistentes, crear nuevo asistente'>
                <img src="{{asset('documentacion/expositoresAsistentes/asistem-create.png')}}" alt="modulo-asistentes">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar asistente</a></h2>
        <p>
            Para editar un asistente, selecciona el asistente que deseas editar y realiza las modificaciones necesarias.
            Puedes editar campos como <span class="text-primary">nombre, apellido, email, teléfono, etc.</span>
        </p>

        <picture alt='Imagen del módulo de asistentes, selección de asistente para edición'>
            <img src="{{asset('documentacion/expositoresAsistentes/asiste-select.png')}}" alt="modulo-asistentes">
        </picture>

        <picture alt='Imagen edición de asistente'>
            <img src="{{asset('documentacion/expositoresAsistentes/asistem-edit.png')}}" alt="modulo-asistentes">
        </picture>
    </main>
@endsection
