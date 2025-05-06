<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Participación</title>
    <style>
        @page {
            size: landscape;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }
        .certificate {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #ffffff;
        }

        h2, p {
            margin: 15px 0;
            line-height: 1.5;
            color: #372c49;
        }
        .signature {
            margin-top: 30px;
            text-align: center;
            position: relative;
        }
        .signature img {
            width: 9rem;
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .header {
            background: #8a2afd;
            padding: 1rem;
        }

        .header img {
            border-radius: 100%;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 10%;
        }


    </style>
</head>
<body>

<div class="certificate">
    <div class="header">
        <img class="logo" src="{{asset('img/Logos/logoFair360.png')}}" alt="imagen logo">
        <h1>Certificado de Participación</h1>
        <h2>Presentado a:</h2>
    </div>

    <p>{{$userName}}</p>
    <h2>Por haber completado exitosamente:</h2>
    <p>{{$event->nombre}}</p>
    <p>La empresa <strong>Fair360</strong> se enorgullece en otorgarte este certificado en reconocimiento a tu dedicación y compromiso. Tu participación no solo ha contribuido al éxito de este evento, sino que también refleja tu pasión por el crecimiento personal y profesional.</p>
    <p>Este certificado representa más que un logro; es un testimonio de tu capacidad para superar desafíos y alcanzar tus metas. Que este sea solo el comienzo de un viaje lleno de oportunidades y éxitos.</p>
    <div class="signature">
        <img src="{{asset('img/firma/signature_pandadoc.png')}}" alt="Firma de autoridad"  title="Firma digital "/>
        <p>______________________________</p>
        <p>Firma del organizador</p>
    </div>
</div>

</body>
</html>
