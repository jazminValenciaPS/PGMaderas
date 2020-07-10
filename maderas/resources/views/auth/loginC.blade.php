@extends('auth.contenidoC')
@section('loginC')


    <!-- Sign Up -->
    <div class="col m6 s12 p-0">
        <h4 class="mt-0 color-main">Iniciar Sesión</h4>
        <div class="input-field col m7 s12">
            <input id="email" type="email" required>
            <label for="email">Correo</label>
        </div>
        <div class="input-field col m7 s12">
            <input id="password" type="password" required>
            <label for="password">Contraseña</label>
        </div>
        <div class="col m12 s12">
            <a class="btn bg-main mt-2 mb-2" href="#">Iniciar Sesión</a>
            <br>
            <a href="#">¿Olvido su contraseña?</a>
        </div>
    </div>
</div>


</main>
@endsection