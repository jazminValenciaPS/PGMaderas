
    <header>
        <!-- Nav Bar -->
        <nav class="white">
            <div class="nav-wrapper">
                <a @click="menu=0" href="#!" class="brand-logo"><img src="img/logo-nav.png" width="260px" /></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" class="waves-effect waves-light black-text">
                        <i class="material-icons right color-main">location_on</i>
                        Seleccione su tienda
                    </a></li>
                    <li>
                        <div class="input-field">
                            <input id="search" type="search" required placeholder="Buscar" />
                            <label class="label-icon" for="search"><i class="material-icons color-main">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </li>
                    <li @click="menu=4"><a class="waves-effect waves-light" href="#"><i class="material-icons color-main">person</i></a></li>
                    <li @click="menu=5"><a class="waves-effect waves-light" href="#"><i class="material-icons color-main">shopping_cart</i></a></li>
                </ul>
            </div>
        </nav>


        <!-- Nav Bar 2 -->
        <nav class="white nav-2">
            <div class="nav-wrapper">
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons color-main">menu</i></a>
                <ul class="right hide-on-med-and-down">
                        <li @click="menu=0"><a class="waves-effect waves-light color-main" href="#">Inicio</a></li>
                        <li @click="menu=1"><a class="waves-effect waves-light color-main" href="#">Quiénes Somos</a></li>
                        <li @click="menu=2"><a class="waves-effect waves-light color-main" href="#">Productos</a></li>
                        <li @click="menu=3"><a class="waves-effect waves-light color-main" href="#">Contacto</a></li>
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
                <li @click="menu=4"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">person</i>Mi cuenta</a></li>
                <li @click="menu=5"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">shopping_cart</i>Carrito</a></li>
                <li @click="menu=0"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">home</i>Inicio</a></li>
                <li @click="menu=1"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">info_outline</i>Quiénes Somos</a></li>
                <li @click="menu=2"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">local_drink</i>Productos</a></li>
                <li @click="menu=3"><a class="waves-effect waves-light color-main" href="#"><i class="material-icons color-main">message</i>Contacto</a></li>
            </ul>
        </nav>
    </header>