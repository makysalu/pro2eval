import { TestBed } from '@angular/core/testing';

import { SProductosService } from './s-productos.service';

describe('SProductosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SProductosService = TestBed.get(SProductosService);
    expect(service).toBeTruthy();
  });
});
