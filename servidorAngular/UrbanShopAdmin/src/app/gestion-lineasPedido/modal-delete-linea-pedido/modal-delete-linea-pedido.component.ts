import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { LineasPedidosService } from '../../../../services/lineas-pedidos.service';


@Component({
  selector: 'modal-delete-linea-pedido',
  templateUrl: './modal-delete-linea-pedido.component.html',
  styleUrls: ['./modal-delete-linea-pedido.component.css']
})
export class ModalDeleteLineaPedidoComponent implements OnInit {
  @Input() nlinea: String;
  @Input() idPedido: Number;
  @Output() cambio = new EventEmitter();
  @Output() updateLineasPedidos = new EventEmitter();

  constructor(private lineaPedidoService: LineasPedidosService) { }

  ngOnInit() {

  }

  deleteLineaPedido() {
    this.lineaPedidoService.deleteLineaPedido(this.idPedido,this.nlinea)
      .subscribe(
        prod => {
          let pedido = prod;
          if (pedido) {
            console.log("Pedido Eliminado Creado");
            this.updateLineasPedidos.emit(this.idPedido);
            this.close(this.idPedido);
          }
          else {
            console.log("NO se a prodido borrar el Pedido");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close(idPedido) {
    let datos = {
      metodo: "Delete",
      idPedido: idPedido
    }
    this.cambio.emit(datos);
  }
}
