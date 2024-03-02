# React Native

### Navigation
Navigating between multiple Navigators or stacks.

When you create a component, in this instance lets call it `TestComponent` you can pass `navigation` like below:

```typescript jsx
const TestComponent = ({ navigation }) => {}
```

Now let's say we are `MainPages` navigator and let's say we have a `ContactNavigator` we could navigate to the `Form` view inside of `ContactNavigator` by doing the following:

```typescript jsx
const TestComponent = ({ navigation }) => (
  <View>
    <Button
      onPress={() => {
        navigation.navigate('ContactNavigator', { screen: 'Form', {...}})
      }}
    /> 
  </View>
)

```
