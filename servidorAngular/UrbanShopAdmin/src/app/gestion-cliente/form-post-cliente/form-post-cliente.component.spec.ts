import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPostClienteComponent } from './form-post-cliente.component';

describe('FormPostClienteComponent', () => {
  let component: FormPostClienteComponent;
  let fixture: ComponentFixture<FormPostClienteComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPostClienteComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPostClienteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
