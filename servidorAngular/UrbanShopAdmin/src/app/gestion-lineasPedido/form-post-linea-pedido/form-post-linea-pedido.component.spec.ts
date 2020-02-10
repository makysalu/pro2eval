import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPostLineaPedidoComponent } from './form-post-linea-pedido.component';

describe('FormPostLineaPedidoComponent', () => {
  let component: FormPostLineaPedidoComponent;
  let fixture: ComponentFixture<FormPostLineaPedidoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPostLineaPedidoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPostLineaPedidoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
