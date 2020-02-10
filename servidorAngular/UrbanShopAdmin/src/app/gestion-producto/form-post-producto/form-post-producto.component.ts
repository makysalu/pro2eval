import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProducto } from '../../../../interfaces/i-producto';
import { SProductosService } from '../../../../services/s-productos.service';

@Component({
  selector: 'form-post-producto',
  templateUrl: './form-post-producto.component.html',
  styleUrls: ['./form-post-producto.component.css']
})
export class FormPostProductoComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Output() updateProductos = new EventEmitter();
  @Output() msgError = new EventEmitter();

  confPassword = "";
  nuevoProducto: IProducto = {
    idProducto: 0,
    nombre: "",
    descripcion: "",
    foto: "",
    marca: "",
    categoria: "",
    unidades: 0,
    precio: 0,
  }

  constructor(private productosService: SProductosService) { }

  ngOnInit() {
  }

  postProducto() {
    console.log(this.nuevoProducto);

    this.productosService.postProducto(this.nuevoProducto)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            this.updateProductos.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Añadir el Producto");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Añadir el Producto"), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}


