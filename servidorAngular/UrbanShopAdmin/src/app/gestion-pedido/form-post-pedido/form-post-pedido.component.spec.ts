import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPostPedidoComponent } from './form-post-pedido.component';

describe('FormPostPedidosComponent', () => {
  let component: FormPostPedidoComponent;
  let fixture: ComponentFixture<FormPostPedidoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPostPedidoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPostPedidoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
