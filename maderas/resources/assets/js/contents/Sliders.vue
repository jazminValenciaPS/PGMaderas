<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Sliders</h5>
            </div>
            <div class="right form ">
                <button type="summit">
                    Agregar Sliders
                </button>
            </div>
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th class="hide-on-small-only">Descripcion</th>
                        <th class="hide-on-small-only">Imagen</th>
                        
                    </tr>
                </thead>
                <tbody  v-for="categoria in arrayCategoria" :key="categoria.idCategoria">
                    <tr>
                        <td v-text="categoria.nombre"></td> 
                        <td class="hide-on-small-only"  v-text="categoria.nombreCaracteristica"></td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('Categoria','actualizar',categoria,categoria.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="categoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarCategoria(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>