{
"title" : "Getting started with Angular 4 without a seed",
"image" : "2017-07-14-angular-4-getting-started-without-a-seed.jpg",
"author":"Wiebo Troost",
"date":"14-07-2017",
"tag":"Tutorial",
"category":"Software Development",
"slug": "angular-4-getting-started",
"meta-description": "Use the Angular client and a little bit of help to get your  project started"
}

There is a lot more to Angular development than Javascript and Typescript. The tooling required to fully leverage the framework
is quite extensive. You need to consider debugging, building and distributing, and testing. Each of those take
additional tools and libraries, each with their own setup and configuration. Back when Angular 2 was still in Beta, and shortly after it was released, you'd
use a seed  project where all those issues were sorted out. We owe many thanks to Minko Gechev and the contributors to [his seed project](https://github.com/mgechev/angular-seed).

In this article we will achieve a very similar result by just using the Angular command line client (cli). We will create a new project and add the setup for
some basic navigation, at which point you'll have everything need to add your own special sauce.

###1. Getting started.
We'll assume that you have a recent version of node and npm already installed. We'll need to install the [angular cli](https://github.com/angular/angular-cli).
If you don't already have it, install it now from npm with the following command:

`npm install -g @angular/cli`

Open a command window and type `ng`. You should see the usage text for the command line tool
and running `ng --version` should print something similar to what I get on my development machine:

```
    _                      _                 ____ _     ___
   / \   _ __   __ _ _   _| | __ _ _ __     / ___| |   |_ _|
  / △ \ | '_ \ / _` | | | | |/ _` | '__|   | |   | |    | |
 / ___ \| | | | (_| | |_| | | (_| | |      | |___| |___ | |
/_/   \_\_| |_|\__, |\__,_|_|\__,_|_|       \____|_____|___|
               |___/
@angular/cli: 1.2.1
node: 6.11.0
os: linux x64
```

###2. Create the new project
Now we'll use the cli to create a new project for us. `ng new` allows us to create a new project complete with all the tools and configuration required
to do development, debugging, testing, building and distributing. Each project is configured the same way, making it easy for developers to work
on multiple projects as needed.

`ng new my-project`

You now have a basic project in the 'my-project' folder, that you can start adding content to.
You'll need to run `npm install` in the 'my-project' folder to install all
the dependencies from the package.json file that has been created for you.
Once everything has been successfully installed, running `ng test` will launch Karma and a browser to execute the tests.
Karma is used together with Jasmine for testing.
Some tests are pre-generated and you can see that everything passes in the browser window that opened.
You can leave that window open and start making changes to the app.
Every time you save a change the tests will be re-executed, so you can see that all is good.
Use `ctrl-c` in the command terminal to stop testing.

`ng serve` starts the application. By default the app is running on localhost on port 4200.
Browse to `http://localhost:4200` to have a look.
Aside from some very useful links to the resources you need to keep learning, there is not a lot there.
For you to be able to add your application details you'll need at least routing and navigation in the app.

###3. Add a simple component.
'ng generate' is fantastic at scaffolding code into the projects.
You can add modules and components, as well as other features, to the project with ease.
All the generated code will follow the same conventions, tests are added (the .spec.ts files) and setup for you to add your content to.
We will add a component so we can demonstrate the navigation in action.
You can group components in a single feature area into a module. However, for the purposes of this post, we'll just add the component to the app module.
We'll generate an 'about component' where you can display some text about the app and it's authors.
If your application is still running, use `ctrl-c` in the terminal to stop it. and run the following.

`ng generate component about`

It should print out a few lines explaining what it's doing, and any files that are created or modified.

```
$ ng generate component about
installing component
  create src/app/about/about.component.css
  create src/app/about/about.component.html
  create src/app/about/about.component.spec.ts
  create src/app/about/about.component.ts
  update src/app/app.module.ts
```

You will see a new 'about' folder has been added to the app folder. It contains the component files, including the tests.
The default html is just a little 'It Works' paragraph, which is exactly what we're after at this stage.

###4. Add Routing and Navigation
Routing and Navigation in Angular is fully featured for any requirement you may have.
For the purposes is this article we will just add basic routing and navigation to get you started.
We will use 'ng g' (short hand for 'ng generate') again to stub out our routing module.
Note that a dedicated routing module is not mandatory, but we're here to start building a serious app,
and we're better off handling all the routing in a seperate module.

`ng g module app-routing`

Once again, it tells you what's it's up to;
```
installing module
 create src/app/app-routing/app-routing.module.ts
 WARNING Module is generated but not provided, it must be provided to be used
```

The app-routing folder has been added and a standard module has been scaffolded.
The routing module is not a standard module though. Replace the code in
app-routing.module.ts with the following:

```
import { NgModule }              from '@angular/core';
import { RouterModule, Routes }  from '@angular/router';

import { AboutComponent } from '../about/about.component';

const appRoutes: Routes = [
  { path: 'about', component: AboutComponent }
];

@NgModule({
  imports: [
    RouterModule.forRoot(
      appRoutes,
      { enableTracing: true } // <-- debugging purposes only
    )
  ],
  exports: [
    RouterModule
  ]
})
export class AppRoutingModule {}
```

###4. Update the default App
We now need to update the default app to take advantage of our new routing module and our about component.
Open the 'app.module.ts' file. We need to import the about component and the new routing module into the app.
The final code looks like this:

```
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
//	v-- Added RouterModule and Routes from @angular
import { RouterModule, Routes } from '@angular/router';

import { AppComponent } from './app.component';
import { AboutComponent } from './about/about.component';
//	v-- Added our new AppRoutingModule
import { AppRoutingModule } from './app-routing/app-routing.module';


@NgModule({
  declarations: [
    AppComponent,
    AboutComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule // <-- Import our router module!
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
```

Next we need to add the navigation and router outlet to the App's html template.
Open the 'app.component.html' and add this code to the bottom:
```html
  <nav>
   <a routerLink="/about" routerLinkActive="active">About</a>
  </nav>
  <router-outlet></router-outlet>
```

If you still have 'ng serve' running, then you can see the navigation in action on `http://localhost:4200`.
Scroll down to the bottom of the page and you'll notice a new hyperlink labelled 'About' on the left side.
Click it and you'll see the page update adding "about works!" below it, rendered within the new router-outlet tag.
It's not much to look at and doesn't have any style yet, but it's a starting point to build out your app's functionality.
If you were paying close attention, you may have noticed that the page didn't
reload when we clicked the About link, it simply loaded the new component and updated the page as needed.

[tweet hashtag="angular4 angular2 javascript"]Getting started with Angular 4, without a seed.[/tweet]

###5. Don't forget about the tests!!
If you kill off the `ng serve` command with 'ctrl-c' and run `ng test` again, you'll notice that they fail horribly.
```
AppComponent should create the app
Failed: Template parse errors:
'router-outlet' is not a known element:
1. If 'router-outlet' is an Angular component, then verify that it is part of this module.
2. If 'router-outlet' is a Web Component then add 'CUSTOM_ELEMENTS_SCHEMA' to the '@NgModule.schemas' of this component to suppress this message. ("
 <a routerLink="/about" routerLinkActive="active">About</a>
</nav>
[ERROR ->]<router-outlet></router-outlet>
"): ng:///DynamicTestModule/AppComponent.html@23:0
```

That's because we added some routing dependencies that are not reflected in the app's tests yet.
Let's fix that. Open up 'app.component.spec.ts' and add the following imports to the top of the file:

```
import { RouterTestingModule } from '@angular/router/testing';
import { AboutComponent } from './about/about.component';
import { AppRoutingModule } from './app-routing/app-routing.module';
```

Then update the TestBed configuration in the 'beforeEach' to look like this:
```
beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [
        AppComponent,
        AboutComponent // Added here
      ],
      imports: [
        AppRoutingModule,
        RouterTestingModule
      ]
    }).compileComponents();
  }));
```

After declaring your AboutComponent and adding both imports for both AppRoutingModule and RouterTestingModule, your tests should pass.

> **Gotcha!**
> At the time of this writing there is a bug in zone.js version 0.8.13.
> You'll need to update the package.json file to pin it version 0.8.12.
> Edit 'package.json' in the root of your project, changing `"zone.js": "^0.8.4"`
> to `"zone.js": "0.8.12"`. Save the file and re-run `npm install` followed by `ng test`.


###Conclusion
The Angular team and the open source community are working together to provide us with tools,
features and functionality to support the framework.
By leveraging everything that the Angular CLI offers, it's very easy to start a new Angular project that's
well structured, ready for testing and easy to work with.
It's no longer necessary to cobble something together by yourself, hoping that you didn't overlook something,
or to rely on a complex seed project that's trying to be everything to everybody.
Using the Angular CLI gives you a familiar structure, built-in testing and gets your
project ready for building, debugging, testing and deploying sooner than hacking it together on your own.
