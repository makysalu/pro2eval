import { TestBed } from '@angular/core/testing';

import { SPedidosService } from './s-pedidos.service';

describe('SPedidosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SPedidosService = TestBed.get(SPedidosService);
    expect(service).toBeTruthy();
  });
});
