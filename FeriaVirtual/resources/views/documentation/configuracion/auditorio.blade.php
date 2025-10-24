@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Auditorio</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de eventos</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo evento</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar evento</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre los eventos que se llevarán a cabo en el auditorio.
            Los eventos en el auditorio son fundamentales para proporcionar contenido relevante y atractivo a los asistentes
            a la feria virtual.
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
            <p>Para editar un evento, simplemente selecciona el evento deseado y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de eventos.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de eventos</a></h2>

        <p>
            Se muestran todos los eventos existentes, incluyendo información relevante como <span
                class="text-primary">nombre, fecha, hora, descripción, etc.</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de auditorio, listado de eventos'>
                <img src="{{asset('documentacion/configuracion/audirotio-list.png')}}" alt="modulo-auditorio">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo evento</a></h2>
        <p>
            Para crear un nuevo evento, simplemente llena el formulario indicando los campos obligatorios y opcionales.
            El formulario está diseñado para facilitar la programación de eventos en el auditorio.
        </p>

        <p>
            <picture alt='Imagen del módulo de auditorio, crear nuevo evento'>
                <img src="{{asset('documentacion/configuracion/auditorio-crear.png')}}" alt="modulo-auditorio">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar evento</a></h2>
        <p>
            Para editar un evento, selecciona el evento que deseas editar y realiza las modificaciones necesarias.
            Puedes editar campos como <span class="text-primary">nombre, fecha, hora, descripción, etc.</span>
        </p>

        <picture alt='Imagen del módulo de auditorio, selección de evento para edición'>
            <img src="{{asset('documentacion/configuracion/auditorios-select.png')}}" alt="modulo-auditorio">
        </picture>

        <picture alt='Imagen edición de evento'>
            <img src="{{asset('documentacion/configuracion/auditorio-crear.png')}}" alt="modulo-auditorio">
        </picture>
    </main>
@endsection
