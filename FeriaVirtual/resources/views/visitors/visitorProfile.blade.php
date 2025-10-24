<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin_visitors/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin_visitors/dist/css/adminlte.min.css')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<body class=" content-wrapper hold-transition sidebar-mini mt-4">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            @if($detailUser->imagen)
                                                <!-- Mostrar la imagen del visitante si tiene una -->
                                                <img id="preview-image" class="profile-user-img img-fluid img-circle"
                                                     src="{{ asset('img/profile/' . $detailUser->imagen) }}"
                                                     alt="User profile picture">
                                            @else
                                                <img id="preview-image" class="profile-user-img img-fluid img-circle"
                                                     src="{{ asset('img/Logos/logoFair360.png') }}"
                                                     alt="User profile picture">
                                            @endif
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <form method="POST" action="{{route('image.store')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" onchange="previewImage()">
                                                            <label class="custom-file-label" for="image">Elegir archivo</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <button type="submit" class="btn btn-primary btn-block">Subir</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <h3 class="profile-username text-center"></h3>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Nombre</b> <a class="text-blue float-right">{{$detailUser->first_name}} {{$detailUser->first_last_name}}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Correo Electronico:</b> <a  class="text-blue float-right">{{$detailUser->email}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">INFORMACION PERSONAL </a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">


                                            <div class="active tab-pane" id="settings">
                                                <form class="form-horizontal" method="post" action="{{route('visitor.profile.edit')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col sm-6">
                                                            <div class="form-group">
                                                                <label>Primer Nombre</label>
                                                                <input type="text" class="form-control" placeholder="Primer nombre" name="first_name" value="{{$detailUser->first_name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col sm-6">
                                                            <div class="form-group">
                                                                <label>Segundo Nombre</label>
                                                                <input type="text" class="form-control" placeholder="Segundo nombre" name="second_name" value="{{$detailUser->second_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Primer Apellido</label>
                                                                <input type="text" class="form-control" placeholder="Primer nombre" name="first_last_name" value="{{$detailUser->first_last_name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Primer Apellido</label>
                                                                <input type="text" class="form-control" placeholder="Primer nombre" name="second_last_name" value="{{$detailUser->second_last_name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Correo electronico</label>
                                                                <input type="email" class="form-control" placeholder="Correo electronico" name="email" value="{{$detailUser->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Nacionalidad</label>
                                                                <input type="text" class="form-control" placeholder="Nacionalidad" name="nationality"  value="{{$detailUser->nationality}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" class="form-control" placeholder="300 222 0222" name="phone" value="{{$detailUser->phone}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input class="custom-control-input" type="checkbox" name="accept_terms" id="acepta" {{ $detailUser->accept_terms ? 'checked' : '' }}>
                                                                        <label for="acepta" class="custom-control-label">Aceptar términos y condiciones</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input class="custom-control-input" type="checkbox" name="join_specialists_program" id="comunidad" {{ $detailUser->join_specialists_program ? 'checked' : '' }}>
                                                                        <label for="comunidad" class="custom-control-label">Hace parte de la comunidad</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="submit" class="btn btn-danger float-right">Guardar información</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @if(session('success') || session('info'))
        <script>
            $(document).ready(function() {
                var icon = '{{ session('success') ? 'success' : 'info' }}';
                var title = '{{ session('success') ? '¡Éxito!' : 'Información' }}';

                Swal.fire({
                    icon: icon,
                    title: title,
                    toast: true,
                    text: '{{ session('success') ?? session('info') }}',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin_visitors/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin_visitors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_visitors/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin_visitors/dist/js/demo.js')}}"></script>
<script>
    function previewImage() {
        var input = document.getElementById('image');
        var container = document.getElementById('imageContainer');
        var image = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.src = e.target.result;
                container.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            container.style.display = 'none';
        }
    }
</script>


</body>
</html>
