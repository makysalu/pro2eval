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
  @Output() msgError = new EventEmitter();

  constructor(private lineaPedidoService: LineasPedidosService) { }

  ngOnInit() {

  }

  deleteLineaPedido() {
    this.lineaPedidoService.deleteLineaPedido(this.idPedido, this.nlinea)
      .subscribe(
        prod => {
          let pedido = prod;
          if (pedido) {
            this.updateLineasPedidos.emit(this.idPedido);
            this.close(this.idPedido);
          }
          else {
            this.msgError.emit("No se a Podido Eliminar la Linea");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Eliminar la Linea"), // Error function (optional)
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
