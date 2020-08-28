<template>
    <main class="row hero">
        <div class="title">
            <h5>Stock</h5>
        </div>
        <!-- modelo-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input disabled v-model="name" type="text" class="validate">
                        <label for="disabled"></label>
                        </div>
                        <div class="input-field col s6">
                        <input disabled v-model="city" type="text" class="validate">
                        <label for="disabled"></label>
                        </div>
                        <div class="input-field col s6">
                        <input disabled v-model="street" type="text" class="validate">
                        <label for="disabled"></label>
                        </div>
                    </div>
                    <select name="LeaveType" class="browser-default" v-model="avaible">
                        <option value="" disabled selected>Disponibilidad del producto</option>
                        <option v-for="items in contenido" :key="items.index">{{ items }}</option>
                    </select>  
                </div>
                <div v-show="errorStock" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjStock" :key="error" v-text="error">
                        </div>
                    </div>
                </div>
                <div class="button-container form formmodal-footer">
                    <button class="button-type" type="button" @click="actualizarStock(PK_stock,criterio)">Actualizar</button>
                    <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                </div>
            </div>
        </div>  
        <!--  fin del modelo-->
        <div class="col s12 m12 gl6">
            <div class="right col l12">
               <div class="right col l12 s12 ">
                     <div class="right form input-field col s1">
                        <button type="submit" @click="listarProductos(1,buscar,criterio)" class="modal-trigger"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                    <div class="right input-field col s6 m6 g6">
                        <select name="LeaveType" class="browser-default" v-model="criterio" >
                            <option value="" disabled >Selecciona la sucursal</option>
                            <option v-for="sucursal in arraySucursales" :value="sucursal.PK_PG_branches" :key="sucursal.PK_PG_branches" >{{ sucursal.street }}</option>
                        </select> 
                    </div>
                </div>
            </div>
            <div class="col s12 m12 gl12 table-stock">
                <table class="tabla centered highlight">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Ciudad</th>
                            <th>Calle</th>
                            <th>Disponibilidad</th>
                            <th>Estatus</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody v-for="produc in arrayProductos" :key="produc.PK_PG_branches">
                        <tr>
                            <td v-text="produc.name"></td>
                            <td v-text="produc.city"></td>
                            <td v-text="produc.street"></td>
                            <td v-text="produc.avaible"></td>
                            <td class="hide-on-small-only" v-if="produc.status == 1">Activado</td>
                            <td class="hide-on-small-only" v-if="produc.status == 0">Desactivado</td>
                            <td>
                                <i class="material-icons color-text pointer" @click="abrirModal('stock','actualizar',produc,produc.PK_PG_branches)">create</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
             <ul class="pagination">
                <li  v-if="pagination.current_page > 1">
                    <a  href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"><i class="material-icons">chevron_left</i></a>
                </li>
                <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                    <a  href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a  href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)" ><i class="material-icons">chevron_right</i></a>
                </li>
             </ul>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            criterio : 'street',
            suburb:'',
            street:'',
            city:'',
            arraySucursales:[],
            idSucursal:0,
            avaible:0,
            name:'',
            contenido: 1000,
            arrayProductos:[],
              pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
            },
            offset : 3,
            criterio : '',
            buscar:'',
            errorStock : 0,
            errorMostrarMsjStock : [],
            tituloModal:'Editar Stock',
            modal:0,
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
        verSelects(){
            let me=this;
            me.listado=2;
            //Obtener los datos del ingreso de sub categorias
            var url= '/branches';
            axios.get(url).then(function (response) {
                var arraySucursales= response.data;
                me.arraySucursales = arraySucursales.map(object => ({PK_PG_branches: object.PK_PG_branches, street: object.street})); 
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        cambiarPagina(page,buscar,criterio){
           let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarProductos(page,buscar,criterio);
        },
        listarProductos(page,buscar,criterio){       
            let m=this;
            var url='/stock?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayProductos = respuesta.stock.data;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        abrirModal(modelo,accion, data = [],){
            let m=this;
            switch(modelo){
                case "stock":{
                    switch(accion){
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_stock=data['PK_stock'];
                            m.available= data['available'];
                            m.city=data['city'];
                            m.street=data['street']
                            m.status = data['status'];
                            m.name = data['name'];
                            m.tituloModal = 'Editar Stock';
                        }
                    }
                }
            }
        }, 
        actualizarStock(PK_stock,criterio){
            if (this.validar()){
                return;
            }
            let me = this;
            let formData = new FormData();
            formData.append('PK_stock',PK_stock);
            formData.append('avaible', me.avaible);

            //Registramos la informacion
            axios.post('/stock/actualizar',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (response) {
                me.listarProductos(1,criterio,'name');
                me.cerrarModal();
                me.limpiar();                    
            })
            .catch(function (error) {
                console.log(error);
            });      
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.tipoAccion = 0;
            this.errorCategoria = 0;
            this.errorMostrarMsjCategoria = [];
        },
        validar(){
            if (!this.avaible) this.errorMostrarMsjProducto.push("Seleccione la disponibilidad del producto.");
        }
    },
    mounted(){
        this.verSelects();
        this.listarProductos(1,this.buscar,this.criterio);
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
</style>