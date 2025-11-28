<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gracias por tu compra | Sortilegios Weasley</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: #f7f0ff;
            font-family: 'Figtree', sans-serif;
            color: #2b1b3d;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 30px 70px -50px rgba(12, 0, 40, 0.8);
            max-width: 420px;
            text-align: center;
        }
        .card h1 {
            margin-top: 0;
        }
        .card a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #fff;
            padding: 12px 24px;
            border-radius: 999px;
            background: linear-gradient(135deg, #7a2dd8, #f08cc0);
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>¡Gracias por tu compra!</h1>
        <p>Tu pedido #{{ $pedido->id_pedido }} ha quedado registrado y pronto será preparado para envío.</p>
        <p>Te enviaremos actualizaciones a {{ $pedido->correo_contacto }}.</p>
        <a href="{{ route('landing') }}">
            Volver a la tienda
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </a>
    </div>
</body>
</html>

