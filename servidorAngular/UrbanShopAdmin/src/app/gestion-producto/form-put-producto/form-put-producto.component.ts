import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { IProducto } from '../../../../interfaces/i-producto';
import { SProductosService } from '../../../../services/s-productos.service';

@Component({
  selector: 'form-put-producto',
  templateUrl: './form-put-producto.component.html',
  styleUrls: ['./form-put-producto.component.css']
})
export class FormPutProductoComponent implements OnInit {
  @Input() idProducto: String;
  @Output() cambio = new EventEmitter();

  producto: IProducto[] = []
  datosProducto: IProducto = {
    idProducto: this.idProducto,
    admin:0,
    nombre: "",
    direccion: "",
    email: "",
    pwd:"",
  }
  constructor(private productoService: SProductosService) { }

  
  ngOnInit() {
    //let dniCliente={"dniCliente":this.dniCliente}
    this.productoService.getProducto(this.dniCliente).subscribe(
      prods => { console.log(prods.nombre);
        this.datosCliente.dniCliente = prods.dniCliente,
        this.datosCliente.admin=prods.admin,
        this.datosCliente.nombre = prods.nombre,
        this.datosCliente.direccion= prods.direccion,
        this.datosCliente.email=prods.email,
        this.datosCliente.pwd=prods.pwdS
      },
         // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }
  
  putCliente() {
    //console.log(this.datosCliente);
    this.clienteService.putCliente(this.datosCliente)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            console.log("Cliente Creado");
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
