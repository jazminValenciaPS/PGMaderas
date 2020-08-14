 <header>
    <!-- Nav Bar -->
    <nav class="white">
        <div class="nav-wrapper">
            <a @click="menu=0" href="/" class="brand-logo"><img src="img/logo-nav.png" width="260px" /></a>
            <ul class="right hide-on-med-and-down">
               
                <li class="input-field col m5 s6 browser-default">
                <i class="material-icons prefix color-main ">location_on</i>

                    <select class="select-tienda-index">
                        <option value="" disabled selected>Seleccione su tienda</option>
                        <option value="1">Matriz Culiacán</option>
                        <option value="2">Sucursal Zapata</option>
                        <option value="3">Sucursal Monterrey</option>
                        <label>Materialize Select</label>

                    </select>  
                </li>
               
                <li class="col m7 s6">
                    <div class="input-field">
                        <input id="search" type="search" required placeholder="Buscar" />
                        <label class="label-icon" for="search"><i class="material-icons color-main">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </li>
                <li class="col m8 s7">
                    <a id = "user" class="waves-effect waves-light " href="/iniciar-sesion">
                        <i class="material-icons color-main">person</i>
                    </a>
                </li>
               <li class="linea "></li>
                <li ><a class="waves-effect waves-light" href="/Carrito"><i class="material-icons color-main">shopping_cart</i></a></li>

            </ul>
        </div>
    </nav>
<!-- nav 2 -->
    <nav class="white nav-2">
        <div class="nav-wrapper navbar">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <i class="material-icons color-main">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light color-main" href="/">Inicio</a></li>
                <li><a class="waves-effect waves-light color-main" href="/Quienes-Somos">¿Quiénes Somos?</a></li>
                <li class="dropdown">
                    <a class="waves-effect waves-light color-main dropbtn" href="#">Productos</a>
                    <div class="dropdown-content-custom titulo">
                        <div class="header">
                            <h5>Productos</h5>
                        </div>
                      <navmenu :categoriaid="idCateP" @ver-categoria-producto="verCategoriaProducto"></navmenu>
                    </div>
                </li>
                <li><a class="waves-effect waves-light color-main" href="/Contacto">Contacto</a></li>
            </ul>
        </div>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="#" class="waves-effect waves-light color-main">
                <i class="material-icons color-main">location_on</i>Seleccione su tienda</a>
            </li>
            <li>
                <div class="input-field">
                    <input id="search-1" type="search" required />
                    <label class="label-icon" for="search"><i class="material-icons color-main">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </li>
            <li ><a class="waves-effect waves-light color-main" href="/iniciar-sesion"><i class="material-icons color-main">person</i>Mi cuenta</a></li>
            <li ><a class="waves-effect waves-light color-main" href="/Carrito"><i class="material-icons color-main">shopping_cart</i>Carrito</a></li>
            <li ><a class="waves-effect waves-light color-main" href="/"><i class="material-icons color-main">home</i>Inicio</a></li>
            <li ><a class="waves-effect waves-light color-main" href="/Quienes-Somos"><i class="material-icons color-main">info_outline</i>¿Quiénes Somos?</a></li>
            <li ><a class="waves-effect waves-light color-main" href="/Productos"><i class="material-icons color-main">local_drink</i>Productos</a></li>
            <li ><a class="waves-effect waves-light color-main" href="/Contacto"><i class="material-icons color-main">message</i>Contacto</a></li>
        </ul>
    </nav>
</header>

<script>
    var email = localStorage.getItem('email');
    if (email) {
        var userHtml = document.getElementById('user');
        userHtml.innerHTML = email;
    }

</script>