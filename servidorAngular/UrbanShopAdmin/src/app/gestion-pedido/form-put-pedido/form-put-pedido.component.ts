import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'form-put-pedido',
  templateUrl: './form-put-pedido.component.html',
  styleUrls: ['./form-put-pedido.component.css']
})
export class FormPutPedidoComponent implements OnInit {
  @Input() idPedido: Number;
  @Output() cambio = new EventEmitter();
  @Output() updatePedidos = new EventEmitter();
  @Output() msgError = new EventEmitter();

  pedido: IPedido[] = []
  //creamos una variable con los datos de pedido que modificaremos en el formulario
  datosPedido: IPedido = {
    idPedido: this.idPedido,
    fecha: new Date(),
    dirEntrega: "",
    nTarjeta: 0,
    matriculaRepartidor: 0,
    dniCliente: "",
  }

  constructor(private pedidoService: SPedidosService) { }

  //realizamos una peticion get con el id del pedido para sacar los datos del pedido y actualizar la varible datos con sus datos
  ngOnInit() {
    this.pedidoService.getPedido(this.idPedido).subscribe(
      prods => {
        this.datosPedido.idPedido = prods.idPedido,
          this.datosPedido.fecha = prods.fecha,
          this.datosPedido.dirEntrega = prods.dirEntrega,
          this.datosPedido.nTarjeta = prods.nTarjeta,
          this.datosPedido.matriculaRepartidor = prods.matriculaRepartidor,
          this.datosPedido.dniCliente = prods.dniCliente
      },
      // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }

  //realizamos una peticion put que manda la variable datos con los datos recojidos del formulario, muestra modal en caso de error
  putPedido() {
    //console.log(this.datosCliente);
    this.pedidoService.putPedido(this.datosPedido)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            this.updatePedidos.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Modificar el Pedido");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Modificar el Pedido"), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  //cerramos el modal
  close() {
    let datos = {
      metodo: "Put",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}