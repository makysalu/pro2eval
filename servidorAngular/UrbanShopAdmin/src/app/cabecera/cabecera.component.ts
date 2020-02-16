import { Component, OnInit,  Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'cabecera',
  templateUrl: './cabecera.component.html',
  styleUrls: ['./cabecera.component.css']
})
export class CabeceraComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Input() nombre;

  constructor() { }

  ngOnInit() {
  }

  //cuando llamas a esta funcion se le manda a la funcion del padre el nombre del gestor que se va a mostrar
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
