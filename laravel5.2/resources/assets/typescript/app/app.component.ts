import { RouteConfig, ROUTER_DIRECTIVES, ROUTER_PROVIDERS } from '@angular/router-deprecated';
import { bootstrap } from '@angular/platform-browser-dynamic';
import { Component } from '@angular/core';
import { HomeComponent} from '../home/home.component';
import { AuthComponent } from '../auth/auth.component';
import { RegisterComponent } from '../register/register.component';

@Component({
    selector: 'body',
    templateUrl: '/js/app/app.component.html',
	directives: [ROUTER_DIRECTIVES],
	providers: [
		ROUTER_PROVIDERS,
	]
})

@RouteConfig([
	{
		path: '/auth',
		name: 'Auth',
		component: AuthComponent
	},
	{
		path: '/register',
		name: 'Register',
		component: RegisterComponent
	},
	{
		path: '/home',
		name: 'Home',
		component: HomeComponent,
		useAsDefault: true
	}
])

export class AppComponent {

}


