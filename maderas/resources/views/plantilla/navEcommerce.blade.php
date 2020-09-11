 <header>
    <!-- Nav Bar -->
    <nav class="nav-principal-inicio">
        <div class="nav-wrapper">
            <div class="left container-img-select">
                <a @click="menu=0" href="/"><img src="img/logo-nav.png" width="260px"/></a>
                <navsucursal></navsucursal>
                <i class="material-icons prefix color-main ">location_on</i>
            </div>
                <ul class="right hide-on-med-and-down buscador-carrito" >
                    <li class="col m7 s6" >
                        <buscar></buscar>
                    </li>
                    <li class="col m8 s7">
                        <navuser></navuser>
                    </li>
                    <li class="linea "></li>
                    <li ><a class="waves-effect waves-light" href="/Carrito"><img src="img/truckIcon2.png" alt=""></a></li>
                </ul>
        </div>
    </nav>
<!-- nav 2 -->
    <nav class="white nav-2 ">
        <div class="nav-wrapper navbar">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <i class="material-icons color-main">menu</i>
            </a>
            <ul class="left hide-on-med-and-down">
                <li class=""><a class=" letraTN waves-effect waves-light grey-text text-darken-2" href="/"><i class="Large material-icons color-main" style="padding:0 3px;">home</i>Inicio</a></li>
                <li><a class=" letraTN waves-effect waves-light grey-text text-darken-2" href="/Quienes-Somos"><i class="material-icons color-main" style="padding:0 3px;">info_outline</i>¿Quiénes Somos?</a></li>
                <!-- <li class="dropdown">
                    <a class="letraTN waves-effect waves-light grey-text text-darken-2 dropbtn" href="#"><i class="material-icons color-main" style="padding:0 3px;">collections_bookmark</i>Catalogo</a>
                    <div class="dropdown-content-custom titulo">
                        <div class="header">
                            <h5>Productos</h5>
                        </div>
                      <navmenu :categoriaid="idCateP" @ver-categoria-producto="verCategoriaProducto"></navmenu>
                    </div>
                </li> -->
                <li><a class=" letraTN waves-effect waves-light grey-text text-darken-2" href="/Contacto"><i class="material-icons color-main" style="padding:0 3px;">message</i>Contacto</a></li>
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
            <!-- <li ><a class="waves-effect waves-light color-main" href="/Productos"><i class="material-icons color-main">local_drink</i>Productos</a></li> -->
            <li ><a class="waves-effect waves-light color-main" href="/Contacto"><i class="material-icons color-main">message</i>Contacto</a></li>
        </ul>
    </nav>
</header>