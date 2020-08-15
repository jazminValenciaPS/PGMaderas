<template>
    <a id="user" class="waves-effect waves-light " href="/iniciar-sesion">
        <i class=" Medium material-icons color-main">person</i>
    </a>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    methods: {
        User(user){
            var email = localStorage.getItem('email');
            if (email) {
                var userHtml = document.getElementById('user');
                userHtml.innerHTML = email;
            }
        }
    },
    mounted(){
        this.User();
    }
}
</script>