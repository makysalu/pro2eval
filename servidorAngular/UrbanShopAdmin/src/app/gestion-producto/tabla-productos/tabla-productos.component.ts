import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProducto } from '../../../../interfaces/i-producto';

@Component({
  selector: 'tabla-productos',
  templateUrl: './tabla-productos.component.html',
  styleUrls: ['./tabla-productos.component.css']
})
export class TablaProductosComponent implements OnInit {
  @Input() productos: IProducto;
  @Output() cambio = new EventEmitter();
  constructor() { }

  ngOnInit() {

  }

  putProducto(idProducto) {
    let datos = {
      idProducto: idProducto,
      metodo: "Put"
    }
    this.cambio.emit(datos);
  }

  deleteProducto(idProducto) {
    let datos = {
      idProducto: idProducto,
      metodo: "Delete"
    }
    this.cambio.emit(datos);
  }

  postProducto() {
    console.log("hola");

    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
