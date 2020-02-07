import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../../interfaces/i-cliente';
@Component({
  selector: 'tabla-clientes',
  templateUrl: './tabla-clientes.component.html',
  styleUrls: ['./tabla-clientes.component.css']
})
export class TablaClientesComponent implements OnInit {
  @Input() clientes: ICliente;
  @Output() cambio = new EventEmitter();
  constructor() { }
  ngOnInit() {

  }

  putCliente(dniCliente) {
    let datos = {
      dniCliente: dniCliente,
      metodo: "Put"
    }
    this.cambio.emit(datos);
  }

  deleteCliente(dniCliente) {
    let datos = {
      dniCliente: dniCliente,
      metodo: "Delete"
    }
    this.cambio.emit(datos);
  }

  postCliente() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }

}
