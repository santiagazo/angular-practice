System.register(['@angular/router-deprecated', '@angular/core', '../home/home.component', '../auth/auth.component', '../register/register.component'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var router_deprecated_1, core_1, home_component_1, auth_component_1, register_component_1;
    var AppComponent;
    return {
        setters:[
            function (router_deprecated_1_1) {
                router_deprecated_1 = router_deprecated_1_1;
            },
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (home_component_1_1) {
                home_component_1 = home_component_1_1;
            },
            function (auth_component_1_1) {
                auth_component_1 = auth_component_1_1;
            },
            function (register_component_1_1) {
                register_component_1 = register_component_1_1;
            }],
        execute: function() {
            AppComponent = (function () {
                function AppComponent() {
                }
                AppComponent = __decorate([
                    core_1.Component({
                        selector: 'body',
                        templateUrl: '/js/app/app.component.html',
                        directives: [router_deprecated_1.ROUTER_DIRECTIVES],
                        providers: [
                            router_deprecated_1.ROUTER_PROVIDERS,
                        ]
                    }),
                    router_deprecated_1.RouteConfig([
                        {
                            path: '/auth',
                            name: 'Auth',
                            component: auth_component_1.AuthComponent
                        },
                        {
                            path: '/register',
                            name: 'Register',
                            component: register_component_1.RegisterComponent
                        },
                        {
                            path: '/home',
                            name: 'Home',
                            component: home_component_1.HomeComponent,
                            useAsDefault: true
                        }
                    ]), 
                    __metadata('design:paramtypes', [])
                ], AppComponent);
                return AppComponent;
            }());
            exports_1("AppComponent", AppComponent);
        }
    }
});

//# sourceMappingURL=app.component.js.map
