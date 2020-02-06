import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { GestionClientesComponent } from './gestion-clientes/gestion-clientes.component';
import { GestionProductosComponent } from './gestion-productos/gestion-productos.component';
import { GestionPedidosComponent } from './gestion-pedidos/gestion-pedidos.component';
import {SClientesService} from '../../services/s-clientes.service';

import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { TablaClientesComponent } from './tabla-clientes/tabla-clientes.component';
import { TablaProductosComponent } from './tabla-productos/tabla-productos.component';
import { TablaPedidosComponent } from './tabla-pedidos/tabla-pedidos.component';
import { ModalPruebaComponent } from './modal-prueba/modal-prueba.component';
@NgModule({
  declarations: [
    AppComponent,
    CabeceraComponent,
    GestionClientesComponent,
    GestionProductosComponent,
    GestionPedidosComponent,
    TablaClientesComponent,
    TablaProductosComponent,
    TablaPedidosComponent,
    ModalPruebaComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
