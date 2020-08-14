
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li @click="menu=5"><a href="#">Clientes</a></li>
</ul>
<nav>
<img class="navImg hide-on-small-only" src="img/image.png" alt="">
<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color=black; ">menu</i></a>
  <div class="fadeInDown">
    
    <ul class="right hide-on-med-and-down nav_options">
      <li @click="menu=3"><a href="#">Sliders</a></li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
      <li @click="menu=7"><a href="#">Cambiar contraseña </a></li>
      <li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        {{ csrf_field() }}
      </form> 
    </ul>
  </div>
</nav>

<ul id="dropdown2" class="dropdown-content">
  <li @click="menu=5"><a href="#">Clientes</a></li>
</ul>
<div>
  <ul class="sidenav" id="mobile-demo">
    <img class="navImg" src="img/image.png" alt="">
    <li @click="menu=3"><a href="#">Sliders</a></li>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
    <li @click="menu=7"><a class="black-text" href="#">Cambiar contraseña </a></li>
    <li>
      <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
    {{ csrf_field() }}
    </form> 
  </ul>
</div>
   

