import { Injectable } from '@angular/core';
import { ICliente } from '../interfaces/i-cliente';
import { Observable, from } from 'rxjs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LoginService {
  private controladorURL = 'http://localhost/public/controladores/gestion_login.php';
  //private controladorURL = 'http://localhost/web/2DAW/pro2eval/servidorPHP/public/controladores/gestion_clientes.php';

  constructor(private http: HttpClient) { }

  login(dni, pwd): Observable<any> {
    return this.http.post(this.controladorURL, {
      dni: dni,
      pwd: pwd,
    })
  }
}
