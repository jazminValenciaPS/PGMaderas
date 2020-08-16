@extends('consolaPrincipal')
@section('consola')
    <template v-if="menu==0">
        <categoria></categoria>
    </template>
    <template v-if="menu==1">
        <subcategoria></subcategoria>
    </template>
    <template v-if="menu==2">
        <productoc></productoc>
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
    <template v-if="menu==8">
        <categoriap></categoriap>
    </template>
    <template v-if="menu==9">
        <stock></stock>
    </template>
@endsection