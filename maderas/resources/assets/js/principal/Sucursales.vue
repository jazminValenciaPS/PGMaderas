<template>
    <select class="select-tienda-index" v-model="idBranch">
        <option value="" disabled >Seleccione su tienda</option>
        <option v-for="sucursal in arraySucursales" :key="sucursal.PK_PG_branches">{{sucursal.state}}</option>
    </select> 
</template>
<script>
export default {
    data(){
        return{
            arraySucursales:[],
            idBranch:0,
        }
    },
    methods:{
        listarSucursales(){
            let url = '/branches'
            let m=this;
            axios.get(url).then(function (response){
                m.arraySucursales= response.data;
                console.log("hola");
                console.log(m.arraySucursales);
            })
            .catch(function(error){
                console.log(error);
            });
        }, 
        async selectBranch() {
            let me = this;
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("ecommerce-branch") === null)
                    localStorage.setItem("ecommerce-branch", JSON.stringify(1));

                const url = "/user/info";
                await axios.get(url).then((result) => {
                    if ([undefined, null, 0, ""].includes(result.data)) {
                        const LS = JSON.parse(localStorage.getItem("ecommerce-branch"));
                        me.branch = LS;
                    }
                    else {
                        me.branch = result.data.User_Branch_ID;
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            }
            else {
                console.log("Sorry, your browser does not support Web Storage...");
            }
        },
        setBranch() {
            let me = this;
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));

                if (![undefined, null, 0, ""].includes(me.branch)) {
                    //Preguntar si hay correo en ls
                    const url = "/user/info";
                    axios.get(url).then((result) => {
                        if ([undefined, null, 0, ""].includes(result.data)) {
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
            }
        },
    mounted(){
        this.listarSucursales();
    },
    updated(){
        M.FormSelect.init(document.querySelectorAll('select'), {});
    },
}
}
</script>