import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalDeletePedidoComponent } from './modal-delete-pedido.component';

describe('ModalDeletePedidoComponent', () => {
  let component: ModalDeletePedidoComponent;
  let fixture: ComponentFixture<ModalDeletePedidoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalDeletePedidoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalDeletePedidoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
