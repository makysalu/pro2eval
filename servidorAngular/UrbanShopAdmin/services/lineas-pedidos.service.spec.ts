import { TestBed } from '@angular/core/testing';

import { LineasPedidosService } from './lineas-pedidos.service';

describe('LineasPedidosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: LineasPedidosService = TestBed.get(LineasPedidosService);
    expect(service).toBeTruthy();
  });
});
