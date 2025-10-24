<div>
    <p>Gracias por registrarte en nuestro sitio. Tu código de confirmación es: {{ $confirmationCode }}</p>
    <p>Para completar tu registro, por favor haz clic en el siguiente enlace:</p>
    <a href="{{ route('confirmation', ['code' => $confirmationCode]) }}">Confirmar Correo Electrónico</a>
</div>
