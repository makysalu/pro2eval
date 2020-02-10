import { Component, OnInit, Input } from '@angular/core';
import { ICliente } from '../../../../interfaces/i-cliente';
import { SClientesService } from '../../../../services/s-clientes.service';

@Component({
  selector: 'gestion-clientes',
  templateUrl: './gestion-clientes.component.html',
  styleUrls: ['./gestion-clientes.component.css']
})

export class GestionClientesComponent implements OnInit {
  modalPostCliente = false;
  modalDeleteCliente = false;
  modalPutCliente = false;
  modalError = false;

  dniCliente = "";
  msgError: String = "";

  constructor(private clienteService: SClientesService) { }

  clientes: ICliente[] = []



  ngOnInit() {
    this.getAllClientes()
  }

  getAllClientes() {
    this.clienteService.getAllClientes().subscribe(
      prods => this.clientes = prods, // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
    console.log(this.clientes);
  }

  funCambiar(evento) {
    if (evento.metodo == "Post") {
      this.modalPostCliente = !this.modalPostCliente;
    }
    else if (evento.metodo == "Delete") {
      this.modalDeleteCliente = !this.modalDeleteCliente;
      this.dniCliente = evento.dniCliente;
    }
    else if (evento.metodo == "Put") {
      this.modalPutCliente = !this.modalPutCliente;
      this.dniCliente = evento.dniCliente;
    }
  }

  updateClientes() {
    this.getAllClientes()
  }

  funError(evento) {
    this.msgError = evento;
    this.modalError = true;
  }

  cerrarModal() {
    this.modalError = false;
  }
}
