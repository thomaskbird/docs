# Record<Keys, Type>

A record is a type that describes an object where it must have keys that are properties and the value is a certain type.

```
interface CatInfo {
  age: number;
  breed: string;
}
 
type CatName = "miffy" | "boris" | "mordred";
 
const cats: Record<CatName, CatInfo> = {
  miffy: { age: 10, breed: "Persian" },
  boris: { age: 5, breed: "Maine Coon" },
  mordred: { age: 16, breed: "British Shorthair" },
};
 
cats.boris => const cats: Record<CatName, CatInfo>
```

https://www.typescriptlang.org/docs/handbook/utility-types.html#recordkeys-type