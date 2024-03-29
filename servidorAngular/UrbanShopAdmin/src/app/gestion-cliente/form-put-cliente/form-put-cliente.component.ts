import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../../interfaces/i-cliente';
import { SClientesService } from '../../../../services/s-clientes.service';

@Component({
  selector: 'form-put-cliente',
  templateUrl: './form-put-cliente.component.html',
  styleUrls: ['./form-put-cliente.component.css']
})
export class FormPutClienteComponent implements OnInit {
  @Input() dniCliente: String;
  @Output() cambio = new EventEmitter();
  @Output() updateClientes = new EventEmitter();
  @Output() msgError = new EventEmitter();

  cliente: ICliente[] = []

  //creeamos una variable datos que los recojeremos en el formulario
  datosCliente: ICliente = {
    dniCliente: this.dniCliente,
    admin: 0,
    nombre: "",
    direccion: "",
    email: "",
    pwd: "",
  }

  constructor(private clienteService: SClientesService) { }

  //realizamos una peticion get con el dni y sacamos todos los datos del cliente, añadimos los datos la variable datos
  ngOnInit() {
    //let dniCliente={"dniCliente":this.dniCliente}
    this.clienteService.getCliente(this.dniCliente).subscribe(
      prods => {
        console.log(prods.nombre);
        this.datosCliente.dniCliente = prods.dniCliente,
          this.datosCliente.admin = prods.admin,
          this.datosCliente.nombre = prods.nombre,
          this.datosCliente.direccion = prods.direccion,
          this.datosCliente.email = prods.email,
          this.datosCliente.pwd = prods.pwd
      },
      // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }

  //realizamos una peticion put añadiendo la variable datos con los datos que recojemos en el formulario, muestra modal en caso de erro
  putCliente() {
    //console.log(this.datosCliente);
    this.clienteService.putCliente(this.datosCliente)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            this.updateClientes.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Modificar el Usuario");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Modificar el Usuario"), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  //cerramos el modal
  close() {
    let datos = {
      metodo: "Put",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}










