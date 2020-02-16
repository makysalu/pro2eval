import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';
import { ICliente } from '../../../../interfaces/i-cliente';
import { SClientesService } from '../../../../services/s-clientes.service';

@Component({
  selector: 'form-post-pedido',
  templateUrl: './form-post-pedido.component.html',
  styleUrls: ['./form-post-pedido.component.css']
})
export class FormPostPedidoComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Output() updatePedidos = new EventEmitter();
  @Output() msgError = new EventEmitter();

  clientes: ICliente[] = []

  //creamos una variable nuevo cuyo datos recojeremos en el formulario
  nuevoPedido: IPedido = {
    idPedido: 0,
    fecha: new Date(),
    dirEntrega: "",
    nTarjeta: 0,
    matriculaRepartidor: 0,
    dniCliente: "",
  }
  constructor(
    private pedidoService: SPedidosService,
    private clienteService: SClientesService
  ) { }

  ngOnInit() {
    this.getAllClientes()
  }

  //realizamos una peticion get para recojer todos los clientes de la bbdd
  getAllClientes() {
    this.clienteService.getAllClientes().subscribe(
      prods => this.clientes = prods, // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }

  //realizamos una peticion post y le mandamos los datos de nuevo para introducilo a la bbdd, muestra modal en caso de error
  postPedido() {
    this.pedidoService.postPedido(this.nuevoPedido)
      .subscribe(
        prod => {
          let pedido = prod;
          if (pedido) {
            this.updatePedidos.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Añadir el Pedido");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Añadir el Pedido"), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );

  }

  //cerrar modal
  close() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
