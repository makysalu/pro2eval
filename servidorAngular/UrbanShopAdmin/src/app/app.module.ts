import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { CabeceraComponent } from './cabecera/cabecera.component';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { GestionClientesComponent } from './gestion-cliente/gestion-clientes/gestion-clientes.component';
import { GestionProductosComponent } from './gestion-producto/gestion-productos/gestion-productos.component';
import { GestionPedidosComponent } from './gestion-pedido/gestion-pedidos/gestion-pedidos.component';


import { TablaClientesComponent } from './gestion-cliente/tabla-clientes/tabla-clientes.component';
import { TablaProductosComponent } from './gestion-producto/tabla-productos/tabla-productos.component';

import { ModalPruebaComponent } from './modal-prueba/modal-prueba.component';

import { FormPostClienteComponent } from './gestion-cliente/form-post-cliente/form-post-cliente.component';
import { FormPostProductoComponent } from './gestion-producto/form-post-producto/form-post-producto.component';

import { FormPutClienteComponent } from './gestion-cliente/form-put-cliente/form-put-cliente.component';
import { FormPutProductoComponent } from './gestion-producto/form-put-producto/form-put-producto.component';

import { ModalDeleteClienteComponent } from './gestion-cliente/modal-delete-cliente/modal-delete-cliente.component';
import { ModalDeleteProductoComponent } from './gestion-producto/modal-delete-producto/modal-delete-producto.component';
import { ModalDeletePedidoComponent } from './gestion-pedido/modal-delete-pedido/modal-delete-pedido.component';
import { FormPostPedidoComponent } from './gestion-pedido/form-post-pedido/form-post-pedido.component';
import { FormPutPedidoComponent } from './gestion-pedido/form-put-pedido/form-put-pedido.component';
import { PedidoComponent } from './gestion-pedido/pedido/pedido.component';
import { LineaPedidoComponent } from './gestion-lineasPedido/linea-pedido/linea-pedido.component';
import { ModalDeleteLineaPedidoComponent } from './gestion-lineasPedido/modal-delete-linea-pedido/modal-delete-linea-pedido.component';
import { GestionLineasPedidosComponent } from './gestion-lineasPedido/gestion-lineas-pedidos/gestion-lineas-pedidos.component';
import { FormPostLineaPedidoComponent } from './gestion-lineasPedido/form-post-linea-pedido/form-post-linea-pedido.component';
import { LoginComponent } from './login/login.component';
import { ModalErrorComponent } from './modal-error/modal-error.component';

@NgModule({
  declarations: [
    AppComponent,
    CabeceraComponent,
    GestionClientesComponent,
    GestionProductosComponent,
    GestionPedidosComponent,
    TablaClientesComponent,
    TablaProductosComponent,
    ModalPruebaComponent,
    FormPostClienteComponent,
    FormPutClienteComponent,
    FormPostProductoComponent,
    FormPutProductoComponent,
    ModalDeleteClienteComponent,
    ModalDeleteProductoComponent,
    ModalDeletePedidoComponent,
    FormPostPedidoComponent,
    FormPutPedidoComponent,
    PedidoComponent,
    LineaPedidoComponent,
    ModalDeleteLineaPedidoComponent,
    GestionLineasPedidosComponent,
    FormPostLineaPedidoComponent,
    LoginComponent,
    ModalErrorComponent
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
