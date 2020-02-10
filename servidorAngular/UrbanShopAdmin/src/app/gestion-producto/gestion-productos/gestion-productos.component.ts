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
  modalError = false;

  idProducto = 0;
  msgError: String = "";

  constructor(private productoService: SProductosService) { }

  productos: IProducto[] = []

  ngOnInit() {
    this.getAllProductos()
  }

  getAllProductos() {
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
      this.idProducto = evento.idProducto;
    }
    else if (evento.metodo == "Put") {
      this.modalPutProducto = !this.modalPutProducto;
      this.idProducto = evento.idProducto;
    }
  }

  updateProductos() {
    this.getAllProductos()
  }

  funError(evento) {
    this.msgError = evento;
    this.modalError = true;
  }

  cerrarModal() {
    this.modalError = false;
  }

}




