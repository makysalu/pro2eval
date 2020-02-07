import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ModalDeleteClienteComponent } from './modal-delete-cliente.component';

describe('ModalDeleteClienteComponent', () => {
  let component: ModalDeleteClienteComponent;
  let fixture: ComponentFixture<ModalDeleteClienteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ModalDeleteClienteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ModalDeleteClienteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
