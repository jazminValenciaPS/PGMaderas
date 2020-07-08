@extends('principal')
@section('ecommerce')
    <template v-if="menu==0">
        <inicio></inicio>
    </template>
    <template v-if="menu==1">
        <quienes><quienes>
    </template>
    <template v-if="menu==2">
        <productost :productoid="idProducto" @mostrar-producto="mostrarProducto"></productost>
    </template>
    <template v-if="menu==3">
        <contacto></contacto>
    </template>
    <template v-if="menu==4">
        <perfil></perfil>
    </template>
    <template v-if="menu==5">
        <carrito></carrito>
    </template>
    <template v-if="menu==6">
        <producto :productoid="idProducto"></producto>
    </template>
@endsection