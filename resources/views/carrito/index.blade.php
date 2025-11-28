<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cesta de travesuras | Sortilegios Weasley</title>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f5f1ff;
            color: #2b1b3d;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 24px 80px;
        }
        h1 {
            margin-bottom: 8px;
        }
        .item {
            display: grid;
            grid-template-columns: 120px 1fr 160px;
            gap: 20px;
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 16px;
            box-shadow: 0 15px 40px -25px rgba(22, 0, 40, 0.6);
        }
        .item img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
        }
        .item h3 {
            margin: 0 0 6px;
        }
        .item form {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .item input[type=number] {
            width: 60px;
            padding: 6px;
            border-radius: 8px;
            border: 1px solid #d5c7f1;
        }
        .button {
            background: #7a2dd8;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 600;
        }
        .button.secondary {
            background: #f0e6ff;
            color: #7a2dd8;
        }
        .summary {
            margin-top: 24px;
            text-align: right;
        }
        .summary h2 {
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <div>
                <h1>Cesta de travesuras</h1>
                <p>Revisa tus artículos mágicos antes de proceder al pago.</p>
            </div>
            <a class="button secondary" href="{{ route('landing') }}">Seguir comprando</a>
        </div>

        @if (session('success'))
            <div style="background:#e8f9f2;color:#146c43;padding:12px 18px;border-radius:14px;margin-bottom:14px;">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($items as $item)
            <article class="item">
                <img src="{{ $item['producto']->imagen_url ?? 'https://images.unsplash.com/photo-1470337458703-46ad1756a187' }}"
                     alt="{{ optional($item['producto']->descripcion)->descripcion_producto }}">
                <div>
                    <h3>{{ optional($item['producto']->descripcion)->descripcion_producto }}</h3>
                    <p>Precio unitario: {{ number_format($item['precio_unitario'], 2) }} G</p>
                    <form method="POST" action="{{ route('carrito.update', $item['producto']) }}">
                        @csrf
                        @method('PATCH')
                        <label for="cantidad-{{ $item['producto']->id_producto }}">Cantidad</label>
                        <input type="number" id="cantidad-{{ $item['producto']->id_producto }}" name="cantidad" min="1" max="99" value="{{ $item['cantidad'] }}">
                        <button class="button" type="submit">Actualizar</button>
                    </form>
                </div>
                <div style="text-align:right;">
                    <strong>{{ number_format($item['total'], 2) }} G</strong>
                    <form method="POST" action="{{ route('carrito.destroy', $item['producto']) }}" style="margin-top:12px;">
                        @csrf
                        @method('DELETE')
                        <button class="button secondary" type="submit">Eliminar</button>
                    </form>
                </div>
            </article>
        @empty
            <p>No tienes productos en tu cesta.</p>
        @endforelse

        <div class="summary">
            <h2>Total: {{ number_format($total, 2) }} Galeones</h2>
            <a class="button" href="{{ route('verificar.create') }}">Proceder al pago</a>
        </div>
    </div>
</body>
</html>

