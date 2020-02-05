import { Component, OnInit,  Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'cabecera',
  templateUrl: './cabecera.component.html',
  styleUrls: ['./cabecera.component.css']
})
export class CabeceraComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  constructor() { }

  ngOnInit() {
  }

  cambiarGestionClientes(){
    this.cambio.emit("gestionClientes");
  }

  cambiarGestionProductos(){
    this.cambio.emit("gestionProductos");
  }

  cambiarGestionPedidos(){
    this.cambio.emit("gestionPedidos");
  }
}
