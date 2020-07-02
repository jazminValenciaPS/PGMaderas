<template>
    <main>

        <h4 class="mt-0 color-main">Carrito de Compra</h4>

        <!-- Container -->
        <div class="row">
            <!-- Cart -->
            <div class="col m8 s12 p-0">
                <table class="responsive-table">
                    <thead>
                        <tr class="col m12 s12 p-0">
                            <th class="col m6 s6">Producto</th>
                            <th class="col m2 s2">Cantidad</th>
                            <th class="col m2 s2">Precio Unitario</th>
                            <th class="col m2 s2">Precio Final</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        <tr class="col m12 s12 p-0">
                            <td class="col m6 s6">
                                <div class="col m12 s12 p-0">
                                    <img class="col m6 s6 p-0 materialboxed" width="100%" src="https://revista-mm.com/wp-content/uploads/2018/08/madera-1.jpg">
                                    <p class="col m6 s6 m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id modi accusantium possimus incidunt ...</p>
                                </div>                                
                            </td>
                            <td class="col m2 s2">
                                <h6>1</h6>
                            </td>
                            <td class="col m2 s2">
                                <h6>$399</h6>
                            </td>
                            <td class="col m2 s2">
                                <h6>$399</h6>
                            </td>
                        </tr>
                        <tr class="col m12 s12 p-0">
                            <td class="col m6 s6">
                                <div class="col m12 s12 p-0">
                                    <img class="col m6 s6 p-0 materialboxed" width="100%" src="https://revista-mm.com/wp-content/uploads/2018/08/madera-1.jpg">
                                    <p class="col m6 s6 m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id modi accusantium possimus incidunt ...</p>
                                </div>                                
                            </td>
                            <td class="col m2 s2">
                                <h6>1</h6>
                            </td>
                            <td class="col m2 s2">
                                <h6>$399</h6>
                            </td>
                            <td class="col m2 s2">
                                <h6>$399</h6>
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
        
            }
            },
            methods:{
             
            },
        mounted() {
            console.log("Component mounted");
        }
     }


 </script>