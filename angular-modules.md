AngularJS Generating Modules

I wanted to create an angular module, that contained all of the subsequent angular views, I did this for the users.

Generate an Angular Module using the cli, do the following command:

	`ng generate module users`

This will create the following directory structure

	src
		app
			users
				users.module.ts

From their you can generate the overall parent view container that will hold the child components in the `<router-outlet></router-outlet>` tag.

	`ng generate component users`

This will add the following files to our `src/app/users` directory:

	users.component.css
	users.component.html
	users.component.spec.ts
	users.component.ts

Once this is all finished you can start adding additional child views by creating child components:

	`ng generate component users/list`
	`ng generate component users/add`
	`ng generate component users/single`

This will give you the following directory structure:
	
	src
		app	
			users
				add
				list
				single

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