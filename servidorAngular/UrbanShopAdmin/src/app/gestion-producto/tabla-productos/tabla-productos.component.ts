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
  /*creea un objeto dependiendo de la funcion
    en todas introducimos el nombre de la funcion que queremos realizar 
    en caso de delete y put le incluimos la id del producto
*/
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
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
