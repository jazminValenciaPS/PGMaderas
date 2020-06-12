<template>
        <div class="contraseñas">
                <h5 class="center">Cambio de contraseña</h5>  
                <br>
                 <div class="input-field">
                     <i class="material-icons prefix">email</i>
                     <input id="correo" type="text" v-model="email" class="validate" >
                     <label  for="correo">Correo</label>
                 </div>
                 <div class="input-field">
                     <i class="material-icons prefix">lock</i>
                     <input id="password" type="password" v-model="password" class="validate" >
                     <label  for="password">Contraseña</label>
                 </div>
                 <div class="input-field"> 
                     <i class="material-icons prefix">lock</i>
                     <input id="passwordConfirm" type="password" v-model="passwordConfirm" class="validate" >
                     <label  for="passwordConfirm">Confirmar contraseña</label>
                 </div>
            <br>
            <div v-show="errorContra" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjContra" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
            <br>
           <div class="form  ">
                <button class="botonContra" type="summit">
                    Limpiar
                </button>
            </div>
            <div class="form ">
                <button class="botonContra" type="summit">
                    Guardar 
                </button>
            </div>
        </div>
</template>