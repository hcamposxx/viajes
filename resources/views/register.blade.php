@include('header')
<div class="container content">
    <h1 class="my-2 columns is-mobile is-centered">¿Cómo deseas registrarte?</h1>
    <section class="my-2 columns is-mobile is-centered">
        <a href="{{route('login-google')}}">Continuar con Google</a>
    </section>
    <hr/>
    <h1 class="my-2 columns is-mobile is-centered">Usar otra cuenta</h1>

    <section class="my-2 columns is-mobile is-centered">
        <form method="POST" action="{{ route('new-account-email') }}">
            @csrf
            <div class="field">
                <div class="control has-icons-left">
                    <input required class="input" type="text" name="name" {{old('name')}} placeholder="Tu nombre completo">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left">
                    <input required class="input" type="email" name="email" {{old('email')}} placeholder="Tu correo electrónico">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left">
                    <input required class="input" type="number" name="phone" {{old('phone')}} placeholder="Tu número telefónico">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left">
                    <input required class="input" type="password" name="password" placeholder="Escribe una contraseña">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left">
                    <button class="button is-success is-fullwidth">Continuar</button>
                </div>
            </div>
        </form>
    </section>
    <section class="my-2 columns is-mobile is-centered">
        Ya tengo cuenta <a href="{{route('login')}}">| Iniciar sesión</a>
    </section>
    <hr>
</div>

@include('footer')