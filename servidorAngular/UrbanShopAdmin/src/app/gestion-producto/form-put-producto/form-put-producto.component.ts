import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProducto } from '../../../../interfaces/i-producto';
import { SProductosService } from '../../../../services/s-productos.service';

@Component({
  selector: 'form-put-producto',
  templateUrl: './form-put-producto.component.html',
  styleUrls: ['./form-put-producto.component.css']
})
export class FormPutProductoComponent implements OnInit {
  @Input() idProducto: Number;
  @Output() cambio = new EventEmitter();
  @Output() updateProductos = new EventEmitter();

  producto: IProducto[] = []
  datosProducto: IProducto = {
    idProducto: this.idProducto,
    nombre: "",
    descripcion: "",
    foto: "",
    marca: "",
    categoria: "",
    unidades: 0,
    precio: 0,
  }

  constructor(private productoService: SProductosService) { }


  ngOnInit() {
    console.log(this.idProducto);

    this.productoService.getProducto(this.idProducto)
      .subscribe(
        prods => {
          this.datosProducto.idProducto = prods.idProducto,
            this.datosProducto.nombre = prods.nombre,
            this.datosProducto.descripcion = prods.descripcion,
            this.datosProducto.foto = prods.foto,
            this.datosProducto.marca = prods.marca,
            this.datosProducto.categoria = prods.categoria,
            this.datosProducto.unidades = prods.unidades,
            this.datosProducto.precio = prods.precio
        },
        // Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Clientes loaded") // Finally function (optional)
      );
  }

  putProducto() {
    this.productoService.putProducto(this.datosProducto)
      .subscribe(
        prod => {
          let producto = prod;
          if (producto) {
            console.log("Cliente Creado");
            this.updateProductos.emit();
            this.close();
          }
          else {
            console.log("NO se a prodido Crear el Cliente");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  close() {
    let datos = {
      metodo: "Put",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}
