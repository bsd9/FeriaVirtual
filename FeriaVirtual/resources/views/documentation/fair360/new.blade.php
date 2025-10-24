@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Noticias</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de noticias</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nueva noticia</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar noticia</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre las noticias relacionadas con la feria virtual.
            Las noticias son una forma importante de mantener informados a los asistentes y expositores sobre novedades, actualizaciones y eventos especiales.
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
            <p>Para editar una noticia, simplemente selecciona la noticia deseada y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de noticias.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de noticias</a></h2>

        <p>
            Se muestran todas las noticias existentes, incluyendo información relevante como título, fecha, contenido, etc.
        </p>
        <p>
            <picture alt='Imagen del módulo de noticias, listado de noticias'>
                <img src="{{asset('documentacion/noticias/noticia-lista.png')}}" alt="modulo-noticias">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nueva noticia</a></h2>
        <p>
            Para crear una nueva noticia, simplemente llena el formulario indicando los campos obligatorios y opcionales, como el título y el contenido de la noticia.
        </p>

        <p>
            <picture alt='Imagen del módulo de noticias, crear nueva noticia'>
                <img src="{{asset('documentacion/noticias/noticia-crear.png')}}" alt="modulo-noticias">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar noticia</a></h2>
        <p>
            Para editar una noticia, selecciona la noticia que deseas editar y realiza las modificaciones necesarias, como el título, el contenido o la fecha.
        </p>

        <picture alt='Imagen del módulo de noticias, selección de noticia para edición'>
            <img src="{{asset('documentacion/noticias/noticia-seleccionar.png')}}" alt="modulo-noticias">
        </picture>

        <picture alt='Imagen edición de noticia'>
            <img src="{{asset('documentacion/noticias/noticia-editar.png')}}" alt="modulo-noticias">
        </picture>
    </main>
@endsection
