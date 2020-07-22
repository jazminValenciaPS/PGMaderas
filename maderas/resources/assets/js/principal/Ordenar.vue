<template>
    <main>
        <div class="hero-container-main">
            <section class="container-main-order">
                <img src="img/LOGO PG.png" alt="">
                <h5>Completa tu orden</h5>
            </section>
            <section class="container-resumen-order">
                <h5 class="container-resumen-order-title">Resumen</h5>
                <div class="resumen-order-container-">

                </div>
            </section>
            <section class="container-metodo-entrega">
                <h6>Metodo de entrega</h6>
                 <form action="#">
                    <p>
                    <label>
                        <input name="group1"  type="radio" checked />
                        <span><i class="material-icons left m-0">local_shipping</i> Entrega a domicilio</span>
                    </label>
                    </p>
                    <p>
                    <label>
                        <input name="group1" type="radio" />
                        <span><i class="material-icons left m-0">directions_walk</i>Recoger en tienda</span>
                    </label>
                    </p>
                </form>
            </section>
            <section class="container-metodo-tienda">
                <h6>informacion en tienda</h6>
                    <div class="informacion-tienda-select">
                        <select>
                            <option value="" disabled selected>Seleccione su tienda</option>
                            <option value="1">Matriz Culiacán</option>
                            <option value="2">Sucursal Zapata</option>
                            <option value="3">Sucursal Monterrey</option>
                            <label>Materialize Select</label>
                        </select> 
                    </div>
                   <div class="informacion-tienda-Datos">
                       <h6>Datos personales:</h6>
                        <form>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" type="text" class="validate">
                                <label for="first_name">Nombre</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" type="text" class="validate">
                                <label for="first_name">apellido</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                <input id="first_name" type="tel" class="validate">
                                <label for="Telefono">Telefono</label>
                                </div>
                            </div>
                        </form>
                    </div>
            </section>
            <section class="container-metodo-pago">
                <h6>Metodo de pago</h6>
                  <form action="#">
                    <p>
                    <label>
                        <input name="group1"  type="radio" checked />
                        <span><i class="material-icons left m-0">credit_card</i>Tarjeta de credito/ debito</span>
                    </label>
                    </p>
                    <p>
                    <label>
                        <input name="group1" type="radio" />
                        <span><i class="material-icons left m-0">attach_money</i>Efectivo</span>
                    </label>
                    </p>
                </form>
            </section>
            <section class="container-carrito">
                <h6>carrito</h6>
            </section>
            <section class="container-metodo-button">
                <a class="waves-effect bg-main waves-light btn aling"><i class="material-icons right">attach_money</i>Ir a pagar</a>
            </section>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    mounted(){
        
    }
}
</script>