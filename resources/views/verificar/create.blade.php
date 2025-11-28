<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>verificar | Sortilegios Weasley</title>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f7f1ff;
            color: #2b1b3d;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 24px 90px;
        }
        h1 {
            margin-bottom: 6px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
        }
        .card {
            background: #fff;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 20px 50px -35px rgba(12, 0, 29, 0.7);
        }
        .card h2 {
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid #d6c4f2;
            margin-bottom: 14px;
            font-size: 1rem;
        }
        textarea {
            min-height: 110px;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .button {
            background: linear-gradient(135deg, #7a2dd8, #f08cc0);
            border: none;
            color: #fff;
            padding: 14px 26px;
            border-radius: 999px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }
        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
        }
        .alert {
            background: #fde4ec;
            color: #a61b4d;
            padding: 10px 14px;
            border-radius: 12px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Finaliza tu compra</h1>
        <p>Completa tus datos para recibir tus travesuras mágicas directamente en tu lechuza.</p>

        <div class="grid">
            <form method="POST" action="{{ route('verificar.store') }}" class="card">
                @csrf

                @if ($errors->any())
                    <div class="alert">
                        Por favor corrige los errores y vuelve a intentarlo.
                    </div>
                @endif

                <label for="correo_contacto">Correo electrónico</label>
                <input type="email" id="correo_contacto" name="correo_contacto" value="{{ old('correo_contacto', auth()->user()->email ?? '') }}" required>

                <label for="direccion_envio">Dirección de envío</label>
                <textarea id="direccion_envio" name="direccion_envio" required>{{ old('direccion_envio') }}</textarea>

                <label for="nombre_contacto">Nombre completo</label>
                <input type="text" id="nombre_contacto" name="nombre_contacto" value="{{ old('nombre_contacto', auth()->user()->name ?? '') }}" required>

                @guest
                    <div class="checkbox">
                        <input type="checkbox" id="crear_cuenta" name="crear_cuenta" value="1" {{ old('crear_cuenta') ? 'checked' : '' }}>
                        <label for="crear_cuenta" style="margin:0;">Crear una cuenta</label>
                    </div>

                    <div id="password_field" style="{{ old('crear_cuenta') ? '' : 'display:none;' }}">
                        <label for="password">Contraseña (opcional, se genera automáticamente si la dejas vacía)</label>
                        <input type="password" id="password" name="password">
                    </div>
                @endguest

                <button class="button" type="submit">Confirmar pedido</button>
            </form>

            <div class="card">
                <h2>Resumen</h2>
                @foreach ($items as $item)
                    <div class="summary-item">
                        <span>{{ $item['cantidad'] }} × {{ optional($item['producto']->descripcion)->descripcion_producto }}</span>
                        <span>{{ number_format($item['total'], 2) }} G</span>
                    </div>
                @endforeach
                <hr style="border:none;border-top:1px solid #eee;margin:18px 0;">
                <div class="summary-item" style="font-size:1.2rem;font-weight:700;">
                    <span>Total</span>
                    <span>{{ number_format($total, 2) }} Galeones</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('crear_cuenta');
        const accountFields = document.getElementById('password_field');
        if (checkbox && accountFields) {
            checkbox.addEventListener('change', () => {
                accountFields.style.display = checkbox.checked ? '' : 'none';
            });
        }
    </script>
</body>
</html>

