@extends('documentation.index')
@section('content')
    <main class="py-2 px-3 py-md-2 px-md-4 px-xl-5 ms-md-4 me-md-auto order-md-first overflow-auto">
        <div class="d-flex align-items-center mb-3 mt-3">
            <h1 class="me-3">Visitantes</h1>
        </div>


        <div class="anchors">
            <ul>
                <li class="anchor-h2">
                    <a href="#listado-visitantes">Listado de visitantes</a>
                </li>
                <li class="anchor-h2">
                    <a href="#create-edit">Crear nuevo registro y editar visitante</a>
                </li>
                <li class="anchor-h2">
                    <a href="#send-email">Enviar correos electrónicos</a>
                </li>
                <li class="anchor-h2">
                    <a href="#status-visitor">Estado del evento</a>
                </li>

            </ul>
        </div>

        <body>
        <p>
            En este módulo encontraras, el listado de visitantes al sitio, los cuales se registraron de manera exitosa,
            y los cuales son los que pueden tener el veneficio de entrar al evento principal.
        </p>

        <h2><a href='#listado-visitantes' id='listado-visitantes'>Listado de visitantes </a></h2>

        <p>
            Se muestra el listado de los visitantes los cuales se registraron, a que se pueden realizar acciones,
            las cuales tienen que ver con el cliente, como <span class="text-primary">filtrar, ordenar, cambiar de estado, enviar email, crear nuevo</span>
        </p>
        <p>
            <picture alt='Imagen del módulo de visitantes listas de visitantes'>
                <img
                    src="{{asset('documentacion/vivitantes/visitantes.png')}}"
                    alt="modulo-vivitantes">
            </picture>
        </p>
        <h2><a href='#create-edit' id='create-edit'>Crear nuevo registro y editar visitante</a></h2>
        <p>Al momento de que un visitante se registra desde la página web a este se le envía un correo electrónico a su
            correo electrónico, el cual verifica que el correo electrónico que se introdujo sea válido, con el fin de
            tener información correcta.
            por medio de petición del cliente estos datos se pueden cambiar o crear nuevo, esto en caso de que el
            usuario lo pida.
        </p>

        <p>
            <picture alt='Imagen del módulo de visitantes editar visitante'>
                <img
                    src="{{asset('documentacion/vivitantes/create.png')}}"
                    alt="modulo-vivitantes">
            </picture>
        </p>

        <blockquote>
            <p class="text-primary">La funcionalidad de realizar, para realizar la edición del visitante, esta
                funcional, pero esta desactualizada, por motivos de seguridad, a petición de fair360, se verifica si
                activa esta funcionalidad o no. </p>
        </blockquote>


        <h2>Editar visitante</h2>
        <p>
            Para crear editar un visitante solo es necesario presionar el cliente al cual se le desea editar la
            información, puede seleccionar,<span class="text-primary">apellido, correo electrónico, genero, teléfono, nacionalidad</span>
        </p>

        <picture alt='Imagen del módulo de seleccionar visitantes para edición'>
            <img
                src="{{asset('documentacion/vivitantes/edit.png')}}"
                alt="modulo-vivitantes">
        </picture>


        <h2><a href='#send-email' id='send-email'>Enviar correos electrónicos</a></h2>
        <p>Se puede enviar correos de varios tipos los cuales pueden ser, informativo, promocional y contacto.
            estos correos electrónicos se pueden enviar por masivamente o por al seleccionar un visitante y el envié el
            correo electrónico.
        </p>
        <picture alt='Enviar correo electrónico'>
            <img
                src="{{asset('documentacion/vivitantes/sends-email.png')}}"
                alt="modulo-vivitantes-enviar-email">
        </picture>

        <h2><a href='#status-visitor' id='status-visitor'>Estado del evento</a></h2>
        <p>El estado del evento indica que el visitante, puede o no acceder al evento principal, esto con el fin de que
            cada usuario debe pagar por ver el evento
            o la conferencia que se presentara en el auditorio. Esto se puede lograr al momento de que el usuario, pida
            por llamada que se le habilite la opción de entrar al auditorio.
        </p>
        <picture alt='Estado del visitante'>
            <img
                src="{{asset('documentacion/vivitantes/status.png')}}"
                alt="modulo-vivitantes-cambiar-estado">
        </picture>
        <blockquote>
            <p>Al momento de registrarse el estado del usuario será 0 lo que indica que el evento no esta disponible
                para este visitante, por lo tanto, debe comunicarse con soporte para, esta funcionalidad se active. </p>
        </blockquote>

        </body>

    </main>
@endsection
