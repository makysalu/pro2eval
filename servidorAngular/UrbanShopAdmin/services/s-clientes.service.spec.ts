import { TestBed } from '@angular/core/testing';

import { SClientesService } from './s-clientes.service';

describe('SClientesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SClientesService = TestBed.get(SClientesService);
    expect(service).toBeTruthy();
  });
});
