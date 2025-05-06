@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Fachadas</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de fachadas</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nueva fachada</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar fachada</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre las fachadas de los stands en la feria virtual.
            Las fachadas son la primera impresión que tienen los asistentes de cada stand, por lo que son elementos clave para el éxito del evento.
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
            <p>Para editar una fachada, simplemente selecciona la fachada deseada y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de fachadas.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de fachadas</a></h2>

        <p>
            Se muestran todas las fachadas existentes, incluyendo información relevante como nombre, imagen, descripción, etc.
        </p>
        <p>
            <picture alt='Imagen del módulo de fachadas, listado de fachadas'>
                <img src="{{asset('documentacion/fachadas/list.png')}}" alt="modulo-fachadas">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nueva fachada</a></h2>
        <p>
            Para crear una nueva fachada, simplemente llena el formulario indicando los campos obligatorios y opcionales, como el nombre y la imagen de la fachada.
        </p>

        <p>
            <picture alt='Imagen del módulo de fachadas, crear nueva fachada'>
                <img src="{{asset('documentacion/fachadas/crear.png.png')}}" alt="modulo-fachadas">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar fachada</a></h2>
        <p>
            Para editar una fachada, selecciona la fachada que deseas editar y realiza las modificaciones necesarias, como el nombre, la imagen o la descripción.
        </p>

        <picture alt='Imagen del módulo de fachadas, selección de fachada para edición'>
            <img src="{{asset('documentacion/fachadas/list.png')}}" alt="modulo-fachadas">
        </picture>

        <picture alt='Imagen edición de fachada'>
            <img src="{{asset('documentacion/fachadas/edit.png')}}" alt="modulo-fachadas">
        </picture>
    </main>
@endsection
