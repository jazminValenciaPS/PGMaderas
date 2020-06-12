@extends('consolaPrincipal')
@section('consola')
    <template v-if="menu==0">
        <h1>Categorias</h1>
        <categoria></categoria>
    </template>
    <template v-if="menu==1">
        <h1>Subcategorias</h1>
        <subcategorias></subcategorias>
    </template>
    <template v-if="menu==2">
        <h1>Productos</h1>
        <productos></productos>
    </template>
    <template v-if="menu==3">
        <slider></slider>
    </template>
    <template v-if="menu==4">
        <usuarios></usuarios>
    </template>
    <template v-if="menu==5">
        <envios></envios>
    </template>
    <template v-if="menu==6">
        <contraseña></contraseña>
    </template>
@endsection