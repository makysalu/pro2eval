import { Injectable } from '@angular/core';
import { IPedido } from '../interfaces/i-pedido';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SPedidosService {
  //private controladorURL = 'http://localhost/web/2DAW/pro2eval/servidorPHP/public/controladores/gestion_pedidos.php';
  private controladorURL = 'http://localhost/daw2/pro2eval/servidorPHP/public/controladores/gestion_pedidos.php';

  constructor(private http: HttpClient) { }

  getAllPedidos(): Observable<IPedido[]> {
    return this.http.get<IPedido[]>(this.controladorURL);
  }

  getPedido(idPedido): Observable<any> {
    return this.http.get(this.controladorURL + "/?idPedido=" + idPedido);
  }

  postPedido(pedido: IPedido): Observable<any> {
    console.log(pedido);
    return this.http.post(this.controladorURL, {
      idPedido: pedido.idPedido,
      fecha: pedido.fecha,
      dirEntrega: pedido.dirEntrega,
      nTarjeta: pedido.nTarjeta,
      matriculaRepartidor: pedido.matriculaRepartidor,
      dniCliente: pedido.dniCliente
    })
  }

  putPedido(pedido: IPedido): Observable<any> {
    return this.http.put(this.controladorURL, {
      idPedido: pedido.idPedido,
      fecha: pedido.fecha,
      dirEntrega: pedido.dirEntrega,
      nTarjeta: pedido.nTarjeta,
      matriculaRepartidor: pedido.matriculaRepartidor,
      dniCliente: pedido.dniCliente
    })
  }

  deletePedido(idPedido): Observable<any> {
    return this.http.delete(this.controladorURL + "/?idPedido=" + idPedido);
  }

}


