import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormPutProductoComponent } from './form-put-producto.component';

describe('FormPutProductoComponent', () => {
  let component: FormPutProductoComponent;
  let fixture: ComponentFixture<FormPutProductoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormPutProductoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormPutProductoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
