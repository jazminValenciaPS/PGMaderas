<template>
    <select class="select-tienda-index" v-model="branch" @change="setBranch()">
        <option value="" disabled >Seleccione su tienda</option>
        <option v-for="sucursal in arraySucursales" :key="sucursal.PK_PG_branches" :value="sucursal.PK_PG_branches">{{sucursal.state}}</option>
    </select> 
</template>
<script>
export default {
    data(){
        return{
            arraySucursales:[],
            branch:0,
            correo:''
        }
    },
    methods:{
        listarSucursales(){
            let me = this;
            axios.get('/branches').then(function (response){
                me.arraySucursales = response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        }, 
        async selectBranch() {
            let me = this;
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));

                const url = "/user/info";
                await axios.get(url).then((result) => {
                    console.log("selectBranch");
                    console.log(result.data[0]);
                    if ([undefined, null, 0, ""].includes(result.data[0])) {
                        const LS = JSON.parse(localStorage.getItem("branch"));
                        me.branch = LS;
                    }
                    else {
                        me.branch = result.data[0].id_branch;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            }
            else {
                console.log(",");
            }
        },
        setBranch() {
            let me = this;
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));

                if (![undefined, null, 0, ""].includes(me.branch)) {
                    // Validar si está logueado el cliente
                    const url = "/user/info";
                    axios.get(url).then((result) => {
                          console.log("setBranch");
                          console.log(result.data[0]);
                        if ([undefined, null, 0, ""].includes(result.data[0])) {
                            localStorage.setItem("branch", JSON.stringify(me.branch));
                            location.reload();
                        }
                        else {
                            const url = "/user/update/branch";
                            axios.post(url, {
                                id: me.branch
                            })
                            .then((result) => {
                                location.reload();
                            })
                        }
                    })
                    .catch((err)=>{
                        console.log(err);
                    });
                }
            }else{
                console.log("Sorry, your browser does not support Web Storage...");
            }
          }
        },
   
    created(){
        console.log("Sucursales");
         this.listarSucursales();
    },
    beforeMount(){
        let m= this;
        m.selectBranch();
    },
    updated(){
        M.FormSelect.init(document.querySelectorAll('select'), {});
    },
}
</script>