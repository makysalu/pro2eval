import { Component, OnInit, Input } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'gestion-pedidos',
  templateUrl: './gestion-pedidos.component.html',
  styleUrls: ['./gestion-pedidos.component.css']
})

export class GestionPedidosComponent implements OnInit {
  modalPostPedido = false;
  modalDeletePedido = false;
  modalPutPedido = false;
  idPedido = "";

  constructor(private pedidoService: SPedidosService) { }

  pedidos: IPedido[] = []



  ngOnInit() {
    this.getAllPedidos()
  }

  getAllPedidos() {
    this.pedidoService.getAllPedidos().subscribe(
      prods => this.pedidos = prods, // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Pedidos loaded") // Finally function (optional)
    );
  }

  funCambiar(evento) {
    if (evento.metodo == "Post") {
      this.modalPostPedido = !this.modalPostPedido;
    }
    else if (evento.metodo == "Delete") {
      this.modalDeletePedido = !this.modalDeletePedido;
      this.idPedido = evento.idPedido;
    }
    else if (evento.metodo == "Put") {
      this.modalPutPedido = !this.modalPutPedido;
      this.idPedido = evento.idPedido;
    }
  }

  updatePedidos() {
    this.getAllPedidos()
  }
}