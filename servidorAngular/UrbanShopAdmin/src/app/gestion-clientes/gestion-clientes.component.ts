import { Component, OnInit, Input } from '@angular/core';
import { ICliente } from '../../../interfaces/i-cliente';
import { SClientesService } from '../../../services/s-clientes.service';

@Component({
  selector: 'gestion-clientes',
  templateUrl: './gestion-clientes.component.html',
  styleUrls: ['./gestion-clientes.component.css']
})

export class GestionClientesComponent implements OnInit {

  constructor(private clienteService: SClientesService) { }

  clientes: ICliente[] = []



  ngOnInit() {
    this.clienteService.getAllClientes().subscribe(
      prods => this.clientes = prods, // Success function
      error => console.error(error), // Error function (optional)
      () => console.log("Clientes loaded") // Finally function (optional)
    );
  }

}
