<template>
    <main class="main-index">
        <h4 class="mt-0 color-main">Carrito de Compra</h4>
        <!-- Container -->
        <div class="row" id="carrito">
            <!-- Cart -->
            <div class="col m8 s12 p-0">
                <table id="lista-carrito" class="responsive-table centered">
                    <thead>
                        <tr class="col m12 s12 p-0">
                            <th class="col m4 s4">Producto</th>
                            <th class="col m2 s5 hide-on-med-only">Cantidad</th>
                            <th class="col m2 hide-on-small-only">Precio Unitario</th>
                            <th class="col m2 s3">Precio Final</th>
                            <th class="col m2 hide-on-small-only">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody v-for="carrito in carrito" :key="carrito.PK_products" >
                        <tr class="col m12 s12 p-0">
                            <td class="col m4 s4">
                                <div class="col m12 s4 p-0">
                                    <img :src="'img/'+carrito.image" class="pImagen-carrito">
                                    <p class="col m6 m-0 hide-on-small-only hide-on-med-only" >{{carrito.description}}</p>
                                </div>                                
                            </td>
                            <td class="col m2 s5">
                                <select id="select-cantidad" class="col s4 m3 s3 browser-default " @change="calcularTotal(carrito)" v-model="carrito.cantidad">
                                    <option disabled value="">{{cantidad}}</option>
                                    <option v-for="items in carrito.avaible" :key="items.index">{{ items }}</option>
                                </select> 
                            </td>
                            <td class="col m2 s2 hide-on-small-only">
                                <h6>$ {{carrito.price}}</h6>
                            </td>
                            <td class="col m2 s3">
                                <h6>${{carrito.precioFinal = carrito.price * carrito.cantidad}}</h6>
                            </td>
                            <td class="col m2">
                                <i class="material-icons color-text hide-on-small-only" style="color: red;" @click="eliminarDeCarrito(carrito.PK_products)">highlight_off</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Summary -->
            <div class="col m4 s12 center">
                <ul class="collection with-header m-0">
                    <li class="collection-header"><h5 class="m-0">Resumen</h5></li>
                    <li id="demo" class="collection-item p-1" >
                        <p class="m-0">Subtotal: ${{carrito.subtotal}}</p>
                        <h5>total: ${{carrito.total}}</h5>
                    </li>
                </ul>
                <!-- Validar si está logueado -->
            </div>
        </div>
        <div class="content-carrito">
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            PK_products:'',
            arrayProductos: [],
            tipoAccion: 0,
            carrito: [],
            cantidad:1,
            total:0,
            subtotal:0,
        }
    },
    methods:{
        async listarProductos(id){
            let m=this;
            var url= `/productoM/${id}`;
            return await axios.get(url);
        },
        eliminarDeCarrito(PK_products){
            let productosLS = this.carrito;
            //Obtenemos el arreglo de productos
            
            // Comparar el id del producto borrado con LS
            productosLS.forEach(function(productoLS, index){
                if(productoLS.PK_products === PK_products){
                    productosLS.splice(index, 1);
                }
            });
            //Añadimos el arreglo actual al LS
            localStorage.setItem('carrito', JSON.stringify(productosLS));
            this.calcularTotal(this.carrito);
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
        },

    },
    async mounted() {
        let carrito = JSON.parse(localStorage.getItem('carrito'));
        if (Array.isArray(carrito)){
            this.carrito = carrito;
        }
        this.carrito = await Promise.all(this.carrito.map(async (producto) => {
            var productoActualizado = await this.listarProductos(producto.PK_products);
            productoActualizado = productoActualizado.data[0];
            producto.avaible = productoActualizado.avaible;
            producto.price = productoActualizado.price;
            producto.name = productoActualizado.name;
            producto.image = productoActualizado.image;
            return producto;
        }));
        this.calcularTotal(this.carrito);
    }
}
</script>