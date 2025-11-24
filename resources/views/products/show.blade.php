<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ optional($producto->descripcion)->descripcion_producto }} | Sortilegios Weasley</title>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f8f4ff;
            color: #2b1b3d;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 24px 80px;
        }
        .breadcrumbs {
            font-size: 0.9rem;
            margin-bottom: 16px;
        }
        .breadcrumbs a {
            color: #7a2dd8;
            text-decoration: none;
        }
        .product {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 36px;
            background: #fff;
            border-radius: 32px;
            padding: 32px;
            box-shadow: 0 30px 60px -40px rgba(25, 0, 45, 0.7);
        }
        .product img {
            width: 100%;
            border-radius: 24px;
            object-fit: cover;
            max-height: 420px;
        }
        .price {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 16px;
            color: #7a2dd8;
        }
        .old-price {
            text-decoration: line-through;
            color: #a79bb8;
            margin-left: 14px;
            font-size: 1rem;
        }
        .tags span {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(122, 45, 216, 0.1);
            color: #7a2dd8;
            margin-right: 8px;
            margin-bottom: 8px;
            font-size: 0.85rem;
        }
        .cta {
            margin-top: 28px;
        }
        .cta button {
            background: linear-gradient(135deg, #f08cc0, #7a2dd8);
            border: none;
            color: white;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 999px;
            cursor: pointer;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .cta button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ route('landing') }}">Inicio</a> /
            @foreach ($producto->tipos as $tipo)
                <a href="{{ route('categories.show', $tipo) }}">{{ optional($tipo->detalle)->descripcion_tipo_producto }}</a> /
                @break
            @endforeach
            <span>{{ optional($producto->descripcion)->descripcion_producto }}</span>
        </div>

        <section class="product">
            <div>
                <img src="{{ $producto->imagen_url ?? 'https://images.unsplash.com/photo-1470337458703-46ad1756a187' }}"
                     alt="{{ optional($producto->descripcion)->descripcion_producto }}">
            </div>
            <div>
                <h1>{{ optional($producto->descripcion)->descripcion_producto }}</h1>
                <p>Este artículo travieso es perfecto para tus aventuras en el Callejón Diagon. Aprovecha la magia y llévatelo ahora.</p>

                <div class="price">
                    ${{ number_format($producto->oferta ? $producto->preu_oferta ?? $producto->precio_actual : $producto->precio_actual, 2) }}
                    @if ($producto->oferta && $producto->preu_oferta)
                        <span class="old-price">${{ number_format($producto->precio_actual, 2) }}</span>
                    @endif
                </div>

                <div class="tags">
                    <span>Stock: {{ $producto->stock_actual }}</span>
                    @forelse ($producto->tipos as $tipo)
                        <span>{{ optional($tipo->detalle)->descripcion_tipo_producto }}</span>
                    @empty
                        <span>General</span>
                    @endforelse
                </div>

                <div class="cta">
                    <form method="POST" action="#">
                        @csrf
                        <button type="button">
                            Agregar a la cesta
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

