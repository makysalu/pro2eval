import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalDeleteLineaPedidoComponent } from './modal-delete-linea-pedido.component';

describe('ModalDeleteLineaPedidoComponent', () => {
  let component: ModalDeleteLineaPedidoComponent;
  let fixture: ComponentFixture<ModalDeleteLineaPedidoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalDeleteLineaPedidoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalDeleteLineaPedidoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
