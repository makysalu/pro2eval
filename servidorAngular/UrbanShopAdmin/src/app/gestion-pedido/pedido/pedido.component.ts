import { Component, OnInit,Input, Output, EventEmitter } from '@angular/core';
import { ILineaPedido } from '../../../../interfaces/i-linea-pedido';
import { IPedido } from '../../../../interfaces/i-pedido';
import { LineasPedidosService } from '../../../../services/lineas-pedidos.service';

@Component({
  selector: 'pedido',
  templateUrl: './pedido.component.html',
  styleUrls: ['./pedido.component.css']
})
export class PedidoComponent implements OnInit {
  @Input() pedido: IPedido;
  @Output() cambio = new EventEmitter();
  idPedido="";
  lineasPedidos: ILineaPedido[] = []
  verLineas=false;
  constructor(private pedidoService: LineasPedidosService) { }

  ngOnInit() {
  }

  getAllLineasPedido(idPedido){
    if(this.lineasPedidos.length!=0){
      this.lineasPedidos=[];
    }
    else{
      this.idPedido= idPedido;
      this.pedidoService.getAllLineasPedidos(idPedido).subscribe(
        prods => this.lineasPedidos = prods, // Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Pedidos loaded") // Finally function (optional)
      );
    }
  }
  
  putPedido(idPedido) {
    console.log(idPedido);
    
    let datos = {
      idPedido: idPedido,
      metodo: "Put"
    }
    this.cambio.emit(datos);
  }

  deletePedido(idPedido) {
    let datos = {
      idPedido: idPedido,
      metodo: "Delete"
    }
    this.cambio.emit(datos);
  }

  postPedido() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }

  mostrar(){
    this.verLineas=!this.verLineas;
  }

}
