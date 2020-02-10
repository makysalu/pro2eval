import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../../interfaces/i-cliente';
import { SClientesService } from '../../../../services/s-clientes.service';

@Component({
  selector: 'form-post-cliente',
  templateUrl: './form-post-cliente.component.html',
  styleUrls: ['./form-post-cliente.component.css']
})
export class FormPostClienteComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Output() msgError = new EventEmitter();
  @Output() updateClientes = new EventEmitter();
  confPassword = "";
  nuevoCliente: ICliente = {
    dniCliente: "",
    admin: 0,
    nombre: "",
    direccion: "",
    email: "",
    pwd: "",
  }
  constructor(private clienteService: SClientesService) { }

  ngOnInit() {
  }

  postCliente() {
    if (this.nuevoCliente.pwd == this.confPassword) {
      this.clienteService.postCliente(this.nuevoCliente)
        .subscribe(
          prod => {
            let cliente = prod;
            if (cliente) {
              this.updateClientes.emit();
              this.close();
            }
            else {
              this.msgError.emit("No se a Podido Introducir el Usuario");
            }
          },// Success function
          error => {
            this.msgError.emit("No se a Podido Introducir el Usuario");
          } // Error function (optional)
          //() => console.log("Alumnos loaded”) // Finally function (optional)")
        );
    }

  }

  close() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
