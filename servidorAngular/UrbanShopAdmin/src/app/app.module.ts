import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { GestionClientesComponent } from './gestion-clientes/gestion-clientes.component';
import { GestionProductosComponent } from './gestion-productos/gestion-productos.component';
import { GestionPedidosComponent } from './gestion-pedidos/gestion-pedidos.component';

@NgModule({
  declarations: [
    AppComponent,
    CabeceraComponent,
    GestionClientesComponent,
    GestionProductosComponent,
    GestionPedidosComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
