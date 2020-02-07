import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { GestionClientesComponent } from './gestion-cliente/gestion-clientes/gestion-clientes.component';
import { GestionProductosComponent } from './gestion-producto/gestion-productos/gestion-productos.component';
import { GestionPedidosComponent } from './gestion-pedido/gestion-pedidos/gestion-pedidos.component';
import { SClientesService } from '../../services/s-clientes.service';

import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { TablaClientesComponent } from './gestion-cliente/tabla-clientes/tabla-clientes.component';
import { TablaProductosComponent } from './gestion-producto/tabla-productos/tabla-productos.component';
import { TablaPedidosComponent } from './gestion-pedido/tabla-pedidos/tabla-pedidos.component';
import { ModalPruebaComponent } from './modal-prueba/modal-prueba.component';
import { FormPostClienteComponent } from './gestion-cliente/form-post-cliente/form-post-cliente.component';
import { FormPutClienteComponent } from './gestion-cliente/form-put-cliente/form-put-cliente.component';
import { FormPostProductoComponent } from './gestion-producto/form-post-producto/form-post-producto.component';
import { FormPutProductoComponent } from './gestion-producto/form-put-producto/form-put-producto.component';

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
    ModalPruebaComponent,
    FormPostClienteComponent,
    FormPutClienteComponent,
    FormPostProductoComponent,
    FormPutProductoComponent
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
