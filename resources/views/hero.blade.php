<!--
<section class="hero is-link py-5" style="background: url({{ asset('img/hero.svg')}})">
  <div class="hero-body">
    <p class="title">Viajes</p>
    <p class="subtitle">Compartidos</p>
  </div>
</section>  -->

<!-- Bloque del Buscador de Viajes -->
<section class="section">
    <div class="container has-text-centered">
        <h2 class="title is-size-4 has-text-weight-bold">UniRuta</h2>
        <!-- Aquí puedes agregar tu formulario de búsqueda -->
    </div>
</section>

<!-- Carrusel de Imágenes Ajustado -->
<div class="container my-6">
    <div class="carousel" style="max-width: 800px; margin: auto;">
        <div class="carousel-item is-active">
            <figure class="image is-3by1">
                <img src="{{ asset('img/foto1.jpg') }}" alt="Foto 1" style="max-height: 300px; object-fit: cover;">
                <figcaption class="has-text-centered mt-2">"Planifica tus rutas desde la comodidad de tu teléfono"</figcaption>
            </figure>
        </div>
        <div class="carousel-item">
            <figure class="image is-3by1">
                <img src="{{ asset('img/foto2.jpg') }}" alt="Foto 2" style="max-height: 300px; object-fit: cover;">
                <figcaption class="has-text-centered mt-2">"Encuentra transporte de manera sencilla y rápida"</figcaption>
            </figure>
        </div>
        <div class="carousel-item">
            <figure class="image is-3by1">
                <img src="{{ asset('img/foto3.jpg') }}" alt="Foto 3" style="max-height: 300px; object-fit: cover;">
                <figcaption class="has-text-centered mt-2">"Explora nuevas rutas y destinos con facilidad"</figcaption>
            </figure>
        </div>
    </div>

    <!-- Controles del Carrusel -->
    <div class="carousel-controls">
        <button class="carousel-control-prev" onclick="prevSlide()">
            <span class="icon"><i class="fas fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" onclick="nextSlide()">
            <span class="icon"><i class="fas fa-chevron-right"></i></span>
        </button>
    </div>
</div>

<!-- Estilos Personalizados para el Carrusel -->
<style>
.carousel {
    position: relative;
    overflow: hidden;
}
.carousel-item {
    display: none;
    transition: opacity 0.5s ease;
}
.carousel-item.is-active {
    display: block;
}
.image.is-3by1 img {
    object-fit: cover;
    width: 100%;
    height: auto;
}
.carousel img {
    max-height: 300px;
}
.carousel-controls {
    display: flex;
    justify-content: space-between;
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    transform: translateY(-50%);
}
.carousel-control-prev, .carousel-control-next {
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 1.5rem;
    cursor: pointer;
}
</style>

<!-- Script para Funcionalidad Automática del Carrusel -->
<script>
let currentSlide = 0;
const items = document.querySelectorAll('.carousel-item');

// Muestra la imagen correspondiente al índice
function showSlide(index) {
    items.forEach((item, i) => {
        item.classList.remove('is-active');
        if (i === index) {
            item.classList.add('is-active');
        }
    });
}

// Cambia a la siguiente imagen
function nextSlide() {
    currentSlide = (currentSlide + 1) % items.length;
    showSlide(currentSlide);
}

// Cambia a la imagen anterior
function prevSlide() {
    currentSlide = (currentSlide - 1 + items.length) % items.length;
    showSlide(currentSlide);
}

// Intervalo para el desplazamiento automático
setInterval(nextSlide, 5000); // Cambia de imagen cada 5 segundos

// Inicializa el primer slide
showSlide(currentSlide);
</script>
