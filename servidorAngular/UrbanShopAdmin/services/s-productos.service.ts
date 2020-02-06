import { Injectable } from '@angular/core';
import { IProducto } from '../interfaces/i-producto';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SProductosService {
  private controladorURL = 'http://localhost/web/2DAW/pro2eval/servidorPHP/public/controladores/gestion_productos.php';

  constructor(private http: HttpClient) { }

  getAllProductos(): Observable<IProducto[]> {
    return this.http.get<IProducto[]>(this.controladorURL);
  }
}






