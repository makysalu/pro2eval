import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { LoginService } from '../../../services/login.service';

@Component({
  selector: 'login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  @Output() cambio = new EventEmitter();
  @Output() username = new EventEmitter();
  dni = "";
  password = "";


  constructor(private loginService: LoginService) { }

  ngOnInit() {
  }

  login() {
    this.loginService.login(this.dni, this.password)
      .subscribe(
        prod => {
          let usuario = prod;
          if (usuario) {
            this.cambio.emit(true);
            this.username.emit(usuario);
            //this.updateClientes.emit();
            //this.close();
          }
          else {
            console.log("NO acceso");
          }
        },// Success function
        error => console.error(error), // Error function (optional)
        //() => console.log("Alumnos loaded”) // Finally function (optional)")
      );
  }
}
