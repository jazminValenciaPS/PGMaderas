module.exports =  Carrito;


class Carrito {

    constructor(){

    }
      //Añadir producto al carrito
    comprarProducto(e){
        console.log("comprarProducto");
        e.preventDefault();
        //Delegado para agregar al carrito
        if(e.target.classList.contains('agregar-carrito')){
            const producto = e.target.parentElement.parentElement;
            //Enviamos el producto seleccionado para tomar sus datos
            // this.leerDatosProducto(producto);
            console.log(producto);
        }
    }


      //Leer datos del producto
    //   leerDatosProducto(producto){
    //     const infoProducto = {
    //         imagen : producto.querySelector('img').src,
    //         titulo: producto.querySelector('h4').textContent,
    //         precio: producto.querySelector('.precio span').textContent,
    //         id: producto.querySelector('a').getAttribute('data-id'),
    //         cantidad: 1
    //     }
    //     let productosLS;
    //     productosLS = this.obtenerProductosLocalStorage();
    //     productosLS.forEach(function (productoLS){
    //         if(productoLS.id === infoProducto.id){
    //             productosLS = productoLS.id;
    //         }
    //     });

    //     if(productosLS === infoProducto.id){
    //         Swal.fire({
    //             type: 'info',
    //             title: 'Oops...',
    //             text: 'El producto ya está agregado',
    //             showConfirmButton: false,
    //             timer: 1000
    //         })
    //     }
    //     else {
    //         this.insertarCarrito(infoProducto);
    //     }
        
    // }

}