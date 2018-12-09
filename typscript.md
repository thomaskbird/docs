# Typescript
Typescript is regular javascript with `type signatures`.

**Examples:**

**Variable Defintion**
`format`: `const variableName: varType;`
`example`: `const isLoading: boolean;`

**Function Definition**
`format`: `function funcName(arg1: argType, arg2: argType): returnType {}`
`example`: `function isloading(promise: any): boolean {}`

**Interface Definition**
```
interface Iname {
  key: string;
  val: string;
}
```
Usage:
```
const name: Iname = { key: "name", val: "Johnson" };
```

## List of types

### Partial
`Type Partial = Partial<Interface>` - This will take any interface and make all of its values optional

### Pick
`Type Partial = Pick<Interface, "Pipe" | "Separated" | "Properties">;`

Example:

```
interface User {
    id: string;
    firstName: string;
    lastName: string;
    email: string;
    created: string;
}
```

```
type UserPartial = Pick<User, "id" | "firstName" | "lastName">;
```

This is the same as saying:

```
interface UserPartial {
    id: string;
    firstName: string;
    lastName: string;c
}
```
Declarations `public`, `static` and `protected` are called modifiers

## Example interface for a user
```
enum AddressType {
  home = "Home",
  work = "Work"
}
```

```
interface Address {
  type: AddressType;
  address1: string;
  address2: string;
  city: string;
  state: string;
  zip: number;
}
```

```
enum PhoneType {
  home = "Home",
  work = "Work",
  mobile = "Mobile",
  fax = "Fax"
}
```

```
interface Phone {
  type: PhoneType;
  number: string;
}
```

```
interface User {
  firstName: string;
  lastName: string;
  address: Address;
  phones: Phone[];
  age: number;
  email: string;
}
```

### Non-null assertions
Sometimes in your code you may have something that maybe null or the linter can't see where it's being set. You can tell the linter to not worry about that if you know that it will be set. For instance:

`event.api!.methodToBeCalled()`


### Implements
An individual interace can extend multiple interfaces. This allows a single interface to include multiple other interfaces, properties and methods. Take for example the following:

`interface User extends Phone, Address {}`

This user interface now has access to all of the properties and methods within the phone interface and address interface. This means that you can now write something like this:

`interface Police implements User {}`


A class that extends a class(es) gains access to all of the method and properties of the extended classes.
  Any method or property of a class that is marked private cannot be overridden by the extending class
A interface that implements another interface that has child interfaces requires you to satisfy all of the methods and properties that are not optional within the child interfaces.
