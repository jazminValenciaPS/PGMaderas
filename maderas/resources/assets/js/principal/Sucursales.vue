<template>
    <select class="select-tienda-index" v-model="branch" @change="setBranch()">
        <option value="" disabled >Seleccione su tienda</option>
        <option v-for="sucursal in arraySucursales" :key="sucursal.PK_PG_branches" >{{sucursal.state}}</option>
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
            let url = '/branches'
            let m=this;
            axios.get(url).then(function (response){
                m.arraySucursales= response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        }, 
        async selectBranch() {
            let me = this;
            me.correo =localStorage.getItem("email");
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));

                const url = "/user/info?email="+ me.correo;
                await axios.get(url).then((result) => {
                    if ([undefined, null, 0, ""].includes(result.data)) {
                        const LS = JSON.parse(localStorage.getItem("branch"));
                        me.branch = LS;
                    }
                    else {
                        me.branch = result.data.id_branch;
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
        setBranch(){
            let m = this;
            m.correo =localStorage.getItem("email");

            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));
                    if(![undefined, null, 0, ""],includes(me.branch)){
                       const url = "/user/info?email="+ me.correo;
                        axios.get(url).then((result) => {
                            if([undefined, null, 0, ""].includes(result.data)){
                                localStorage.setItem("branch",JSON.stringify(me.branch));
                                localStorage.reload();
                            }else{
                                const url = "user/update/branch";
                                axios.post(url,{
                                    id: m.branch,
                                    email: m.correo
                                }) 
                                .then((result) => {
                                    location.reload();
                                })
                                .catch((err) =>{
                                    console.log(err);
                                });

                            }
                        })
                        .catch((err) =>{
                            console.log(err);
                        });
                    }

            }else{
                console.log("");
            }
        }

  
           
    },
    created(){
        this.listarSucursales();
    },
    beforeMount(){
        this.selectBranch();

    },
    updated(){
        M.FormSelect.init(document.querySelectorAll('select'), {});
    },
}
</script>