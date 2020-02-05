import { Component, OnInit } from '@angular/core';
import {ICliente} from '../../../interfaces/i-cliente';
import {SClientesService} from '../../../services/s-clientes.service';

@Component({
  selector: 'gestion-clientes',
  templateUrl: './gestion-clientes.component.html',
  styleUrls: ['./gestion-clientes.component.css']
})

export class GestionClientesComponent implements OnInit {

  constructor(private clienteService: SClientesService) { }

  clientes:ICliente[]=[]

  

  ngOnInit() {
  }

}
