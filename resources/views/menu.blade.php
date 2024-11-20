<nav class="navbar is-primary has-shadow">
    <div class="container">
        <!-- Marca y Logo -->
        <div class="navbar-brand">
            <a href="{{ route('home') }}" class="navbar-item" aria-label="Página principal">
                <img src="{{ asset('img/trip.png') }}" alt="Logo de Viajes Compartidos" class="navbar-logo">
            </a>
            <!-- Botón de menú para móvil -->
            <div class="navbar-burger" data-target="nav-links">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="nav-links" class="navbar-menu">
            <div class="navbar-end is-centered">
                <!-- Enlace centrado con botones de navegación -->
                <div class="navbar-item">
                    <div class="buttons has-addons">
                        @auth
                            <a href="{{ route('offer-seats') }}" class="button is-success">
                                <span class="icon is-small">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Publica un viaje</span>
                            </a>
                            <a href="{{ route('history') }}" class="button is-link">
                                <span class="icon is-small">
                                    <i class="fas fa-car"></i>
                                </span>
                                <span>Mis viajes</span>
                            </a>
                            <a href="{{ route('logout') }}" class="button is-danger">
                                <span class="icon is-small">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span>Cerrar sesión</span>
                            </a>
                            <!-- Perfil al final de la fila -->
                            <a href="{{ route('home') }}" class="navbar-item has-text-white">
                                <span class="icon is-small">
                                    <i class="fas fa-user-circle"></i>
                                </span>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button is-success">
                                <span class="icon is-small">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Publica un viaje</span>
                            </a>
                            <a href="{{ route('login') }}" class="button is-link">
                                <span class="icon is-small">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span>Iniciar sesión</span>
                            </a>
                            <a href="{{ route('register') }}" class="button is-primary">
                                <span class="icon is-small">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <span>Crear una cuenta</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Estilos personalizados -->
<style>
    /* Fondo turquesa para la barra de navegación */
    .navbar.is-primary {
        background-color: #008080; /* Fondo turquesa */
    }

    /* Tamaño del logo */
    .navbar-logo {
        height: 70px;
        max-height: 70px;
    }

    /* Texto blanco en el perfil */
    .navbar-item.has-text-white {
        color: #ffffff;
    }

    /* Botones sin bordes redondeados */
    .buttons.has-addons .button {
        border-radius: 0; /* Botones en fila sin borde redondeado */
    }

    /* Espacio entre los botones */
    .buttons .button {
        margin-right: 10px; /* Espacio entre los botones */
    }

    /* Eliminar el margen del último botón */
    .buttons .button:last-child {
        margin-right: 0;
    }

    /* Fondo verde claro para toda la página (excepto la barra de navegación) */
    body {
        background-color: #e0f7fa; /* Verde claro */
        margin: 0;
        padding: 0;
    }
</style>

<!-- Script para el menú de móvil -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const burgerIcon = document.querySelector('.navbar-burger');
        const navbarMenu = document.querySelector('.navbar-menu');

        burgerIcon.addEventListener('click', () => {
            burgerIcon.classList.toggle('is-active');
            navbarMenu.classList.toggle('is-active');
        });
    });
</script>



