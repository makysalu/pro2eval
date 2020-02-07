import { Component, OnInit, Input } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'gestion-pedidos',
  templateUrl: './gestion-pedidos.component.html',
  styleUrls: ['./gestion-pedidos.component.css']
})
export class GestionPedidosComponent implements OnInit {

  constructor(private pedidoService: SPedidosService) { }

  pedidos: IPedido[] = []
  
  ngOnInit() {
    this.pedidoService.getAllPedidos().subscribe(
      prods => this.pedidos = prods, // Success function
      error => console.error(error), // Error function (optional)
      () => console.log("Pedidos loaded") // Finally function (optional)
    );
  }


}
