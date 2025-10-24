@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Compañias</h1>
        </div>


        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status-companias">Listado de compañias</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create-company">Crear nueva campañia</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit-company">Editar campañia</a>
                </li>
            </ul>
        </div>

        <body>

        <p>
            Este módulo es uno de los más importantes de tal manera que está relacionado con el modulo de stands, por lo
            tanto,
            estas son las compañías afiliadas las cuales mostraran los diferentes productos en los stands presentados.

        </p>

        <blockquote>
            <p>En fair360, donde se muestran las diferentes listas de cada módulo, se presenta una columna llamada
                actions, en la cual se pueden realizar opciones como. </p>
            <ul>
                <li class="anchor-h2">
                    Editar
                </li>
                <li class="anchor-h2">
                    Eliminar
                </li>
            </ul>
        </blockquote>

        <h2><a href='#status-companias' id='status-companias'>Listado de compañías. </a></h2>

        <p>
            Se muestran todas las compañías afiliadas a la fair360, mostrando información, relevante como <span
                class="text-primary">logo, razón social, redes sociales, etc.</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de compañia, listado de compañias'>
                <img
                    src="{{asset('documentacion/configuracion/compania.png')}}"
                    alt="modulo-compañia">
            </picture>
        </p>
        <h2><a href='#create-company' id='create-company'>Crear nueva compañia</a></h2>
        <p>Para crear una nueva compañía es tan fácil como llenar un formulario el cual indica, que campos son
            opcionales y cuales no, el formulario se dividió en Taps, las cuales tienen información relevante de la
            compañía.
        </p>

        <p>
            <picture alt='Imagen del módulo de comapañia crear nueva'>
                <img
                    src="{{asset('documentacion/configuracion/create-company.png')}}"
                    alt="modulo-compañia">
            </picture>
        </p>
        <h2>Editar compañia</h2>
        <p>
            Para editar una compañía se realiza el mismo procedimiento que al momento de crear una, se llena todos los
            campos obligativos del formulario. La única diferencia es que al momento de editar el formulario ya presenta
            la información.
        </p>

        <p>
            <picture alt='Imagen del módulo de comapañia crear nueva'>
                <img
                    src="{{asset('documentacion/configuracion/create-company.png')}}"
                    alt="modulo-compañia">
            </picture>
        </p>

        </body>

    </main>
@endsection
