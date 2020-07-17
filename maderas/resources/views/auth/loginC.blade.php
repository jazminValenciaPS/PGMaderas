@extends('auth.contenidoC')
@section('loginC')
<main>

<div class="row">
<br>
    <div class="col m6 s12 p-0 mb-2">
        <h4 class="mt-0 color-main">Mi Cuenta</h4>
        <p>¿Aún no tienes cuenta?<br>¡Crea tu cuenta hoy!</p>
        <p>
            Revisa el estatus de tus órdenes.
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Consulta tu historial de compras.
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Vuelve a comprar tus órdenes anteriores.
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Recibe nuestras promociones y ¡Aprovéchalas antes que nadie!
            <i class="material-icons left color-main">check</i>
        </p>
        <a class="btn bg-main mt-2" href="/registro">Registrarme<i class="material-icons left">person_add</i></a>
    </div>

    <!-- Sign Up -->
  <form  method="POST" action="{{ url('iniciar-sesion') }}">
      {{ csrf_field() }}

    <div class="col m6 s12 p-0">
        <h4 class="mt-0 color-main">Iniciar Sesión</h4>
        <!-- <div class="input-field col m7 s12"> -->
        <div class="input-field col m7 s12 {{ $errors->has('email' ? 'has-error' : '' ) }}">
            <input  value="{{old('email')}}"  name="email" id="email" type="text" class="validate" autofocus required>
            <label for="email">Correo</label>
            {!! $errors->first('email','<span class="help-block">:message</span>') !!}
        </div>

        <div class="input-field col m7 s12 {{$errors->has('password' ? 'has-error': '' ) }}">
            <input id="password" name="password" id="password" type="password" class="validate" required>
            <label for="password">Contraseña</label>
            {!! $errors->first('password','<span class="help-block">:message</span>') !!}

        </div>
        <div class="col m12 s12">
            <button type="submit" class="btn bg-main mt-2 mb-2">Iniciar Sesión</button>

            <br>
            <a href="#">¿Olvido su contraseña?</a>
        </div>
    </div>
  </form>

 </div>
 </main>


@endsection