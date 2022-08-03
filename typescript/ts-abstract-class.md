# Abstract Classes in Typescript

The best way to explain an abstract is such that it is a template. It defines what a given class should have by utilizing abstract methods that allow classes that extend the abstract class to be required. It also allows for common functionality to be grouped in the them while defining other items that aren’t but are required to be of that class type. For example:

```
abstract class User {
	constructor() {}
	getEmail() {}
	getAge() { return 21; }
	updateUserField(data, key, val) {
		return {
			...data,
			[key]: val
		}
	}

	abstract getName(): string;
}
```

So in the above the abstract class would be defined as a class of `User`, this abstract class can never be instantiated directly, meaning I can't do this otherwise it would throw an error:

```
const john = new User();
```

The way that you could use this abstract class would look something like this:

```
class John extends User {}
```

This would not throw the error, for can't instantiate class but it would yell at us for not implementing the `getName()` method on this class. So we would have to do something like this:

```
class John extends User {
	getName(): string {
		return 'John';
	}
}
```

So in summary, it allows us to have type safety by utilizing the class `User` like a template that requires certain methods to be defined that we may want or know need to be included on all classes that extend our abstract class and also define other shared functionality. We could use this something like this:

```
const john = new John();

console.log(john.getName());

// would log "John";

console.log(john.getAge());

// would log 21
```