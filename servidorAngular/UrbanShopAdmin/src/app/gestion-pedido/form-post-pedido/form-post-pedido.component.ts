import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'form-post-pedido',
  templateUrl: './form-post-pedido.component.html',
  styleUrls: ['./form-post-pedido.component.css']
})
export class FormPostPedidoComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Output() updatePedidos = new EventEmitter();
  @Output() msgError = new EventEmitter();

  nuevoPedido: IPedido = {
    idPedido: 0,
    fecha: new Date(),
    dirEntrega: "",
    nTarjeta: 0,
    matriculaRepartidor: 0,
    dniCliente: "",
  }
  constructor(private pedidoService: SPedidosService) { }

  ngOnInit() {
  }

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

  close() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
