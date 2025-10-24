@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Roles</h1>
        </div>

        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de roles</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nuevo rol</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar rol</a>
                </li>
            </ul>
        </div>

        <p>
            Este módulo se encarga de gestionar los roles y permisos de los usuarios que participarán en la feria virtual.
            Los roles definen las funciones y responsabilidades de cada usuario dentro del sistema.
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
            <p>Para editar un rol, simplemente selecciona el rol deseado y realiza las ediciones necesarias. Esto se
                hace seleccionando los campos mostrados en la lista de roles.</p>
        </blockquote>

        <h2><a href='#status' id='status'>Listado de roles</a></h2>

        <p>
            Se muestran todos los roles existentes, incluyendo información relevante como nombre, descripción y permisos asociados.
        </p>
        <p>
            <picture alt='Imagen del módulo de roles, listado de roles'>
                <img src="{{asset('documentacion/roles/roles-lista.png')}}" alt="modulo-roles">
            </picture>
        </p>

        <h2><a href='#create' id='create'>Crear nuevo rol</a></h2>
        <p>
            Para crear un nuevo rol, simplemente llena el formulario indicando el nombre y la descripción del rol, así como los permisos asociados.
        </p>

        <p>
            <picture alt='Imagen del módulo de roles, crear nuevo rol'>
                <img src="{{asset('documentacion/roles/rol-crear.png')}}" alt="modulo-roles">
            </picture>
        </p>

        <h2><a href='#edit' id='edit'>Editar rol</a></h2>
        <p>
            Para editar un rol, selecciona el rol que deseas editar y realiza las modificaciones necesarias en el nombre, la descripción o los permisos asociados.
        </p>

        <picture alt='Imagen del módulo de roles, selección de rol para edición'>
            <img src="{{asset('documentacion/roles/rol-seleccionar.png')}}" alt="modulo-roles">
        </picture>

        <picture alt='Imagen edición de rol'>
            <img src="{{asset('documentacion/roles/rol-editar.png')}}" alt="modulo-roles">
        </picture>
    </main>
@endsection
