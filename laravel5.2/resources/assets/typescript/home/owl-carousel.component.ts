import { Component, ElementRef } from '@angular/core';
declare var jQuery: any;

@Component({
  selector: 'owl-carousel', // in HomeComponent
  template: `<button>A needed Button</button>`
})

export class OwlCarousel implements onInit{
  constuctor( private _elRef: ElementRef) {

  }

  ngOnInit(): any{
    jQuery(this._elRef.nativeELement).find('button').on('click', function() {
      alert('this Works');
    });
  }
}
