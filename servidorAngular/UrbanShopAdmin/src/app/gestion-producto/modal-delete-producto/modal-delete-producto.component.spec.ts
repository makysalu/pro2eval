import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalDeleteProductoComponent } from './modal-delete-producto.component';

describe('ModalDeleteProductoComponent', () => {
  let component: ModalDeleteProductoComponent;
  let fixture: ComponentFixture<ModalDeleteProductoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalDeleteProductoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalDeleteProductoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
