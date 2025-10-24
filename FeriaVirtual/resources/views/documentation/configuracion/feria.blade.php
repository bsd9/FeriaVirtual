@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Ferias</h1>
        </div>


        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#status">Listado de ferias</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create">Crear nueva feria</a>
                </li>
                <li class="anchor-h2">
                    <a href="#edit">Editar feria</a>
                </li>
            </ul>
        </div>

        <body>

        <p>
            Este modulo se encarga de mostrar la información en la landing page, lo que indica que las imágenes son
            obligatorias. Es muy importante saber que por el momento solo es posible que existe solo un tipo de feria,
            la cual es indispensable.
        </p>
        <picture alt='Imagenes de la landing Page'>
            <img
                src="{{asset('documentacion/configuracion/imagen-prncipal.png')}}"
                alt="modulo-ferias-pagina-principal">
        </picture>

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

        <blockquote>
            <p> Para poder editar una feria es necesario seleccionarla, para realizar la edición, esto se hace
                seleccionando los campos que se muestran en la lista de feria.</p>
        </blockquote>

        <h2><a href='#status' id='status'>listado de ferias. </a></h2>

        <p>
            Se muestran todos los eventos existentes, mostrando información, relevante como <span
                class="text-primary">imagenes, razón social,categoria,  redes sociales, etc.</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de feria, listado de ferias'>
                <img
                    src="{{asset('documentacion/configuracion/feria-lis.png')}}"
                    alt="modulo-ferias">
            </picture>
        </p>
        <h2><a href='#create' id='create'>Crear nueva feria</a></h2>
        <p>Para crear una nueva feria es tan fácil como llenar un formulario el cual indica, que campos son
            opcionales y cuales no. El formulario se dividió en Taps, las cuales tienen información relevante de la feria.
        </p>

        <p>
            <picture alt='Imagen del módulo de feria crear nueva'>
                <img
                    src="{{asset('documentacion/configuracion/feria-create.png')}}"
                    alt="modulo-feria">
            </picture>
        </p>


        <h2><a href='#edit' id='edit'>Editar feria </a></h2>
        <p>
            Para editar una feria solo es necesario presionar el cliente al cual se le desea editar la
            información, puede seleccionar,<span class="text-primary">nombre, categoria, representante, ciudad</span>
        </p>

        <picture alt='Imagen del módulo de seleccionar feria para edición'>
            <img
                src="{{asset('documentacion/configuracion/seleccionar-edit.png')}}"
                alt="modulo-feria">
        </picture>

        <picture alt='Imagen edicion del feria'>
            <img
                src="{{asset('documentacion/configuracion/feria-edit.png')}}"
                alt="modulo-feria">
        </picture>




        </body>

    </main>
@endsection
