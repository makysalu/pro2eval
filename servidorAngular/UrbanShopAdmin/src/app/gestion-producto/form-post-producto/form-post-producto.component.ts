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

  postCliente() {
    console.log(this.nuevoProducto);

    this.productosService.postProducto(this.nuevoProducto)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            console.log("Producto Añadido");
            this.close();
          }
          else {
            console.log("NO se a prodido Añadir el Producto");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close(){
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}


