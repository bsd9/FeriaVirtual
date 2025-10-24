<div>
    <p>Su codigo expiro . Tu código de confirmación es: {{ $confirmationResendCode }}</p>
    <p>Para completar tu registro, por favor haz clic en el siguiente enlace:</p>
    <a href="{{ route('confirmation', ['code' => $confirmationResendCode]) }}">Confirmar Correo Electrónico</a>
</div>
