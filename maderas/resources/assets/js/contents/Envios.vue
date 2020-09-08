<template>
     <main class="row hero">
        <div class="col s12 m12 l12">
            <div class="title" style="padding-bottom: 2%;">
                <h5>Pedidos</h5>
            </div>
        </div>
            <!-- <section>
                <div class="right input-field col s6 m6 g6">
                        <select name="LeaveType" class="browser-default" v-model="criterio" >
                            <option value="" disabled >Selecciona la sucursal</option>
                            <option v-for="sucursal in arraySucursales" :value="sucursal.PK_PG_branches" :key="sucursal.PK_PG_branches" >{{ sucursal.street }}</option>
                        </select> 
                </div>
            </section> -->
             <div class="col s12 m12 l12"> 
                <div class="row">
                    <br>
                    <div class="form-group center">
                        <div class="col l12 buscarC">
                            <div class="input-field col s2">
                                <select name="LeaveType" class="browser-default" v-model="criterio">
                                    <option value="" disabled selected>Selecciona con que buscar</option>
                                    <option value="name">Nombre</option>
                                </select>  
                             </div>
                            <div class="input-field col s4">
                                <input type="text" v-model="buscar" @keyup.enter="listarPedidos(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                             </div>
                            <div class="input-field col s2">
                                <a  @click="listarPedidos(1,buscar,criterio)" class="left btn-floating"><i class="material-icons">search</i></a>
                            </div>
                             <div class=" form input-field col s6 botones">
                                  <div class="col s12 m12 l12"> 
                                        <div class="row estatus">
                                            <br>
                                            <p >
                                            <label >
                                                <input v-model="estatus" @click="listarPedidos(1,'','',estatus)" value="Todos" class="with-gap" name="group1" type="radio" checked />
                                            <span>Todos</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input v-model="estatus" @click="listarPedidos(1,'','',estatus)" value="Pendientes"  class="with-gap" name="group1" type="radio" />
                                                <span>Pendientes</span>
                                            </label>
                                            </p>
                                              <p>
                                            <label>
                                                <input v-model="estatus" @click="listarPedidos(1,'','',estatus)" value="Preparando" class="with-gap" name="group1" type="radio" />
                                                <span>Preparando</span>
                                            </label>
                                            </p>
                                            
                                        </div>
                                    </div>
                                     <div class="col s12 m12 l12"> 
                                        <div class="row estatus">
                                            <p>
                                            <label>
                                                <input v-model="estatus" @click="listarPedidos(1,'','',estatus)" value="Entregado" class="with-gap" name="group1" type="radio"  />
                                                <span>Entregado</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input v-model="estatus"  @click="listarPedidos(1,'','',estatus)" value="Cancelado" class="with-gap" name="group1" type="radio" />
                                                <span>Cancelado</span>
                                            </label>
                                            </p>
                                            <p>
                                            <label>
                                                <input v-model="estatus"  @click="listarPedidos(1,'','',estatus)" value="PE" class="with-gap" name="group1" type="radio"/>
                                                <span>Parcialmente entregado</span>
                                            </label>
                                            </p>        
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                    <br>

            

            <table class="tabla centered">
               <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del cliente</th>
                        <th class="hide-on-small-only">Fecha</th>
                        <th class="hide-on-small-only">Total</th>
                        <th class="hide-on-small-only">Estatus</th>
                        <th class="hide-on-small-only">Editar estatus</th>
                      
                    </tr>
                </thead>
                <tbody  v-for="envios in arrayPedidos" :key="envios.id">
                    <tr>
                        <td v-text="envios.PK_orders"></td>
                        <td v-text="envios.full_name"></td> 
                        <td class="hide-on-small-only"  v-text="envios.date"></td>
                        <td class="hide-on-small-only"  v-text="envios.total"></td>
                        <td class="hide-on-small-only"  v-text="envios.statusOrder"></td>
                         <td>
                            <i class="material-icons color-text " @click="abrirModal('empleados','actualizar',user,user.id)">create</i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <ul class="pagination">
                    <li  v-if="pagination.current_page > 1">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"><i class="material-icons">chevron_left</i></a>
                        <!-- <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)" ></a> -->
                    </li>
                    <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a  href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)" ><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            PK_orders:'',
            idPedidos:0,
            first_name:'',
            last_name:'',
            id_user:0,
            statusS:'',
            statusO:'',
            estatus:'',
            id_person:0,
            id_shipments:0,
            total:0,
            subtotal:0,
            arrayPedidos:[],
            arrayStatus:[],
            criterio:'name',
            buscar:'',
            estatus:'Todos',
            date:'',
             pagination : {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
        }
    },
    computed:{
         isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
    },
    methods:{
         cambiarPagina(page,buscar,criterio){
           let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarPedidos(page,buscar,criterio,me.estatus);
        },
        listarPedidos(page,buscar,criterio,estatus){
                let m=this;
                console.log(estatus);
                axios.get('/order?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio+'&status='+estatus).then(function (response){
                var respuesta= response.data;
                m.arrayPedidos = respuesta.orden.data;
                m.pagination= respuesta.pagination;

               
               
               
               // m.status = response.orden.status.data;
                // if(status == true){
                //     status = 1
                // }else{
                //     status = 0
                // }
            })
            .catch(function(error){
                console.log(error);
            });
        },
        listarStatus(){
            let m=this;
            axios.get('/order/status').then(function (response){
                m.arrayStatus = response.data;
            })
            .catch(function(error){
                console.log(error);
            });

        },
        actualizarStatus(){

        }

    },
    mounted(){
        this.listarPedidos(1,this.buscar,this.criterio,this.estatus);
        this.listarStatus();
    }
    
}
</script>