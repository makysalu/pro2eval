import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPutPedidoComponent } from './form-put-pedido.component';

describe('FormPutPedidoComponent', () => {
  let component: FormPutPedidoComponent;
  let fixture: ComponentFixture<FormPutPedidoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPutPedidoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPutPedidoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
