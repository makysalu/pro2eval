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
  @Output() msgError = new EventEmitter();

  constructor(private Productoservice: SProductosService) { }

  ngOnInit() {
  }

  deleteProducto() {
    this.Productoservice.deleteProducto(this.idProducto)
      .subscribe(
        prod => {
          let Producto = prod;
          if (Producto) {
            this.updateProductos.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Eliminar el Producto");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Eliminar el Producto"), // Error function (optional)
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