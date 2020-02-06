import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { ICliente } from '../../../interfaces/i-cliente';
import { SClientesService } from '../../../services/s-clientes.service';

@Component({
  selector: 'form-post-cliente',
  templateUrl: './form-post-cliente.component.html',
  styleUrls: ['./form-post-cliente.component.css']
})
export class FormPostClienteComponent implements OnInit {
  @Output() cambio = new EventEmitter();
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

  }

  close() {
    let datos = {
      metodo: "Post"
    }
    this.cambio.emit(datos);
  }
}
