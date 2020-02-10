import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'modal-error',
  templateUrl: './modal-error.component.html',
  styleUrls: ['./modal-error.component.css']
})
export class ModalErrorComponent implements OnInit {
  @Input() msgError: String;
  @Output() close = new EventEmitter();
  constructor() { }

  ngOnInit() {
  }

  closeModal() {
    this.close.emit();
  }
}
