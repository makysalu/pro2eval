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
}


