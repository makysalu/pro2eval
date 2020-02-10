import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'UrbanShopAdmin';
  gestionClientes = true;
  gestionProductos = false;
  gestionPedidos = false;
  login = true;


  funCambiar(evento) {
    if (evento == "gestionClientes") {
      this.gestionClientes = true;
      this.gestionProductos = false;
      this.gestionPedidos = false;
    }
    else if (evento == "gestionProductos") {
      this.gestionProductos = true;
      this.gestionClientes = false;
      this.gestionPedidos = false;
    }
    else if (evento == "gestionPedidos") {
      this.gestionPedidos = true;
      this.gestionClientes = false;
      this.gestionProductos = false;
    }
  }

  funLogin(evento) {
    this.login = evento;
  }
}
