<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sortilegios Weasley Shop</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, sans-serif;font-feature-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::-webkit-backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }
            .floating-cart {
                position: fixed;
                bottom: 24px;
                right: 24px;
                background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
                color: #fff;
                padding: 12px 20px;
                border-radius: 999px;
                text-decoration: none;
                font-weight: 600;
                box-shadow: var(--shadow-soft);
            }
        </style>
        <style>
            :root {
                --color-bg: #f6f2ff;
                --color-primary: #7a2dd8;
                --color-secondary: #f08cc0;
                --color-card: #ffffff;
                --color-text: #2b1b3d;
                --color-muted: #6b5b7a;
                --shadow-soft: 0 18px 40px -20px rgba(44, 0, 80, 0.45);
                --border-radius-lg: 28px;
                --border-radius-sm: 16px;
            }

            body {
                background: radial-gradient(circle at top, rgba(240, 140, 192, 0.18), transparent),
                            radial-gradient(circle at bottom, rgba(122, 45, 216, 0.12), transparent),
                            var(--color-bg);
                color: var(--color-text);
                font-family: "Figtree", sans-serif;
            }

            .page-wrapper {
                max-width: 1200px;
                margin: 0 auto;
                padding: 72px 24px 100px;
            }

            .brand-badge {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                background-color: rgba(255, 255, 255, 0.75);
                backdrop-filter: blur(8px);
                border-radius: 999px;
                padding: 12px 22px;
                box-shadow: var(--shadow-soft);
                font-weight: 600;
                letter-spacing: 0.04em;
            }

            .brand-badge svg {
                width: 36px;
                height: 36px;
            }

            .hero {
                text-align: center;
                margin-top: 48px;
            }

            .hero h1 {
                font-size: clamp(2.8rem, 6vw, 3.6rem);
                font-weight: 700;
                letter-spacing: -0.02em;
                color: var(--color-text);
                margin-bottom: 16px;
            }

            .hero p {
                font-size: 1.1rem;
                color: var(--color-muted);
                max-width: 740px;
                margin: 0 auto;
                line-height: 1.7;
            }

            .categories-grid {
                margin-top: 72px;
                display: grid;
                gap: 32px;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }

            .category-card {
                position: relative;
                background: var(--color-card);
                border-radius: var(--border-radius-lg);
                padding: 32px 28px 36px;
                box-shadow: var(--shadow-soft);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                gap: 24px;
                isolation: isolate;
            }

            .category-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, rgba(122, 45, 216, 0.12), rgba(240, 140, 192, 0.08));
                opacity: 0;
                transition: opacity 220ms ease, transform 220ms ease;
                z-index: -1;
            }

            .category-card:hover::before {
                opacity: 1;
                transform: scale(1.04);
            }

            .category-heading {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .category-heading h2 {
                font-size: 1.6rem;
                font-weight: 700;
                margin: 0;
            }

            .category-heading span {
                font-size: 0.85rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.08em;
                color: rgba(122, 45, 216, 0.7);
            }

            .product-list {
                display: grid;
                gap: 18px;
            }

            .product-card {
                display: flex;
                gap: 18px;
                align-items: center;
                padding: 18px 20px;
                border-radius: var(--border-radius-sm);
                background: rgba(122, 45, 216, 0.06);
                border: 1px solid rgba(122, 45, 216, 0.14);
                transition: transform 200ms ease, box-shadow 200ms ease;
            }

            .product-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 14px 34px -18px rgba(122, 45, 216, 0.6);
            }

            .product-icon {
                width: 48px;
                height: 48px;
                border-radius: 50%;
                background: linear-gradient(135deg, rgba(122, 45, 216, 0.2), rgba(240, 140, 192, 0.2));
                display: grid;
                place-items: center;
                color: var(--color-primary);
                font-size: 1.4rem;
                font-weight: 700;
            }

            .product-content {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .product-title {
                font-size: 1rem;
                font-weight: 600;
                color: var(--color-text);
            }

            .product-meta {
                font-size: 0.9rem;
                color: var(--color-muted);
            }

            .cta {
                margin-top: 72px;
                text-align: center;
            }

            .cta a {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 14px 26px;
                border-radius: 999px;
                background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
                color: #fff;
                font-weight: 600;
                text-decoration: none;
                box-shadow: var(--shadow-soft);
                transition: transform 200ms ease, box-shadow 200ms ease;
            }

            .cta a:hover {
                transform: translateY(-3px);
                box-shadow: 0 20px 44px -18px rgba(122, 45, 216, 0.65);
            }

            @media (max-width: 640px) {
                .page-wrapper {
                    padding: 48px 18px 80px;
                }

                .category-card {
                    padding: 28px 22px 32px;
                }
            }
        </style>
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/admin/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        @php $cartCount = array_sum(session('cart', [])); @endphp
        <a class="floating-cart" href="{{ route('cart.index') }}">
            Cesta ({{ $cartCount }})
        </a>
        <div class="page-wrapper">
            <div class="brand-badge">
                <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253Z" fill="#7A2DD8"/>
                    </svg>
                <span>Sortilegios Weasley Shop</span>
                </div>

            <header class="hero">
                <h1>Descubre magia organizada por categorías</h1>
                <p>
                    Explora nuestra selección encantada de productos oficialmente aprobados por el Ministerio.
                    Cada categoría guarda sorpresas únicas listas para hacer travesuras inolvidables en el Callejón Diagon.
                </p>
            </header>

            <section class="categories-grid">
                @forelse ($categorias as $categoria)
                    <article class="category-card">
                        <div class="category-heading">
                            <h2>{{ optional($categoria->detalle)->descripcion_tipo_producto ?? 'Categoría sin nombre' }}</h2>
                            <span>{{ number_format($categoria->descuento, 2) }}% off</span>
                        </div>
                        <div class="product-list">
                            @forelse ($categoria->productos->take(3) as $producto)
                                <div class="product-card">
                                    <div class="product-icon">
                                        {{ strtoupper(substr(optional($producto->descripcion)->descripcion_producto ?? 'W', 0, 1)) }}
                                </div>
                                    <div class="product-content">
                                        <a class="product-title" style="text-decoration:none;color:inherit;font-weight:600;" href="{{ route('products.show', $producto) }}">
                                            {{ optional($producto->descripcion)->descripcion_producto }}
                                        </a>
                                        <span class="product-meta">Desde ${{ number_format($producto->precio_actual, 2) }}</span>
                            </div>
                                </div>
                            @empty
                                <div class="product-card">
                                    <div class="product-content">
                                        <span class="product-title text-muted">No hay productos todavía.</span>
                            </div>
                                </div>
                            @endforelse
                            </div>
                        <div class="cta mt-4">
                            <a href="{{ route('categories.show', $categoria) }}">
                                Ver productos
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                                </div>
                    </article>
                @empty
                    <article class="category-card">
                        <div class="category-heading">
                            <h2>No hay categorías disponibles</h2>
                            </div>
                        <div class="product-list">
                            <p class="text-muted">Agrega productos desde el panel para verlos aquí.</p>
                        </div>
                    </article>
                @endforelse
            </section>

            <div class="cta">
                <a href="{{ route('categories.index') }}">
                    Ver todas las categorías
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </body>
</html>
