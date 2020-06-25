<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Envios</h5>
            </div>
            <div class="right form ">
                <button type="summit">
                    Agregar Envios
                </button>
            </div>
            <table class="tabla centered">
                <thead>
                    <tr>
                        <!-- <th>Nombre</th> -->
                        <th>Titulo</th>
                        <th class="hide-on-small-only">Subtotal</th>
                        <th class="hide-on-small-only">Status</th>
                        <!-- <th>Editar</th> -->
                        <th>Desactivar/Activar</th>
                    </tr>
                </thead>
                    <tbody  v-for="envios in arrayEnvios" :key="envios.id">
                    <tr>
                        <td v-text="envios.title"></td> 
                        <td class="hide-on-small-only"  v-text="envios.subtotal"></td>
                        <td class="hide-on-small-only"  v-if="envios.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="envios.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('envio','actualizar',envios,envios.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="envios.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="envios.status" @click="desactivarEnvio(envios.id)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="envios.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="envios.status" @click="activarEnvio(envios.id)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </main>
</template>