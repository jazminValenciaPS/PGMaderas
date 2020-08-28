<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class="title" style="padding-bottom: 2%;">
                <h5>Pedidos</h5>
            </div>
            <section>
                <div class="right input-field col s6 m6 g6">
                        <select name="LeaveType" class="browser-default" v-model="criterio" >
                            <option value="" disabled >Selecciona la sucursal</option>
                            <option v-for="sucursal in arraySucursales" :value="sucursal.PK_PG_branches" :key="sucursal.PK_PG_branches" >{{ sucursal.street }}</option>
                        </select> 
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#test1">Test 1</a></li>
                        <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
                        <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
                        <li class="tab col s3"><a href="#test4">Test 4</a></li>
                    </ul>
                    </div>
                    <div id="test1" class="col s12">Test 1</div>
                    <div id="test2" class="col s12">Test 2</div>
                    <div id="test3" class="col s12">Test 3</div>
                    <div id="test4" class="col s12">Test 4</div>
                </div>
            </section>
          

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
                        <td class="hide-on-small-only"  v-text="envios.statusShipments"></td>
                        <td class="hide-on-small-only"  v-text="envios.statusOrder"></td>
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