{
"title" : "Angular ngClass Conditional CSS",
"author":"Mark Voorberg",
"tag":"How-To",
"category":"Software Development",
"meta-description": "Learn how to use Angular’s NgClass directive."
}

Angular conditional styling with ngClass is a very flexible way to style components in your apps. You can use ngClass for styling currently selected list elements or active menu items based on some component state.

It's possible to add css classes directly to an HTML element using the typical angular input property, but it's not very flexible. 

```html
<!-- regular HTML with two CSS classes -->
<button class="btn btn-primary" type="submit">Button</button>

<!-- simple Angular class input binding to add the second class -->
<button class="btn" 
        [class.btn-primary]="true" 
        type="submit">Button
</button>
```

### Use ngClass for more control over classes

The ngClass is a directive that can handle a wide variety of inputs making it very flexible and at the same time hard to remember all the different ways you can use it!  

### ngClass with a String
The simplest case is passing a String to ngClass. In this case it's not particularly flexible, but it's a stepping stone to something better.

```HTML
<!-- Add one class -->
<div [ngClass]="'rainbow-one'"></div>

<!-- Adding three classes -->
<div [ngClass]="'rainbow-one rainbow-two rainbow-three'"></div>
```
A more useful variation of this simple method lets us choose between two classes using a ternary operator.
```HTML
<!-- Adding one class or the other -->
<div [ngClass]="isEven ? 'rainbow-one' : 'rainbow-two'"></div>
```
### ngClass with an Array of Strings
Depending how you arrive at the list of classes to be applied, using an Array might useful. 

```HTML
<!-- Add an Array of class names -->
<div [ngClass]="['rainbow-one', 'rainbow-two']"></div>
```

### ngClass with an Object
When passing an Object to ngClass, only the truthy attributes are applied as classnames to the element.

```HTML
<!-- The truthy arributes will be added as classes, falsey ones will be ignored.  -->
<div [ngClass]="{apple: true, 'green-banana': true, pear: false }">Hello there!</div>
```

This next syntax looks a bit wacky, because the attribute name includes spaces separating our classnames. 
```HTML
<!-- I'm not a fan of this, it looks ridiculous. -->
<div [ngClass]="{'apple green-banana pear': true }">Hello there!</div>
```

### Wrap-up
These are some of the many waysto use an `ngClass` to style your Angular components. 

