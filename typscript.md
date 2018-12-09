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