@extends('principal')
@section('ecommerce')
    <template v-if="menu==0">
        <inicio></inicio>
    </template>
    <template v-if="menu==1">
        <quienes><quienes>
    </template>
    <template v-if="menu==2">
        <productos></productos>
    </template>
    <template v-if="menu==3">
    </template>
    <template v-if="menu==4">
        <perfil></perfil>
    </template>
    <template v-if="menu==5">
    </template>
@endsection