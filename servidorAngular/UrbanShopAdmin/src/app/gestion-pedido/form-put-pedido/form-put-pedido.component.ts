import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IPedido } from '../../../../interfaces/i-pedido';
import { SPedidosService } from '../../../../services/s-pedidos.service';

@Component({
  selector: 'form-put-pedido',
  templateUrl: './form-put-pedido.component.html',
  styleUrls: ['./form-put-pedido.component.css']
})
export class FormPutPedidoComponent implements OnInit {
  @Input() idPedido: Number;
  @Output() cambio = new EventEmitter();
  @Output() updatePedidos = new EventEmitter();

  pedido: IPedido[] = []
  datosPedido: IPedido = {
    idPedido: this.idPedido,
    fecha: new Date(),
    dirEntrega: "",
    nTarjeta: 0,
    matriculaRepartidor: 0,
    dniCliente: "",
  }

  constructor(private pedidoService: SPedidosService) { }

  ngOnInit() {
    //let dniCliente={"dniCliente":this.dniCliente}
    this.pedidoService.getPedido(this.idPedido).subscribe(
      prods => {
        this.datosPedido.idPedido=prods.idPedido,
        this.datosPedido.fecha=prods.fecha,
        this.datosPedido.dirEntrega=prods.dirEntrega,
        this.datosPedido.nTarjeta=prods.nTarjeta,
        this.datosPedido.matriculaRepartidor=prods.matriculaRepartidor,
        this.datosPedido.dniCliente=prods.dniCliente
      },
      // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }

  putPedido() {
    //console.log(this.datosCliente);
    this.pedidoService.putPedido(this.datosPedido)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            console.log("Cliente Creado");
            this.updatePedidos.emit();
            this.close();
          }
          else {
            console.log("NO se a prodido Crear el Cliente");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close() {
    let datos = {
      metodo: "Put",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}