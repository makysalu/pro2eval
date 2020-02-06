import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProducto } from '../../../interfaces/i-producto';

@Component({
  selector: 'tabla-productos',
  templateUrl: './tabla-productos.component.html',
  styleUrls: ['./tabla-productos.component.css']
})
export class TablaProductosComponent implements OnInit {
  @Input() productos: IProducto;
  constructor() { }

  ngOnInit() {

  }

  putProducto(idProducto) {
    console.log("put"+idProducto);

  }

  deleteProducto(idProducto) {
    console.log("delete"+idProducto);
  }

  postProducto(){
    console.log("añadir");
  }
}
