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

--------
A Record lets you create a new type from a Union. The values in the Union are used as attributes of the new type.

For example, say I have a Union like this:

```typescript
type CatNames = "miffy" | "boris" | "mordred";
```

Now I want to create an object that contains information about all the cats, I can create a new type using the values in the CatNames union as keys.

```typescript
type CatList = Record<CatNames, {age: number}>
```

If I want to satisfy this CatList, I must create an object like this:

```typescript
const cats: CatList = {
  miffy: { age:99 },
  boris: { age:16 },
  mordred: { age:600 }
}
```

You get very strong type safety:
- If I forget a cat, I get an error.
- If I add a cat that's not allowed, I get an error.
- If I later change CatNames, I get an error. This is especially useful because CatNames is likely imported from another file, and likely used in many places.

#### Real-world React example.
I used this recently to create a Status component. The component would receive a status prop, and then render an icon. I've simplified the code quite a lot here for illustrative purposes

I had a union like this:

```typescript
type Statuses = "failed" | "complete";
```

I used this to create an object like this:
```typescript
const icons: Record<
  Statuses,
  { iconType: IconTypes; iconColor: IconColors }
> = {
  failed: {
    iconType: "warning",
    iconColor: "red"
  },
  complete: {
    iconType: "check",
    iconColor: "green"
  }
};
```

I could then render by destructuring an element from the object into props, like so:

```typescript jsx
const Status = ({status}) => <Icon {...icons[status]} />
```

If the Statuses union is later extended or changed, I know my Status component will fail to compile and I'll get an error that I can fix immediately. This allows me to add additional error states to the app.

Note that the actual app had dozens of error states that were referenced in multiple places, so this type safety was extremely useful.
