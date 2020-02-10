import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ILineaPedido } from '../../../../interfaces/i-linea-pedido';

@Component({
  selector: 'linea-pedido',
  templateUrl: './linea-pedido.component.html',
  styleUrls: ['./linea-pedido.component.css']
})
export class LineaPedidoComponent implements OnInit {
  @Input() lineaPedido: ILineaPedido;
  @Output() cambio = new EventEmitter();
  nlinea="";
  constructor() { }

  ngOnInit() {
  }

  putLineaPedido(nlinea) {
    let datos = {
      nlinea: nlinea,
      metodo: "Put"
    }
    this.cambio.emit(datos);
  }

  deleteLineaPedido(idPedido,nlinea) {
    let datos = {
      idPedido: idPedido,
      nlinea: nlinea,
      metodo: "Delete"
    }
    this.cambio.emit(datos);
  }

  postLineaPedido(idPedido) {
    let datos = {
      idPedido : idPedido,
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
