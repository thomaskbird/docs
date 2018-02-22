# ReactJS

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

