import { Component } from '@angular/core';
import { OwlCarousel } from './owl-carousel.component';
import { OwlCarouselImages } from './owl-carousel-images.service';

@Component({
    selector: 'home',
	template: `<owl-carousel></owl-carousel>`,
	directives: [OwlCarousel],
})

export class HomeComponent {

}

