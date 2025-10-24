<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fair360 | User Profile</title>
    <meta name="description" content="¡Explora el perfil de usuario en AdminLTE 3 y accede a tus configuraciones y detalles personales!">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('admin_visitors/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_visitors/dist/css/adminlte.min.css')}}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition sidebar-mini mt-4">
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
           @yield('content')
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

@stack('body-scripts')
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
