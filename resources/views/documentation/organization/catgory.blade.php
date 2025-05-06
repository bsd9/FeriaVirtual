@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Categorías</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de categorías</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nueva categoría</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar categoría</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar la información sobre las categorías disponibles en la feria virtual.
            Las categorías son importantes para organizar y clasificar los diferentes elementos de la feria, como los stands, expositores y eventos.
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
            <p>Para editar una categoría, simplemente selecciona la categoría deseada y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de categorías.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de categorías</a></h2>

        <p>
            Se muestran todas las categorías existentes, incluyendo información relevante como nombre, descripción, etc.
        </p>
        <p>
            <picture alt='Imagen del módulo de categorías, listado de categorías'>
                <img src="{{asset('documentacion/organizacion/list.png')}}" alt="modulo-categorias">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nueva categoría</a></h2>
        <p>
            Para crear una nueva categoría, simplemente llena el formulario indicando los campos obligatorios y opcionales, como el nombre y la descripción de la categoría.
        </p>

        <p>
            <picture alt='Imagen del módulo de categorías, crear nueva categoría'>
                <img src="{{asset('documentacion/organizacion/create.png')}}" alt="modulo-categorias">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar categoría</a></h2>
        <p>
            Para editar una categoría, selecciona la categoría que deseas editar y realiza las modificaciones necesarias, como el nombre o la descripción.
        </p>

        <picture alt='Imagen del módulo de categorías, selección de categoría para edición'>
            <img src="{{asset('documentacion/organizacion/select.png')}}" alt="modulo-categorias">
        </picture>

        <picture alt='Imagen edición de categoría'>
            <img src="{{asset('documentacion/organizacion/edit.png')}}" alt="modulo-categorias">
        </picture>
    </main>
@endsection
