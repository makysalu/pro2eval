import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GestionLineasPedidosComponent } from './gestion-lineas-pedidos.component';

describe('GestionLineasPedidosComponent', () => {
  let component: GestionLineasPedidosComponent;
  let fixture: ComponentFixture<GestionLineasPedidosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GestionLineasPedidosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GestionLineasPedidosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
