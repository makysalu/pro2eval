import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { SClientesService } from '../../../../services/s-clientes.service';

@Component({
  selector: 'modal-delete-cliente',
  templateUrl: './modal-delete-cliente.component.html',
  styleUrls: ['./modal-delete-cliente.component.css']
})
export class ModalDeleteClienteComponent implements OnInit {
  @Input() dniCliente: String;
  @Output() cambio = new EventEmitter();
  @Output() updateClientes = new EventEmitter();
  @Output() msgError = new EventEmitter();

  constructor(private clienteService: SClientesService) { }

  ngOnInit() {

  }

  //realizamos una peticion delete con el dni para eliminar el cliente, muestra el mensaje en caso de error
  deleteCliente() {
    this.clienteService.deleteCliente(this.dniCliente)
      .subscribe(
        prod => {
          let cliente = prod;
          if (cliente) {
            this.updateClientes.emit();
            this.close();
          }
          else {
            this.msgError.emit("No se a Podido Eliminar el Usuario");
          }
        },// Success function
        error => this.msgError.emit("No se a Podido Eliminar el Usuario"), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }

  //cerramos el modal 
  close() {
    let datos = {
      metodo: "Delete",
      dniCliente: ""
    }
    this.cambio.emit(datos);
  }
}
