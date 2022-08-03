# Redux

### Actions
Actions are pure javascript functions that simply return an object, with `type` the only required property and additional optional properties. 

Let's say for example that we have a panel component that has a title and description and the description is initially hidden but visibility can be toggled by clicking the title, the following is an example of what the action would look like:

```
export const TOGGLE_PANEL = 'TOGGLE_PANEL';

export function togglePanel(index: number): ObjectMap {
	return {
		type: TOGGLE_PANEL,
		index: index
	};
}
```

### Reducers
Reducers simply handle merging of data or updates of data. Let's take the above example of having a panel that we want to toggle and create a reducer below.

```
function togglePanel(state: [] = [], action: ObjectMap): ObjectMap {
	switch(action.type) {
		case TOGGLE_PANEL:
			return state.map((panel: any, index) => {
                if (index === action.index) {
                    return Object.assign({}, panel, {
                        isToggled: !panel.isToggled
                    });
                }
                return panel;
            });
	}
}
```

In the above, the `action` is whatever was returned from the function `togglePanel()`. In this case it is an `object` with a `type` and `index` which is why inside the `togglePanel()` reducer we can access things like `action.type` and `action.index`.