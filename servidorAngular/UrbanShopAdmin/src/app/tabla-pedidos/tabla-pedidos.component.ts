import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IPedido } from '../../../interfaces/i-pedido';

@Component({
  selector: 'tabla-pedidos',
  templateUrl: './tabla-pedidos.component.html',
  styleUrls: ['./tabla-pedidos.component.css']
})
export class TablaPedidosComponent implements OnInit {

  @Input() pedidos: IPedido;
  constructor() { }

  ngOnInit() {

  }

  putPedido(idPedido) {
    console.log("put"+idPedido);

  }

  deletePedido(idPedido) {
    console.log("delete"+idPedido);
  }

  postPedido(){
    console.log("añadir");
  }

}