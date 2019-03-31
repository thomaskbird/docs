# AngularJS

## Generating Modules

I wanted to create an angular module, that contained all of the subsequent angular views, I did this for the users.

Generate an Angular Module using the cli, do the following command:

	`ng generate module users`

This will create the following directory structure

```
src
	app
		users
			users.module.ts
```

From their you can generate the overall parent view container that will hold the child components in the `<router-outlet></router-outlet>` tag.

	`ng generate component users`

This will add the following files to our `src/app/users` directory:

```
users.component.css
users.component.html
users.component.spec.ts
users.component.ts
```

Once this is all finished you can start adding additional child views by creating child components:

`ng generate component users/list`
`ng generate component users/add`
`ng generate component users/single`

This will give you the following directory structure:

```	
src
	app	
		users
			add
			list
			single
```

For routing, update the following file `src/app/users/users.module.ts` and add the following code:

```
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {Router, RouterModule, Routes} from '@angular/router';

import { ListComponent } from './list/list.component';
import { AddComponent } from './add/add.component';
import { SingleComponent } from './single/single.component';
import { UsersComponent } from './users.component';

const routes: Routes = [
  {
    path: 'users',
    component: UsersComponent,
    children: [
      {
        path: '',
        component: ListComponent
      },
      {
        path: 'add',
        component: AddComponent
      },
      {
        path: ':id',
        component: SingleComponent
      }
    ]
  }
];

@NgModule({
  exports: [
    RouterModule
  ],
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ListComponent, AddComponent, SingleComponent, UsersComponent]
})
export class UsersModule { }
```

The final step is to make sure that the module is being included, go to the following file `src/app/app.module.ts` and import the users module by adding this line.

	`import { UsersModule } from './users/users.module’;`

Then import the module by adding the following line to the `@NgModule.imports` array:

	`UsersModule`

And thats it, just change the following to meet your needs for other views

## Using components defined in sibling module

When using a sibling modules components in another module, you need to make sure to put the component into the `declarations` and `exports` arrays of the modules definition. For example:

```
@NgModule({
  imports: [UseInOtherModuleComponent]
  declarations: [UseInOtherModuleComponent]
})
export class SomeModule {}
```

Then wherever you would like to use the modules component simply put that modules definition into the `imports` array. Once this is done you will be able to access that modules components and use them inside that module. Note: Make sure if you are using the modules component in another component that you include it in the direct parents module

```
@NgModule({
  imports: [SomeModule]
})
export class SiblingModule {}
```

## Event syntax in Angular 4
`<a (click)="someComponentMethod()">Link</a>`

## Binding params to custom components Angular 4
`<custom-component [text]="'string value'" [item]="componentProperty"></custom-component>`

## Receiving bindings in the component definition

```
import {Input} from '@angular/core';

@Component({
  selector: 'custom-component',
  templateUrl: './custom-component.component.html',
  styleUrls: ['./custom-component.component.scss']
})
export class CustomComponentComponent implements OnInit {
  @Input() text: string = '';
  @Input() item: any = [];
}
```

`@Input()` defines this variable is a binding. Next is the name of the parameter to be bound to the component, following that is the expected `type` and then you can assign a default value. Whatever the default value is assigned will be overwritten once the parameter has been binded to the component. 


## Syntax for defining variables in typescript on a class in Angular 4
`private variableName: string = '';`

First you see `private` which can be `public`, `protected` or `private`. Second is the variable's name, then the data type expected and finally the default value.

## Module Imports, Exports & Declarations
|-------------------------------|---------------------------------------------------------------------|
| Import                        | makes the exported declarations of other modules available in the current module |
| Declarations                  | are to make directives (including components and pipes) from the current module available to other directives in the current module. Selectors of directives, components or pipes are only matched against the HTML if they are declared or imported. |
| Exports                       | makes the components, directives, and pipes available in modules that add this module to imports.  exports can also be used to re-export modules such as CommonModule and FormsModule, which is often done in shared modules. |






## Sharing components between modules
In order for a component to be usable inside of another module you must import the component into the module that you want to expose the component from. So let's say we have a `HelpersModule` that will export an abstract component `DatepickerComponent` this will be achieved with the following code.

`helpers.module.ts`

```
import { DatepickerComponent } from '<your_path_to_component>';

@NgModule({
  imports: [
  ],
  exports: [
    DatepickerComponent
  ],
  declarations: [
    DatepickerComponent
  ]
})
export class HelpersModule { }
```

The important part to note is that, the component must be included in both the `exports` and `declarations`. From there any other modules components can utilize the `DatepickerComponent` by importing it into the module that the component is defined in that will use our newly created `DatepickerComponent`.

## Binding to a component
If you ever have to do anything with the values that are being binded to the component you will need to use the `ngOnInit()` lifecycle hook, until the code reaches this point known of the bindings will be available.


## Sharing data between components
There will be times when you have components that are contained within different modules, but you need to listen to a change in one component in another in order to trigger some sort of change in the other component. This can be achieved by doing this:

#### ComponentOne
```
import { Component, OnInit } from '@angular/core';
import { SharedService } from '<shared_service_path>';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class ComponentOne implements OnInit {
  constructor(
    private shared: SharedService
  ) {
    this.shared.changeTrigger(false);
  }
}

```

#### SharedService
```
import { Injectable } from '@angular/core';
import {Subject} from 'rxjs';

@Injectable()
export class SharedService {
  public varToListenFor: Subject<any> = new Subject();

  changeTrigger(val: boolean) {
    this.varToListenFor.next(val);
  }
}
```

#### ComponentTwo
```
import { Component, OnInit } from '@angular/core';
import { SharedService } from '<shared_service_path>';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ComponentTwo implements OnInit {

  constructor(
    private shared: SharedService,
  ) {
    this.shared.varToListenFor.subscribe(val => {
      console.log('SharedService', val);
    });
  }
}
```

When the `changeTrigger()` is called you can pass it a set of values, the `varToListenFor` is a variable that when subscribed to can listen for changes. The `ComponentOne` triggers the change in the `changeTrigger` method, the `varToListenFor` calls the `next()` method passing a new value to the `SecondComponent` with the `.subscribe()` method attached. At any point you can run logic on the values being passed, change or emit new values based on input.

## Forms

This is how forms can work using Angular 6

Let's say we have a `FormComponent.ts`, the component file should look like this:

```
import { Component } from '@angular/core';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent {
  title = 'form';

  formVals = {
    name: null,
    email: null
  };

  onSubmit(vals) {
    console.log(vals);
  }
}

```

Then your template should look something like this:

```
<form (ngSubmit)="this.onSubmit(formVals)">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" [(ngModel)]="formVals.name" />
  </div>

  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" [(ngModel)]="formVals.email" />
  </div>

  <button type="submit">Submit</button>
</form>
```

Now when this form is submitted the following will be logged out:

```
{
  name: '...',
  email: '...'
}
```



























