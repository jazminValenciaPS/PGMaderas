@extends('tienda.principal')
@section('ecommerce')

<productost :productoid="idProducto" @mostrar-producto="mostrarProducto" ></productost>


@endsection