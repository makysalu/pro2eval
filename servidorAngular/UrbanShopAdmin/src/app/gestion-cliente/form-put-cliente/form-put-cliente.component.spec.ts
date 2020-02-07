import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPutClienteComponent } from './form-put-cliente.component';

describe('FormPutClienteComponent', () => {
  let component: FormPutClienteComponent;
  let fixture: ComponentFixture<FormPutClienteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPutClienteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPutClienteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
