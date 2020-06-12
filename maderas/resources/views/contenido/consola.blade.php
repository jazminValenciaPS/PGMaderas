@extends('consolaPrincipal')
@section('consola')
    <template v-if="menu==0">
        <!-- <h1>Categorias</h1> -->
        <categoria></categoria>
    </template>
    <template v-if="menu==1">
        <!-- <h1>Subcategorias</h1> -->
        <subcategoria></subcategoria>
    </template>
    <template v-if="menu==2">
        <!-- <h1>Productos</h1> -->
        <producto></producto>
    </template>
    <template v-if="menu==3">
        <slider></slider>
    </template>
    <template v-if="menu==4">
        <empleado></empleado>
    </template>
    <template v-if="menu==5">
        <cliente></cliente>
    </template>
    <template v-if="menu==6">
        <envio></envio>
    </template>
    <template v-if="menu==7">
        <contraseña></contraseña>
    </template>
@endsection