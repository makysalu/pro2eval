import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { SProductosService } from '../../../../services/s-productos.service';

@Component({
  selector: 'modal-delete-producto',
  templateUrl: './modal-delete-Producto.component.html',
  styleUrls: ['./modal-delete-Producto.component.css']
})
export class ModalDeleteProductoComponent implements OnInit {
  @Input() idProducto: Number;
  @Output() cambio = new EventEmitter();
  @Output() updateProductos = new EventEmitter();

  constructor(private Productoservice: SProductosService) { }

  ngOnInit() {
  }

  deleteProducto() {
    this.Productoservice.deleteProducto(this.idProducto)
      .subscribe(
        prod => {
          let Producto = prod;
          if (Producto) {
            console.log("Producto Creado");
            this.updateProductos.emit();
            this.close();
          }
          else {
            console.log("NO se a prodido Crear el Producto");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close() {
    let datos = {
      metodo: "Delete",
      idProducto: ""
    }
    this.cambio.emit(datos);
  }
}