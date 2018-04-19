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

Declarations `public`, `static` and `protected` are called modifiers

## Example interface for a user
enum AddressType {
  home = "Home",
  work = "Work"
}

interface Address {
  type: AddressType;
  address1: string;
  address2: string;
  city: string;
  state: string;
  zip: number;
}

enum PhoneType {
  home = "Home",
  work = "Work",
  mobile = "Mobile",
  fax = "Fax"  
}

interface Phone {
  type: PhoneType;
  number: string;
}

interface User {
  firstName: string;
  lastName: string;
  address: Address;
  phones: Phone[];
  age: number;
  email: string;
  
}