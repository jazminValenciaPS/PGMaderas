<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Sliders</h5>
            </div>
            <div class="right form ">
                <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('sliders','registrar')">
                    Agregar Sliders
                </button>
            </div>
            <br>
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg " role="document">
                    <div class = "container">
                        <br>
                        <div class="center">
                            <h3 v-text="tituloModal"></h3>
                        </div>
                        <div class="col s12 center">
                            <img v-if="tipoAccion==2" :src="'img/'+image"  class="tImagen imagenEdit" alt="">
                        </div>
                        <div class="form-group row">
                            <!-- input para el nombre del producto --> 
                            <input id="title" type="text" v-model="title" placeholder="titulo Slider"  class="validate" >
                            <!-- <label  for="nombre">Nombre</label> -->
                            <br>  
                            <!-- input para la descripción del producto-->
                            <input id="descripcion" type="text" v-model="description" placeholder="Descripcion" class="validate">
                            <!-- <label  for="descripcion"></label> -->
                            <br> 
                            <!-- input para la imagen del producto --> 
                            <div class="col s10 center">
                                <div class="file-field input-field">
                                    <div class="btn button-image">
                                        <span>Imagen</span>
                                        <input id="file" ref="filea"  type="file" data-vv-scope="new"  v-on:change="seleccionarImagen(1)" class="sliderAlta">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div> 
                        </div> 
                        <div v-show="errorSlider" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorMostrarMsjSlider" :key="error" v-text="error">
                                </div>
                            </div>
                        </div>
                        <div class="button-container form formmodal-footer">
                            <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevoSlider()">Guardar</button>
                            <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarSlider(PK_slider)">Actualizar</button>
                            <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>  
        <!-- modal inicio -->

            <!-- table -->
            <br>
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th class="hide-on-small-only">Descripcion</th>
                        <th class="hide-on-small-only">Imagen</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                    </tr>
                </thead>
                <tbody  v-for="slider in arraySliders" :key="slider.PK_slider">
                    <tr>
                        <td v-text="slider.title"></td> 
                        <td class="hide-on-small-only"  v-text="slider.description"></td>
                        <td class="hide-on-small-only" ><img :src="'img/'+slider.image" class="tImagen square"></td>
                        <td class="hide-on-small-only"  v-if="slider.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="slider.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('sliders','actualizar',slider,slider.PK_slider)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="slider.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="slider.status" @click="desactivarSlider(slider.PK_slider)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="slider.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="slider.status" @click="activarSlider(slider.PK_slider)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            arraySliders:[],
            image: '', 
            modal : 0,
            title: '',
            description: '',
            tituloModal : '' ,
            status: true,
            cambio : 0,
            tipoAccion : 0,
            PK_slider: '',
            errorSlider:'',
            errorMostrarMsjSlider: [],
        }
    },
    methods:{
        listarSliders(){
            let m=this;
            axios.get('/slider').then(function (response){
                m.arraySliders = response.data;
                m.status = response.status.data;
                if(status == true){
                    status = 1
                }else{
                    status = 0
                }
            })
            .catch(function(error){
                console.log(error);
            });
        },
        limpiar() {
            let me = this;
            me.errors.clear('new');
            me.errors.clear('update');
            me.image = '';
            me.tipoAccion = 0;
            me.Cambio = 0;
            me.title='';
            me.description='';
            $("#file").val("");
        },
        seleccionarImagen(img){
            if (img == 1) {            
                this.file = this.$refs.filea.files[0];
                readURL(document.getElementsByClassName("sliderAlta")[0], 1);
            }
            else {
                this.file = this.$refs.filec.files[0];
                readURL(document.getElementsByClassName("sliderEdit")[0], 2);
            }
            this.cambio = 1;

            function readURL(input, img) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if (img == 1) {
                            $('.imgAlta').attr('src', e.target.result);
                        }
                        else {
                            $('.imgCambio').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        },
        nuevoSlider() {
             if (this.validarSlider()){
                return;
            }
            let me = this;
            let formData = new FormData();

            formData.append('file', me.file);
            formData.append('title', me.title);
            formData.append('description', me.description);
            
            axios.post('/slider/registrar', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(function (response) {
                me.listarSliders();
                me.cerrarModal();
                me.limpiar();          
             })
            .catch(function (error) {
           
        console.log(error);
            });
        },
        actualizarSlider(PK_slider){
            if (this.validarSlider()){
                return;
            }
            
            let me = this;

            let formData = new FormData();
            
            formData.append('file', me.file);
            formData.append('PK_slider',PK_slider);
            formData.append('title', me.title);
            formData.append('description', me.description);

            // Regresamos la informacion
            axios.post('/slider/actualizar', formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (response) {
                me.listarSliders();
                me.cerrarModal();
                me.limpiar();
            
            })
            .catch(function (error) {
                console.log(error);
                });
        },
        cerrarModal(){
            this.modal=0;
            this.tituloModal='';
            this.image='';
            this.file='';
            this.title='';
            this.description='';
        },
        abrirModal(modelo,accion, data = []){
            switch(modelo){
                case "sliders":{
                    switch(accion){
                        case 'registrar':{
                            this.modal = 1;
                            this.title ='';
                            this.description = '';
                            this.tipoAccion = 1;
                            this.tituloModal = 'Registrar sliders';
                            this.image = '';
                            break;
                        }
                        case 'actualizar':{
                            this.modal = 2;
                            this.title = data['title'];
                            this.description = data['description'];
                            this.tipoAccion = 2;
                            this.tituloModal = 'Actualizar slider';
                            this.PK_slider=data['PK_slider'];
                            this.image=data['image'];
                            break;
                        }
                    }

                }
            }
        },
        validarSlider(){
            this.errorSlider=0;
            this.errorMostrarMsjSlider =[];
            
            if (!this.file ) this.errorMostrarMsjSlider.push("Se tiene que ingresar una imagen.");
            if (!this.title) this.errorMostrarMsjSlider.push("El titulo del Slider no puede estar vacío.");   
            if (this.errorMostrarMsjSlider.length) this.errorSlider = 1;

            return this.errorSlider;

           
        },
        desactivarSlider(PK_slider){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de desactivar este slider?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    axios.put('/slider/desactivar',{
                        'PK_slider': PK_slider
                    }).then(function (response) {
                        me.listarSliders();
                        Swal.fire(
                            'Desactivado!',
                            'El slider ha sido desactivado con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if(
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ){
                        me.listarSliders();
                    }
            })
        },
        activarSlider(PK_slider){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de activar este slider?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                axios.put('/slider/activar',{
                    'PK_slider': PK_slider
                }).then(function (response) {
                    me.listarSliders();
                    Swal.fire(
                        'activado!',
                        'El slider ha sido activado con éxito.',
                        'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });
            
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                        me.listarSliders();                    
            }
            }) 
                
        },
    },
    mounted(){
        this.listarSliders();
    }
};
</script>
<style>
.modal-content{
    width: 100% !important;
    position: absolute !important;
    height: 600px;
}
.mostrar{
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    z-index: 100;
}
.centrado{
    max-height:560px !important;
     margin-left: 20% !important;
     margin-right: 30% ;
}
.espacioButton{
    margin-left: 10px !important;
}

</style>