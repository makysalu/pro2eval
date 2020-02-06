import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../interfaces/i-cliente';

@Component({
  selector: 'form-put-cliente',
  templateUrl: './form-put-cliente.component.html',
  styleUrls: ['./form-put-cliente.component.css']
})
export class FormPutClienteComponent implements OnInit {
  @Input() dniCliente: String;
  @Output() cambio = new EventEmitter();
  constructor() { }

  ngOnInit() {
  }

  close() {
    let datos = {
      metodo: "Put",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}
