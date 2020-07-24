<template>
    <main>
           <!-- modal -->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container" style="margin-bottom: 10px;">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div>
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
                </div>
            </div>
        </div>  
        <div class="hero-container-main">
            <section class="container-main-order">
                <img src="img/LOGO PG.png" alt="">
                <h5>Completa tu orden</h5>
            </section>
            <section class="container-resumen-order">
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
            <section class="container-metodo-entrega">
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
                        <input name="group1" v-model="entrega" value="2"  type="radio" checked />
                        <span><i class="material-icons left m-0">directions_walk</i>Recoger en tienda</span>
                    </label>
                    </p>
                </form>
            </section>
            <section class="container-metodo-tienda">
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
                   <div class="informacion-tienda-Datos">
                       <h6>Datos personales:</h6>
                        <form>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" v-model="nombre"  name="nombre" type="text" class="validate">
                                <label for="nombre">Nombre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" v-model="apellido"  name="apellido" type="text" class="validate">
                                <label for="apellido">apellido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" v-model="telefono"  name="telefono" type="tel" class="validate">
                                <label for="telefono">Telefono</label>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>
            <section class="container-metodo-pago">
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
            <section class="container-carrito">
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
            <section class="container-metodo-button">
                <a class="waves-effect bg-main waves-light btn aling"><i class="material-icons right">attach_money</i>Ir a pagar</a>
            </section>
        </div>

     
    </main>
</template>
<script>
export default {
    data(){
        return{
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
        async listarProductos (id){
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

            localStorage.setItem('carrito', JSON.stringify(this.carrito));
            console.log(this.carrito,"carrito guardar");
        },
        abrirModal(modelo,accion, data = [],){
            let m=this;
            switch(modelo){
                case "tarjeta":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar tarjeta';
                            break;

                        }
                    }
                }
            }
        },
        guardarTarjeta(){
            if(validarDatos){

            }
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

                if (!this.first_name) this.errorMostrarMsjCliente.push("El nombre no puede estar vacío.");
                if (!this.last_name) this.errorMostrarMsjCliente.push("El apellido no puede estar vacío.");
                if (!this.numTarjeta) this.errorMostrarMsjCliente.push("Se tiene que ingresar un número de teléfono.");
                if (!this.fechaExp) this.errorMostrarMsjCliente.push("Seleccione la fecha de nacimiento.");
                if (!this.gender) this.errorMostrarMsjCliente.push("Seleccione el género .");
                if (!this.city) this.errorMostrarMsjCliente.push("Ingrese la ciudad.");
                if (!this.state) this.errorMostrarMsjCliente.push("Ingrese el estado.");
                if (!this.street) this.errorMostrarMsjCliente.push("Ingrese la calle.");
                if (!this.state) this.errorMostrarMsjCliente.push("Ingrese el estado.");
                if (!this.postal_code) this.errorMostrarMsjCliente.push("Ingrese el código postal.");
                if (!this.suburb) this.errorMostrarMsjCliente.push("Ingrese la colonia .");
                if(isNaN(this.phone))this.errorMostrarMsjCliente.push("El teléfono debe ser numérico.");


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
       
    }
}
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
        height:560px;
        margin-left: 20%;
        margin-right: 30%;
    }
    .espacioButton{
        margin-left: 10px !important;
    }
</style>