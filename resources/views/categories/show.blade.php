<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ optional($categoria->detalle)->descripcion_tipo_producto }} | Sortilegios Weasley</title>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #fdf8ff;
            color: #2b1b3d;
        }
        .hero {
            position: relative;
            overflow: hidden;
        }
        .hero img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            filter: brightness(0.55);
        }
        .hero .content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
        }
        .hero h1 {
            font-size: clamp(2.8rem, 6vw, 3.8rem);
            margin-bottom: 10px;
        }
        .hero p {
            max-width: 720px;
        }
        .breadcrumbs {
            max-width: 1100px;
            margin: 24px auto 0;
            padding: 0 24px;
            font-size: 0.9rem;
        }
        .breadcrumbs a {
            color: #7a2dd8;
            text-decoration: none;
        }
        .floating-cart {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: linear-gradient(135deg, #7a2dd8, #f08cc0);
            color: #fff;
            padding: 12px 20px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 20px 45px -30px rgba(33, 0, 54, 0.6);
        }
        .grid {
            max-width: 1100px;
            margin: 20px auto 80px;
            padding: 0 24px;
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
        .product-card {
            background: #fff;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 20px 50px -30px rgba(19, 0, 33, 0.6);
        }
        .product-card h3 {
            margin-top: 0;
        }
        .product-card p {
            margin-bottom: 12px;
            color: #6b5b7a;
        }
        .price {
            font-weight: 700;
            color: #7a2dd8;
            font-size: 1.1rem;
        }
        .pagination {
            max-width: 1100px;
            margin: 20px auto 60px;
            padding: 0 24px;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
    <section class="hero">
        <img src="{{ $categoria->imagen_url ?? 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
             alt="{{ optional($categoria->detalle)->descripcion_tipo_producto }}">
        <div class="content">
            <h1>{{ optional($categoria->detalle)->descripcion_tipo_producto ?? 'Categoría misteriosa' }}</h1>
            <p>Diversión pura al estilo Weasley. Cada artículo está diseñado para arrasar en el Callejón Diagon.</p>
        </div>
    </section>

    @php $cartCount = array_sum(session('cart', [])); @endphp
    <a class="floating-cart" href="{{ route('cart.index') }}">Cesta ({{ $cartCount }})</a>

    <div class="breadcrumbs">
        <a href="{{ route('landing') }}">Inicio</a> /
        <a href="{{ route('categories.index') }}">Categorías</a> /
        <span>{{ optional($categoria->detalle)->descripcion_tipo_producto ?? 'Categoría' }}</span>
    </div>

    <section class="grid">
        @forelse ($productos as $producto)
            <article class="product-card">
                <h3>
                    <a href="{{ route('products.show', $producto) }}" style="text-decoration:none;color:#2b1b3d;">
                        {{ optional($producto->descripcion)->descripcion_producto ?? 'Producto sin nombre' }}
                    </a>
                </h3>
                <p>Ideal para coleccionistas de travesuras. Stock actual: {{ $producto->stock_actual }}</p>
                <div class="price">
                    ${{ number_format($producto->oferta ? $producto->preu_oferta ?? $producto->precio_actual : $producto->precio_actual, 2) }}
                </div>
            </article>
        @empty
            <article class="product-card">
                <h3>Pronto habrá sorpresas</h3>
                <p>No hay productos cargados en esta categoría todavía.</p>
            </article>
        @endforelse
    </section>

    <div class="pagination">
        {{ $productos->links() }}
    </div>
</body>
</html>

