import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../interfaces/i-cliente';
@Component({
  selector: 'tabla-clientes',
  templateUrl: './tabla-clientes.component.html',
  styleUrls: ['./tabla-clientes.component.css']
})
export class TablaClientesComponent implements OnInit {
  @Input() clientes: ICliente;
  constructor() { }

  ngOnInit() {

  }

  putCliente(dniCliente) {
    console.log(dniCliente);

  }

  deleteCliente() {
    console.log("delete");

  }

}
