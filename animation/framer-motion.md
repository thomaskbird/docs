# framer-motion

### Using custom components

Looks like you can use custom react components as motion components by simply wrapping them with motion:

```
Const Component = React.forwardRef((props, ref) => (<div ref={ref}></div>));

Const MotionComponent = motion(Component);
```

Only problem, might be that you would have to forward that ref and if it is a package component that you don’t maintain, that might be a problem.

### Using a parent element to trigger animation in children

You could use the parent element and make it a motion element then define a `transition` property and use the `delayChildren` and `staggerChildren` properties in order to create a staggered effect.

Or

You can simply define that within the child component, using the variant as a function rather than just an object.

```
const item = {
  hidden: { y: 25, opacity: 0 },
  visible: (i: number) => ({
    y: 0,
    opacity: 1,
    transition: {
      delay: i * 0.3,
      duration: 0.1
    }
  }),
};
```

Then on the child component add a `custom` property with your dynamic value.

```
{arr.map((item, idx) => <motion.div custom={idx}>)}
```