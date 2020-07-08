<template>
      <main>
        <!-- Container -->
        <div class="row">
            <!-- Sign In -->
            <div class="col m6 s12 p-0 mb-2">
                <h4 class="mt-0 color-main">Mi Cuenta</h4>
                <p>¿Aún no tienes cuenta?<br>¡Crea tu cuenta hoy!</p>
                <p>
                    Revisa el estatus de tus órdenes
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Consulta tu historial de compras
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Vuelve a comprar tus órdenes anteriores
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Recibe nuestras promociones y ¡Aprovéchalas antes que nadie!
                    <i class="material-icons left color-main">check</i>
                </p>
                <a class="btn bg-main mt-2" href="#">Registrarme<i class="material-icons left">person_add</i></a>
            </div>

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
</template>