# ReactJS

## App Creation
**Command to create a react app**
`Typescript`
`create-react-app <appName> --scripts-version=react-scripts-ts`

`Plain javascript`
`create-react-app <appName>`

## Components

#### Binding `this` to a method
Take for example this simple component definition:
```
class Test extends React.Component {
  constructor(props) {
    super(props);
    this.testClick = this.testClick.bind(this);
  }

  render() {
    return (
      <h2 onClick={this.testClick}>Test component (click me)</h2>
    );
  }

  testClick() {
    console.log('Testing the click', this.props.property1);
  }
}
```

If we were to do something like this: 
```
ReactDOM.render(
  <Test property1="1" />,
  document.getElementById('root')
)
```

The click method would have access to the `property1`, what makes this possible is the following line:
`this.testClick = this.testClick.bind(this);`

Without this line `this` reference returns `undefined`

#### Stateless components
When using a stateless component, you lose access to `this`, component life cycle events and more. It allows you to simply write a normal function without the need for class structure. There are some syntax differences when working with stateless components, for instance you may be used to: (inside component)

`this.props.someVar`

In a stateless component you can't access the property like this, it must be done like this:

`props.someVar`

##### Hooks
When using a stateless component you can use `useEffect`, this is basically to keep from actually rerendering if the value hasn't changed. Take the code example below:

```
useEffect(() => {
  document.title = `You clicked ${count} times`;
}, [count]);
```

This `useEffect` will only ever occur when the `count` value has changed. It is essentially the same thing in a stateful component as using `componentDidUpdate(prevProps, prevState)` then inside the hook comparing the previous to the current value for changes.

Reference [https://reactjs.org/docs/hooks-effect.html](https://reactjs.org/docs/hooks-effect.html)

## Routing

#### Adding default route
This is very simple to accomplish by utilizing the `<Switch>...Routes go here...</Switch>`. The switch statement essentially says render the very route that matches. Here is an example of how to accomplish this:

```
<Router>
  <Switch>
    <Route path="/some/path" component={SomeComponent} />
    <Route path="*" component={DefaultComponent} />
  </Switch>
</Router> 
```



