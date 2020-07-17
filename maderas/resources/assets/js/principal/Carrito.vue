<template>
    <main>
        <h4 class="mt-0 color-main">Carrito de Compra</h4>
        <!-- Container -->
        <div class="row" id="carrito">
            <!-- Cart -->
            <div class="col m8 s12 p-0">
                <table id="lista-carrito" class="responsive-table">
                    <thead>
                        <tr class="col m12 s12 p-0">
                            <th class="col m6 s6">Producto</th>
                            <th class="col m2 s2">Cantidad</th>
                            <th class="col m2 s2">Precio Unitario</th>
                            <th class="col m2 s2">Precio Final</th>
                        </tr>
                    </thead>
            
                    <tbody v-for="carrito in carrito" :key="carrito.PK_products" >
                        <tr class="col m12 s12 p-0">
                            <td class="col m6 s6">
                                <div class="col m12 s12 p-0">
                                    <a :href="'/Ver-Producto?id='+carrito.PK_products"><img :src="'img/'+carrito.image" class="pImagen"></a>
                                    <p class="col m6 s6 m-0">{{carrito.description}}</p>
                                </div>                                
                            </td>
                            <td class="col m2 s2 ">
                                <select id="select-cantidad" class="col s4 m3 s5 browser-default ">
                                    <option value="" >{{carrito.cantidad}}</option>
                                    <option v-for="items in arrayProductos" :key="items.PK_products">{{ items.avaible }}</option>
                                </select> 
                            </td>
                            <td class="col m2 s2">
                                <h6>$ {{carrito.price}}</h6>
                            </td>
                            <td class="col m2 s2">
                                <h6></h6>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="col m4 s12 center">
                <ul class="collection with-header m-0">
                    <li class="collection-header"><h5 class="m-0">Resumen</h5></li>
                    <li class="collection-item p-1">
                        <p class="m-0">Subtotal: $798</p>
                        <h5>Total: $798</h5>
                    </li>
                </ul>

                <a class="btn bg-main mt-2" href="#">Pagar<i class="material-icons left m-0">attach_money</i></a>

            </div>
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
            total: 0,
        }
    },
    methods:{
        async listarProductos (id){
            let m=this;
            var url= `/productoM/${id}`;
            return await axios.get(url);
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
        console.log(this.carrito);

    }
}
</script>