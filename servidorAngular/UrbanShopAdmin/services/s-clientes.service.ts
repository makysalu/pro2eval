import { Injectable } from '@angular/core';
import { ICliente } from '../interfaces/i-cliente';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class SClientesService {
  //private controladorURL = 'http://localhost/daw2/pro2eval/servidorPHP/public/controladores/gestion_clientes.php';
  private controladorURL = 'http://localhost/web/2DAW/pro2eval/servidorPHP/public/controladores/gestion_clientes.php';

  constructor(private http: HttpClient) { }

  getAllClientes(): Observable<ICliente[]> {
    return this.http.get<ICliente[]>(this.controladorURL);
  }

  getCliente(dniCliente): Observable<any> {
    return this.http.get(this.controladorURL+"/?dniCliente="+dniCliente);
  }

  postCliente(cliente: ICliente): Observable<any> {
    return this.http.post(this.controladorURL, {
      dniCliente: cliente.dniCliente,
      admin: cliente.admin,
      nombre: cliente.nombre,
      direccion: cliente.direccion,
      email: cliente.email,
      pwd: cliente.email,
    })
  }

  putCliente(cliente: ICliente): Observable<any> {
    console.log(cliente);
    
    return this.http.put(this.controladorURL+"/?dniCliente="+cliente.dniCliente+"&nombre="+cliente.nombre+"&direccion="+cliente.direccion+"&email="+cliente.email,cliente)
  }
}



