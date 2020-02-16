import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'UrbanShopAdmin';
  nombre="";
  gestionClientes = true;
  gestionProductos = false;
  gestionPedidos = false;
  login = false;

//depende del mensaje que reciba activa un gestor u otro
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

  //pasa la variable de login a lo que reciba en el evento
  funLogin(evento) {
    this.login = evento;
  }

  //Pasa la variable de nombre al contenido de $even que contentra el nombre de la persona que loguea
  insertName($event){
    this.nombre=$event;
  }
}
