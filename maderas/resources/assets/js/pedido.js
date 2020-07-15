var Carrito = require('./carrito');
var main = () => {
    const carro = new Carrito();
    const carrito = document.getElementById('carrito');
    const productos = document.getElementById('listaproductos');
    const listaProductos = document.querySelector('#lista-carrito tbody');
    const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
    const procesarPedidoBtn = document.getElementById('procesar-pedido');
    
    console.log(carro,'lista-productos');
    console.log(document.getElementById('listaproductos'),'document');
    cargarEventos();
    
    function cargarEventos(){
        
        //Se ejecuta cuando se presionar agregar carrito
        productos.addEventListener('click', (e)=>{carro.comprarProducto(e)});
    
        //Cuando se elimina productos del carrito
        carrito.addEventListener('click', (e)=>{carro.eliminarProducto(e)});
    
        //Al vaciar carrito
        vaciarCarritoBtn.addEventListener('click', (e)=>{carro.vaciarCarrito(e)});
    
        //Al cargar documento se muestra lo almacenado en LS
        document.addEventListener('DOMContentLoaded', carro.leerLocalStorage());
    
        //Enviar pedido a otra pagina
        procesarPedidoBtn.addEventListener('click', (e)=>{carro.procesarPedido(e)});
    }
    
}

module.exports = { main };