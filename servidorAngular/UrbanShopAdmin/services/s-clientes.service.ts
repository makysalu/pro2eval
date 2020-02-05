import { Injectable } from '@angular/core';
import { ICliente } from '../interfaces/i-cliente';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class SClientesService {
  private controladorURL = 'http://localhost/daw2/pro2eval/servidorPHP/public/controladores/gestion_clientes.php';
  constructor(private http: HttpClient) { }
  getAllClientes(): Observable<ICliente[]> {
    return this.http.get<ICliente[]>(this.controladorURL);
  }
}


