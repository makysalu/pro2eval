import { Injectable } from '@angular/core';
import { ILineaPedido } from '../interfaces/i-linea-pedido';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LineasPedidosService {
  private controladorURL = 'http://localhost/gestion-lineas-pedidos/';
  //private controladorURL = 'http://localhost/web/2DAW/pro2eval/servidorPHP/public/controladores/gestion_lineasPedidos.php';

  constructor(private http: HttpClient) { }

  getAllLineasPedidos(idPedido): Observable<ILineaPedido[]> {
    return this.http.get<ILineaPedido[]>(this.controladorURL + "/" + idPedido);
  }

  postLineaPedido(lineaPedido: ILineaPedido): Observable<any> {
    return this.http.post(this.controladorURL, {
      idPedido: lineaPedido.idPedido,
      nlinea: lineaPedido.nlinea,
      idProducto: lineaPedido.idProducto,
      cantidad: lineaPedido.cantidad
    })
  }

  deleteLineaPedido(idPedido, nlinea): Observable<any> {
    return this.http.delete(this.controladorURL + "/" + idPedido + "/" + nlinea);
  }

}

