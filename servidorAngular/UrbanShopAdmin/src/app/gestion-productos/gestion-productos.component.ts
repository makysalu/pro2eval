import { Component, OnInit, Input } from '@angular/core';
import { IProducto } from '../../../interfaces/i-producto';
import { SProductosService } from '../../../services/s-productos.service';

@Component({
  selector: 'gestion-productos',
  templateUrl: './gestion-productos.component.html',
  styleUrls: ['./gestion-productos.component.css']
})
export class GestionProductosComponent implements OnInit {

  constructor(private productoService: SProductosService) { }

  productos: IProducto[] = []
  
  ngOnInit() {
    this.productoService.getAllProductos().subscribe(
      prods => this.productos = prods, // Success function
      error => console.error(error), // Error function (optional)
      () => console.log("Clientes loaded") // Finally function (optional)
    );
  }

}




