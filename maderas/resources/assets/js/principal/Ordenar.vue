<template>
    <main>
        <!-- modal -->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg bottom-modal" role="document">
                <div class = "container" style="margin-bottom: 10px;">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div>
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons">credit_card</i>
                                    Mis tarjetas
                                </div>
                                <div class="collapsible-body"><p>No tienes tarjetas registradas</p></div>
                            </li>
                            <li>
                                <div class="collapsible-header">
                                    <i class="material-icons">library_add</i>
                                    Registrar una nueva tarjeta
                                </div>
                                <div class="collapsible-body">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s12 m6">
                                            <input id="numTarjeta" v-model="numTarjeta"  name="nombre" type="text" class="validate">
                                            <label for="numTarjeta">Numero de Tarjeta</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s6">
                                                <label for="fechaExp">Fecha de expiracion</label>
                                                <input type="month" v-model="fechaExp"  name="fecha" id="fechaExp" class="form-control" value="mes-año">
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="input_text" v-model="codSegu" type="text" data-length="3">
                                                <label for="input_text">Codigo de seguridad</label>
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="input-field col s12 m6">
                                                <input id="first_name" v-model="nombrePropietario" type="text" class="validate">
                                                <label for="first_name">Nombre(s)</label>
                                            </div>
                                            <div class="input-field col s12 m6">
                                                <input id="last_name" v-model="apellidoPropietario" type="text" class="validate">
                                                <label for="last_name">Apellidos</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="switch">
                                                <label for="last_name">¿Desea guardar esta tarjeta para futuras compras?</label>
                                                <label>
                                                Si
                                                <input type="checkbox">
                                                <span class="lever"></span>
                                                No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="card-action center">
                                            <a class="btn bg-main" @click="guardarTarjeta()">Guardar</a>
                                            <a class="btn bg-main " @click="cerrarModal()">Cerrar</a>
                                        </div> 
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>  
        <div class="hero-container-main">
            <section class="container-main-order">
                <img src="img/LOGO PG.png" alt="">
                <h5>Completa tu orden</h5>
            </section>
            <section class="container-resumen-order" style="z-index:0">
                <h5 class="title" style="margin-bottom: 5px;">Resumen</h5>
                    <ul class="collection">
                        <li class="collection-items">
                            <p class="m-0">Subtotal: ${{carrito.subtotal}}</p>
                        </li>
                        <li class="contenedor-carrito-pro" >
                            <h6>total: ${{carrito.total}}</h6>
                        </li> 
                    </ul>
            </section>
            <section class="container-metodo-entrega" style="z-index:0">
                <h6>Metodo de entrega</h6>
                 <form action="#">
                    <p>
                    <label>
                        <input name="group1" v-model="entrega" value="1" type="radio" />
                        <span><i class="material-icons left m-0">local_shipping</i> Entrega a domicilio</span>
                    </label>
                    </p>
                    <p>
                    <label>
                        <input name="group1" v-model="entrega" value="2"  type="radio" />
                        <span><i class="material-icons left m-0">directions_walk</i>Recoger en tienda</span>
                    </label>
                    </p>
                </form>
            </section>
            <section class="container-metodo-tienda" style="z-index:1" >
                <h6>informacion en tienda</h6>
                    <div class="informacion-tienda-select">
                        <select v-model="tienda">
                            <option value="" disabled selected>Seleccione su tienda</option>
                            <option value="1">Matriz Culiacán</option>
                            <option value="2">Sucursal Zapata</option>
                            <option value="3">Sucursal Monterrey</option>
                            <label>Materialize Select</label>
                        </select> 
                    </div>
            </section>
            <section class="container-metodo-pago" style="z-index:0">
                <h6>Metodo de pago</h6>
                  <form action="#">
                    <p>
                    <label>
                        <input name="group1" v-model="pago" value="1" type="radio"/>
                        <span class="modal-trigger" data-target="modal1" @click="abrirModal('tarjeta','registrar')"><i class="material-icons left m-0 ">credit_card</i>Tarjeta de credito/ debito</span>
                    </label>
                    </p>
                    <p>
                    <label>
                        <input name="group1" v-model="pago" value="2" type="radio"/>
                        <span><i class="material-icons left m-0">attach_money</i>Efectivo</span>
                    </label>
                    </p>
                </form>
            </section>
            <section class="container-carrito" style="z-index:0">
                <h5 class="title">Carrito de Compra</h5>
                <ul class="collection" v-for="carrito in carrito" :key="carrito.PK_products">
                    <li class="collection-items">
                        <p class="col m6 s6 m-0">{{carrito.description}}</p>
                        <h6>${{carrito.price}}</h6>
                    </li>
                    <li class="contenedor-carrito-pro" >
                        <img :src="'img/'+carrito.image" class="image-item">
                        <p> Cantidad:{{carrito.cantidad}}</p>
                    </li>
                </ul>
            </section>
            <section class="container-metodo-button" style="z-index:0">
                <a class="waves-effect bg-main waves-light btn aling" @click="guardarOrden()"><i class="material-icons right">attach_money</i>Ir a pagar</a>
            </section>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            usuario:'',
            idUsers:'',
            PK_products:'',
            arrayProductos: [],
            tipoAccion: 0,
            carrito: [],
            cantidad:1,
            total:0,
            subtotal:0,
            nombre:'',
            apellido:'',
            telefono:'',
            entrega:'',
            tienda:'',
            pago:'',
            tituloModal:'',
            modal:0,
            tipoAccion:0,
            numTarjeta:'',
            fechaExp:'',
            codSegu:'',
            nombrePropietario:'',
            apellidoPropietario:'',
            errorOrder:0,
            errorMostrarMsjOrder:[],
        }
    },
    methods:{
        async listarProductos(id){
            let m=this;
            var url= `/productoM/${id}`;
            return await axios.get(url);
        },
         calcularTotal(carrito){
            var total = this.total;
            var subtotal = this.subtotal;
           
            for(let i = 0; i < this.carrito.length; i++){
                let element = Number(this.carrito[i].price * this.carrito[i].cantidad);
                total = total + element; 
            }
            
            subtotal = parseFloat(total).toFixed(2);
            this.carrito.total = total;
            this.carrito.subtotal = subtotal;
            this.subtotal = subtotal;
            this.total = total;
            localStorage.setItem('carrito', JSON.stringify(this.carrito));
        },
        abrirModal(modelo,accion, data = [],){
            let m=this;
            switch(modelo){
                case "tarjeta":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.tipoAccion = 1;
                            m.tituloModal = 'Tarjetas';
                            break;

                        }
                    }
                }
            }
        },
        guardarOrden(){
            let me = this;

            let formData = new FormData();
            // if(me.pago == 1){
                formData.append('id_type', me.entrega);
                formData.append('subtotal', me.subtotal);
                formData.append('total', me.total);
                formData.append('id_payment', me.pago);
                formData.append('correo', me.usuario);
            // }else{
            //     formData.append('id_type', me.entrega);
            //     formData.append('subtotal', me.subtotal);
            //     formData.append('total', me.total);
            //     formData.append('id_payment', me.pago);
            //     formData.append('card', me.numTarjeta);
            //     formData.append('id_payment', me.pago);
            // }
       
            let url = '/order/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
            })
            .catch(function (error) {
                console.log(error);
            });
           
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.errorOrder = 0;
            this.errorMostrarMsjOrder = [];
        },
        validarDatos(){
            this.errorCliente = 0;
            this.errorMostrarMsjCliente = [];
            if (!this.nombrePropietario) this.errorMostrarMsjCliente.push("El nombre no puede estar vacío.");
            if (!this.apellidoPropietario) this.errorMostrarMsjCliente.push("El apellido no puede estar vacío.");
            if (isNaN(this.numTarjeta)) this.errorMostrarMsjCliente.push("El numero de tarjeta debe de ser numerico.");
            if (isNaN(this.codSegu)) this.errorMostrarMsjCliente.push("El codigo de seguridad debe de ser numerico.");

            if (this.errorMostrarMsjCliente.length) this.errorCliente = 1;
            return this.errorCliente;
        },
    },
    async mounted() {
        let carrito = JSON.parse(localStorage.getItem('carrito'));
        if (Array.isArray(carrito)){
            this.carrito = carrito;
        }
        this.carrito = await Promise.all(this.carrito.map(async (producto) => {
            var productoActualizado = await this.listarProductos(producto.SKU);
            productoActualizado = productoActualizado.data[0];
            producto.avaible = productoActualizado.avaible;
            producto.price = productoActualizado.price;
            producto.name = productoActualizado.name;
            producto.image = productoActualizado.image;
            return producto;
        }));
        this.calcularTotal(carrito);
        console.log(carrito);
        this.usuario = localStorage.getItem('email');
    }
}
</script>

<style>
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        z-index: 100;
    }
    .bottom-modal{
        margin-bottom: 5%;
    }
</style>