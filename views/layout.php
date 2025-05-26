<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>DemoApp</title>
     <style>
        :root {
            --verde: #1a3d2f;
            --verde-claro: #2d5a42;
            --dorado: #c8a035;
            --dorado-oscuro: #b8941f;
            --blanco: #fdfdfd;
            --gris-claro: #f8f9fa;
            --transparente: rgba(255, 255, 255, 0.2);
            --sombra-suave: 0 4px 20px rgba(0, 0, 0, 0.1);
            --sombra-hover: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        /* ===== RESET Y BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-image: url('<?= asset("images/atitlanFondo.jpg") ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Overlay para mejor legibilidad */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(26, 61, 47, 0.1) 0%, rgba(200, 160, 53, 0.05) 100%);
            z-index: -1;
            pointer-events: none;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: var(--sombra-suave);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            padding: 1px;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            background: rgba(255, 255, 255, 0.98);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: var(--verde) !important;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .nav-link {
            color: #333 !important;
            margin: 0 0.5rem;
            font-weight: 500;
            font-size: 1rem;
            position: relative;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--dorado);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: var(--dorado) !important;
            background: rgba(200, 160, 53, 0.1);
        }

        .nav-link:hover::before {
            width: 80%;
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.5rem;
            background: var(--verde);
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* ===== PROGRESS BAR ===== */
        .progress {
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--dorado), var(--dorado-oscuro));
            transition: width 0.3s ease;
        }

        /* ===== CONTENEDOR PRINCIPAL ===== */
        .main-container {
            min-height: 85vh;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px 20px 0 0;
            margin-top: 80px;
            padding: 2rem 0;
            box-shadow: var(--sombra-suave);
        }

        /* ===== HERO SECTION ===== */
        .hero {
            background: linear-gradient(rgba(26, 61, 47, 0.1), rgba(26, 61, 47, 0.1)),
                        url('<?= asset("images/atitlanFondo.jpg") ?>');
            background-size: cover;
            background-position: center;
            height: 90vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-top: -80px;
            border-radius: 0 0 30px 30px;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(26, 61, 47, 0.8) 0%, rgba(200, 160, 53, 0.3) 100%);
            z-index: 1;
        }

        .hero-content {
            z-index: 2;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.4rem;
            margin: 1.5rem 0;
            opacity: 0.95;
            font-weight: 300;
        }

        /* ===== BOTONES ===== */
        .btn-gold {
            background: linear-gradient(45deg, var(--dorado), var(--dorado-oscuro));
            border: none;
            color: var(--blanco);
            font-weight: 600;
            border-radius: 50px;
            padding: 1rem 2.5rem;
            margin-top: 1.5rem;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 25px rgba(200, 160, 53, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-gold::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-gold:hover {
            background: linear-gradient(45deg, var(--dorado-oscuro), var(--dorado));
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(200, 160, 53, 0.4);
            color: var(--blanco);
        }

        .btn-gold:hover::before {
            left: 100%;
        }

        .bg-gradient-gold {
            background: linear-gradient(45deg, var(--dorado), var(--dorado-oscuro)) !important;
            color: white !important;
            border-radius: 20px !important;
        }

        /* ===== TÍTULOS DE SECCIÓN ===== */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--verde);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--dorado), var(--dorado-oscuro));
            border-radius: 2px;
        }

        /* ===== CARDS ===== */
        .card, .destination-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: all 0.4s ease;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            height: 100%;
        }

        .card:hover, .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--sombra-hover);
        }

        .card img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            color: var(--verde);
            font-weight: 600;
            font-size: 1.4rem;
        }

        /* Cards específicas para destinos */
        .card-image-container {
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .card-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .destination-card:hover .card-image-container img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .destination-card:hover .card-overlay {
            opacity: 1;
        }

        .card-link {
            color: var(--dorado) !important;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .card-link:hover {
            color: var(--dorado-oscuro) !important;
        }

        /* ===== LISTAS ===== */
        .list-group-item {
            border: none;
            padding: 0.5rem 0;
            background: transparent;
            color: #666;
            font-size: 0.9rem;
        }

        /* ===== FEATURE BOXES ===== */
        .feature-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, var(--verde) 0%, var(--verde-claro) 100%);
            color: var(--blanco);
            padding: 2rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.03) 2px,
                rgba(255, 255, 255, 0.03) 4px
            );
            animation: move 20s linear infinite;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        /* ===== ANIMACIONES ===== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes move {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .loading {
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .main-container {
                margin-top: 70px;
                padding: 1rem 0;
            }

            .card-image-container {
                height: 200px;
            }
        }
</style>
</head>
<body>
    <!-- Navbar mejorada -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="/app02_mrml">
                <i class="fas fa-magic me-2"></i>MagicTravel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/app02_mrml">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app02_mrml/clientes">
                            <i class="fas fa-users me-1"></i>Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-calendar-check me-1"></i>Reservas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-info-circle me-1"></i>Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Progress bar mejorada -->
    <div class="progress fixed-bottom">
        <div class="progress-bar progress-bar-animated" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        
        <?php echo $contenido; ?>
    </div>
    <div class="container-fluid " >
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <p style="font-size:xx-small; font-weight: bold;">
                         2025 MagicTravel · Todos los derechos reservados <?= date('Y') ?> &copy;
                </p>
            </div>
        </div>
    </div>
</body>
</html>