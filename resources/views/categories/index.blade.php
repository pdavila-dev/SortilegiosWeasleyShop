<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorías mágicas | Sortilegios Weasley</title>
    <style>
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f9f4ff;
            color: #2b1b3d;
        }
        .hero {
            text-align: center;
            padding: 60px 20px 30px;
        }
        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            margin-bottom: 12px;
        }
        .hero p {
            max-width: 720px;
            margin: 0 auto;
            color: #6b5b7a;
        }
        .grid {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px 80px;
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
        .card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 45px -30px rgba(33, 0, 54, 0.6);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .card h2 {
            margin: 0 0 8px;
        }
        .card p {
            margin: 0 0 16px;
            color: #6b5b7a;
            flex: 1;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(122, 45, 216, 0.1);
            color: #7a2dd8;
            font-size: 0.85rem;
            margin-bottom: 14px;
        }
        .card a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: white;
            background: linear-gradient(135deg, #7a2dd8, #f08cc0);
            padding: 12px 20px;
            border-radius: 999px;
            font-weight: 600;
            justify-content: center;
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
    </style>
</head>
<body>
    @php $cartCount = array_sum(session('cart', [])); @endphp
    <a class="floating-cart" href="{{ route('cart.index') }}">Cesta ({{ $cartCount }})</a>

    <div class="hero">
        <h1>Categorías de Sortilegios Weasley</h1>
        <p>Explora cada colección mágica con dulces explosivos, travesuras impecables y artefactos sorprendentes
            creados por los gemelos. Haz clic en una categoría para ver todos sus productos.</p>
    </div>

    <section class="grid">
        @forelse ($categorias as $categoria)
            <article class="card">
                <img src="{{ $categoria->imagen_url ?? 'https://images.unsplash.com/photo-1504674900247-0877df9cc836' }}"
                     alt="{{ optional($categoria->detalle)->descripcion_tipo_producto }}">
                <div class="card-body">
                    <span class="badge">{{ number_format($categoria->descuento, 2) }}% descuento</span>
                    <h2>{{ optional($categoria->detalle)->descripcion_tipo_producto ?? 'Categoría misteriosa' }}</h2>
                    <p>{{ $categoria->productos_count }} productos traviesos esperando tu visita.</p>
                    <a href="{{ route('categories.show', $categoria) }}">
                        Ver colección
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </article>
        @empty
            <article class="card">
                <div class="card-body">
                    <h2>No hay categorías disponibles</h2>
                    <p>Cuando cargues productos desde el panel admin aparecerán aquí automáticamente.</p>
                </div>
            </article>
        @endforelse
    </section>
</body>
</html>

