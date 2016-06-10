/// <reference path="../../../typings/browser.d.ts" />
import {bootstrap} from '@angular/platform-browser-dynamic';
import {provide} from '@angular/core';
import {AppComponent} from './app/app.component';
import {HTTP_PROVIDERS} from '@angular/http';
import { Http, Response } from '@angular/http';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';
import {ROUTER_DIRECTIVES, ROUTER_PROVIDERS} from '@angular/router';
import 'rxjs/Rx';
bootstrap(AppComponent, [
    ROUTER_PROVIDERS,
    ROUTER_DIRECTIVES,
    HTTP_PROVIDERS,
    provide(LocationStrategy, {useClass: HashLocationStrategy})
]);
