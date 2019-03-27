# Swift

#### Variable declaration
	Constant: `let <constantName> = <value>` - Value can never be changed or reassigned
	Variable: `var <variableName> = <value>` - Value can be changed or reassigned

#### Type inference `optional`
Allows for explicit type casting of variable just like typescript but with different syntax for different types
Reference: https://www.programiz.com/swift-programming/data-types

#### Arrays
Arrays can be instantiated just like javascript:
`var arr = ["red", "yellow", "blue"];

#### Dictionaries
Dictionaries are very similar to javascript object literals

`var dictionary = ["key1": "val1", "key2": "val2", "key3": "val3"];

Accessing the value:

dictionary["key2"]

#### Defining optionals
The question mark directly following the definition of the type signifies that this variable is optional
`var jobTitle: String?`

Ensuring a variable has a value:

```
if jobTitle != nil {
    var message = "Your job title is " + jobTitle!
}
```

## Resources
- https://docs.swift.org/swift-book/LanguageGuide/TheBasics.html