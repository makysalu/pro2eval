import { Component, OnInit,Input } from '@angular/core';
import { ILineaPedido } from '../../../../interfaces/i-linea-pedido';
import { LineasPedidosService } from '../../../../services/lineas-pedidos.service';

@Component({
  selector: 'gestion-lineas-pedidos',
  templateUrl: './gestion-lineas-pedidos.component.html',
  styleUrls: ['./gestion-lineas-pedidos.component.css']
})
export class GestionLineasPedidosComponent implements OnInit {
  @Input() lineasPedidos: ILineaPedido[];
  @Input() idPedido: Number;
  
  
  modalDeleteLineaPedido = false;
  modalPostLineaPedido =  false;
  nlinea="";
  constructor(private lineaPedidoService: LineasPedidosService) { }

  ngOnInit() {
    
  }

  postLineaPedido(){
    this.modalPostLineaPedido=!this.modalPostLineaPedido
  }

  updateLineasPedidos(){
    this.lineaPedidoService.getAllLineasPedidos(this.idPedido).subscribe(
      prods => this.lineasPedidos = prods, // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Pedidos loaded") // Finally function (optional)
    );
  }
  
  funCambiar(evento) {
    if (evento.metodo == "Post") {
      this.modalPostLineaPedido = !this.modalPostLineaPedido;
      this.idPedido=evento.idPedido
    }
    if (evento.metodo == "Delete") {
      this.modalDeleteLineaPedido = !this.modalDeleteLineaPedido;
      this.nlinea = evento.nlinea;
      this.idPedido = evento.idPedido;
    }
  }
}
