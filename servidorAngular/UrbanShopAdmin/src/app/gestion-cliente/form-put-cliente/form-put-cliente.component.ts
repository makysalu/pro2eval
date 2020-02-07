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

  cliente: ICliente[] = []
  datosCliente: ICliente = {
    dniCliente: this.dniCliente,
    admin: 0,
    nombre: "",
    direccion: "",
    email: "",
    pwd: "",
  }

  constructor(private clienteService: SClientesService) { }

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

  putCliente() {
    //console.log(this.datosCliente);
    this.clienteService.putCliente(this.datosCliente)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            console.log("Cliente Creado");
            this.updateClientes.emit();
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










