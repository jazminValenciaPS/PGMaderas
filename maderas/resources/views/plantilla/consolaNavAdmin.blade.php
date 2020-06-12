<!-- <nav  class="responsive">
  <div class="fixed finish nav-wrapper">
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <a href="#" class="hide-on-small-only"><img id="imgNav" class="" src="img/LogoWhite100x60.png" style="" alt=""></a>
      <ul class="right hide-on-small-only">
        <li @click="menu=0"><a>Sliders</a></li>
        <li @click="menu=1"><a >Productos</a></li>
        <li @click="menu=2"><a>Categorias</a></li>
        <li @click="menu=3"><a>Cambiar contraseña </a></li>
        <li>
          <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
            {{ csrf_field() }}
            </form>
      </ul>
  </div>
</nav> -->

<nav class="fadeInDown">
  <img class="navImg" src="img/image.png" alt="">
  <ul class="nav_options">
    <li @click="menu=0"><a href="#">Categorias</a></li>
    <li @click="menu=1"><a href="#">SubCategorias</a></li>
    <li @click="menu=2"><a href="#">Productos</a></li>
    <li @click="menu=3"><a href="#">Sliders</a></li>
    <li @click=""><a href="#">Usuarios</a>
      <ul class="subOptions">
        <li @click="menu=4"><a href="">Empleados</a></li>
        <li @click="menu=5"><a href="">Clientes</a></li>
      </ul>
    </li>

    <li @click="menu=6"><a href="#">Envios</a></li>
    <li @click="menu=7"><a href="#">Cambiar contraseña </a></li>
    <li>
      <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
    </li>
  </ul>
</nav>

<!-- <nav class="fadeInDown">
    <img class="navImg" src="img/image.png" alt="">
    <ul class="nav_options" id="mobile-demo">
          <li @click="menu=0"><a class="black-text" href="#">Sliders</a></li>
          <li @click="menu=1"><a class="black-text" href="#">Productos</a></li>
          <li @click="menu=2"><a class="black-text" href="#">Categorias</a></li>
          <li @click="menu=3"><a class="black-text" href="#">Cambiar contraseña </a></li>
          <li>
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          {{ csrf_field() }}
          </form> 
      </ul>

      
</nav> -->
