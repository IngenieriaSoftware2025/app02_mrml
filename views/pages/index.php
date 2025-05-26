<!-- Hero -->
<section class="hero">
    <div class="hero-content container">
        <h1>Descubre Guatemala</h1>
        <p>Turismo cultural, natural y de lujo. Solo con MagicTravel.</p>
        <a href="#destinos" class="btn btn-gold">Explorar Destinos</a>
    </div>
</section>

<!-- Cards Section -->
<section class="py-5" id="destinos">
    <div class="container">
        <!-- Título de la sección -->
        <div class="text-center mb-5">
            <h2 class="section-title">Destinos Exclusivos</h2>
            <p class="lead text-muted">Descubre los lugares más impresionantes de Guatemala con experiencias únicas y memorables</p>
        </div>

        <!-- Grid de tarjetas mejoradas -->
        <div class="row g-4 justify-content-center">
            
            <!-- Tarjeta 1: Lago Atitlán -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 destination-card">
                    <div class="card-image-container">
                        <img class="card-img-top" src="<?= asset('images/atitlan.jpg') ?>" alt="Lago Atitlán">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Lago Atitlán</h5>
                        <p class="card-text flex-grow-1">Sumérgete en la belleza del lago más hermoso del mundo, rodeado de volcanes majestuosos y pueblos llenos de cultura maya auténtica.</p>
                        
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-mountain text-warning me-2"></i>
                                Vistas panorámicas de volcanes
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-ship text-warning me-2"></i>
                                Navegación en lanchas privadas
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-palette text-warning me-2"></i>
                                Arte y cultura maya auténtica
                            </li>
                        </ul>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="#" class="card-link text-decoration-none fw-bold">
                                <i class="fas fa-info-circle me-1"></i>Ver detalles
                            </a>
                            <span class="badge bg-gradient-gold fs-6 px-3 py-2">Desde Q899</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Antigua Guatemala -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 destination-card">
                    <div class="card-image-container">
                        <img class="card-img-top" src="<?= asset('images/antigua.jpg') ?>" alt="Antigua Guatemala">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Antigua Guatemala</h5>
                        <p class="card-text flex-grow-1">Camina por las calles empedradas de esta joya colonial, Patrimonio de la Humanidad, y vive la historia en cada rincón lleno de magia.</p>
                        
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-church text-warning me-2"></i>
                                Arquitectura colonial única
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-coffee text-warning me-2"></i>
                                Tours de café premium
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-crown text-warning me-2"></i>
                                Experiencias VIP exclusivas
                            </li>
                        </ul>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="#" class="card-link text-decoration-none fw-bold">
                                <i class="fas fa-info-circle me-1"></i>Ver detalles
                            </a>
                            <span class="badge bg-gradient-gold fs-6 px-3 py-2">Desde Q699</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Volcán Acatenango -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 destination-card">
                    <div class="card-image-container">
                        <img class="card-img-top" src="<?= asset('images/volcanDeAcatenango.jpeg') ?>" alt="Volcán Acatenango">
                        <div class="card-overlay"></div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Volcán Acatenango</h5>
                        <p class="card-text flex-grow-1">Conquista las alturas en esta aventura épica y contempla las espectaculares erupciones del volcán Fuego desde una perspectiva única e inolvidable.</p>
                        
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-fire text-warning me-2"></i>
                                Vistas del volcán Fuego
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-campground text-warning me-2"></i>
                                Camping de lujo incluido
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-hiking text-warning me-2"></i>
                                Guías expertos certificados
                            </li>
                        </ul>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="#" class="card-link text-decoration-none fw-bold">
                                <i class="fas fa-info-circle me-1"></i>Ver detalles
                            </a>
                            <span class="badge bg-gradient-gold fs-6 px-3 py-2">Desde Q1299</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sección adicional de características -->
        <div class="row mt-5 pt-5">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h3 class="section-title">¿Por qué elegir MagicTravel?</h3>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-box p-4">
                    <i class="fas fa-award fa-3x text-warning mb-3"></i>
                    <h5>Experiencias Premium</h5>
                    <p class="text-muted">Tours exclusivos con guías certificados y servicios de lujo para una experiencia inolvidable.</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-box p-4">
                    <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                    <h5>Seguridad Garantizada</h5>
                    <p class="text-muted">Protocolos de seguridad rigurosos y seguros de viaje para tu total tranquilidad.</p>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-box p-4">
                    <i class="fas fa-heart fa-3x text-warning mb-3"></i>
                    <h5>Pasión por Guatemala</h5>
                    <p class="text-muted">Conocemos cada rincón de nuestro hermoso país y lo compartimos con amor.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Scroll suave para el botón "Explorar Destinos"
document.addEventListener('DOMContentLoaded', function() {
    const explorarBtn = document.querySelector('.btn-gold');
    if (explorarBtn) {
        explorarBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const destinos = document.querySelector('#destinos');
            if (destinos) {
                destinos.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Animación de entrada para las tarjetas
    const cards = document.querySelectorAll('.destination-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 200);
            }
        });
    }, {
        threshold: 0.1
    });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
});
</script>