
<!-- Dropdown Structure -->

<ul id="dropdown3" class="dropdown-content">
<li @click="menu=7"><a href="#">Cambiar contraseña </a></li>
      <li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        {{ csrf_field() }}
      </form> 
</ul>
<nav>
<img class="navImg hide-on-small-only" src="img/image.png" alt="">
<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color=black; ">menu</i></a>
  <div class="fadeInDown">
    
    <ul class="right hide-on-med-and-down nav_options">
      <li @click="menu=6"><a href="#">Pedidos</a></li>
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">{{ auth()->user()->email}}<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>


<div>
  <ul class="sidenav" id="mobile-demo">
    <img class="navImg" src="img/image.png" alt="">

    <li @click="menu=6"><a href="#">Pedidos</a></li>
    <li @click="menu=7"><a class="black-text" href="#">Cambiar contraseña </a></li>
    <li>
      <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
    {{ csrf_field() }}
    </form> 
  </ul>
</div>
   

