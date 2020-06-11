@extends('consolaPrincipal')
@section('consola')
    <template v-if="menu==0">
        <categorias-component></categorias-component>
    </template>
    <template v-if="menu==1">
        <subcategorias-component></subcategorias-component>
    </template>
    <template v-if="menu==2">
        <productos-component></productos-component>
    </template>
    <template v-if="menu==3">
        <slider-component></slider-component>
    </template>
    <template v-if="menu==4">
        <usuarios-component></usuarios-component>
    </template>
    <template v-if="menu==5">
        <envios-component></envios-component>
    </template>
    <template v-if="menu==6">
        <contraseña-component></contraseña-component>
    </template>
@endsection