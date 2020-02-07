import { Component, OnInit, Input } from '@angular/core';
import { IProducto } from '../../../../interfaces/i-producto';
import { SProductosService } from '../../../../services/s-productos.service';

@Component({
  selector: 'gestion-productos',
  templateUrl: './gestion-productos.component.html',
  styleUrls: ['./gestion-productos.component.css']
})
export class GestionProductosComponent implements OnInit {
  modalPostProducto = false;
  modalDeleteProducto = false;
  modalPutProducto = false;
  idProducto = "";

  constructor(private productoService: SProductosService) { }

  productos: IProducto[] = []

  ngOnInit() {
    this.productoService.getAllProductos().subscribe(
      prods => this.productos = prods, // Success function
      error => console.error(error), // Error function (optional)
      //() => console.log("Clientes loaded") // Finally function (optional)
    );
  }

  funCambiar(evento) {
    if (evento.metodo == "Post") {
      this.modalPostProducto = !this.modalPostProducto;
    }
    else if (evento.metodo == "Delete") {
      this.modalDeleteProducto = !this.modalDeleteProducto;
      this.idProducto = evento.dniCliente;
    }
    else if (evento.metodo == "Put") {
      this.modalPutProducto = !this.modalPutProducto;
      this.idProducto = evento.dniCliente;
    }
  }

}




