import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ILineaPedido } from '../../../../interfaces/i-linea-pedido';
import { LineasPedidosService } from '../../../../services/lineas-pedidos.service';

@Component({
  selector: 'form-post-linea-pedido',
  templateUrl: './form-post-linea-pedido.component.html',
  styleUrls: ['./form-post-linea-pedido.component.css']
})
export class FormPostLineaPedidoComponent implements OnInit {
  @Input() nlinea: Number;
  @Input() idPedido: Number;
  @Output() cambio = new EventEmitter();
  @Output() updateLineasPedidos = new EventEmitter();

  constructor(private lineaPedidoService: LineasPedidosService) { }
  nuevoLineaPedido: ILineaPedido = {
    idPedido: 0,
    nlinea: 0,
    idProducto: 0,
    cantidad: 0,
  }

  ngOnInit() {
  
  }

  postLineaPedido() { 
    this.nuevoLineaPedido.idPedido=this.idPedido;   
    
    this.lineaPedidoService.postLineaPedido(this.nuevoLineaPedido)
      .subscribe(
        prod => {
          let pedido = prod;
          if (pedido) {
            console.log("Pedido Creado");
            this.updateLineasPedidos.emit(this.idPedido); 
            this.close(this.idPedido);
          }
          else {
            console.log("NO se a prodido Crear el Pedido");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );

  }

  close(idPedido) {
    let datos = {
      idPedido: idPedido,
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
