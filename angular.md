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



