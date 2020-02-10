import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'modal-delete-pedido',
  templateUrl: './modal-delete-pedido.component.html',
  styleUrls: ['./modal-delete-pedido.component.css']
})
export class ModalDeletePedidoComponent implements OnInit {
  @Input() idPedido: String;
  @Output() cambio = new EventEmitter();
  @Output() updatePedidos = new EventEmitter();

  constructor(private pedidoService: SPedidosService) { }

  ngOnInit() {

  }

  deletePedido() {
    this.pedidoService.deletePedido(this.idPedido)
      .subscribe(
        prod => {
          let pedido = prod;
          if (pedido) {
            console.log("Pedido Creado");
            this.updatePedidos.emit();
            this.close();
          }
          else {
            console.log("NO se a prodido borrar el Pedido");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close() {
    let datos = {
      metodo: "Delete",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}
