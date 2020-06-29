<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class="title" style="padding-bottom: 2%;">
                <h5>Pedidos</h5>
            </div>
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre del cliente</th>
                        <th class="hide-on-small-only">SubTotal</th>
                        <th class="hide-on-small-only">Total</th>
                        <th class="hide-on-small-only">Estatus del Envio</th>
                        <th class="hide-on-small-only">Estatus de la orden</th>
                        <th class="hide-on-small-only">Editar estatus</th>
                        <th class="hide-on-small-only">Actualizar estatus</th>
                    </tr>
                </thead>
                <tbody  v-for="envios in arrayPedidos" :key="envios.id">
                    <tr>
                        <td v-text="envios.first_name"></td> 
                        <td class="hide-on-small-only"  v-text="envios.subtotal"></td>
                        <td class="hide-on-small-only"  v-text="envios.total"></td>
                        <td class="hide-on-small-only"  v-text="envios.statusS"></td>
                        <td class="hide-on-small-only"  v-text="envios.statusO"></td>
                         <td>
                            <i class="material-icons color-text " @click="abrirModal('empleados','actualizar',user,user.id)">create</i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            idPedidos:0,
            first_name:'',
            last_name:'',
            id_user:0,
            statusS:'',
            statusO:'',
            id_person:0,
            id_shipments:0,
            total:0,
            subtotal:0,
            arrayPedidos:[],
        }
    },
    methods:{
        listarPedidos(){
                let m=this;
                axios.get('/order').then(function (response){
                m.arrayPedidos = response.data;
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
    },
    mounted(){
        this.listarPedidos();
    }
    
}
</script>