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
  //private controladorURL = 'http://localhost/daw2/pro2eval/servidorPHP/public/controladores/gestion_productos.php';

  constructor(private http: HttpClient) { }

  getAllProductos(): Observable<IProducto[]> {
    return this.http.get<IProducto[]>(this.controladorURL);
  }

  getProducto(idProducto): Observable<any> {
    return this.http.get(this.controladorURL+"/?idProducto="+idProducto);
  }

  postProducto(producto: IProducto): Observable<any> {
    return this.http.post(this.controladorURL, {
      idProducto: producto.idProducto,
      nombre: producto.nombre,
      descripcion: producto.descripcion,
      foto: producto.foto,
      marca: producto.marca,
      categoria: producto.categoria,
      unidades: producto.unidades,
      precio: producto.precio
    })
  }
}






