{
"title" : "Using Getters and Setters in JavaScript",
"image" : "2017-11-01-using-getters-and-setters-in-javascript.jpg",
"author":"Mark Voorberg",
"date":"01-11-2017",
"tag":"Best Practices",
"category":"Software Development",
"slug": "using-getters-and-setters-in-javascript",
"meta-description": "Exploring how to create JavaScript Objects with custom properties"
}


Creating Objects in Javascript allows complex functionality while exposing only certain functions. Sometimes it's helpful to expose Object properties as well and unless they're simply read-write attributes, it may not be immediately clear how to how to do it.

###Simple JavaScript Objects

As we covered in a [previous post](/blog/javascript-object-constructors-and-classes), simple Objects in JavaScript can be defined in a couple ways:

```
// Simple function-as-an-Object
function Person() {
    this.name = "Jimmy";
};
let person = new Person();

// When using objects as 'containers', this is much simpler
let person = { name: "Bill" };

```
The usage of a property is slightly different than using a function, but the net result is the same. Let's create a read-only property that replicates this function on our `person`.

```
var person = {
    phoneNumbers: {cell: '555-1234', work: '555-7890', home: '555-9990'},
    phones: function() {
        return Object.keys(this.phoneNumbers);
    }
};
console.log(person.phones()); // a function
// prints: ["cell", "work", "home"]
```

###Read-Only Properties
Creating a read-only property on each of the above Objects is slightly different, but neither one is difficult if you know how. If the property isn't something that should be changed or replaced, we can add a read-only property by adding only the getter method. If we're adding our getter to the Object at the same time as the rest of it's properties, it looks like this:
```
var person = {
    phoneNumbers: {cell: '555-1234', work: '555-7890', home: '555-9990'},
    get phones() {
        return Object.keys(this.phoneNumbers);
    }
};
console.log(person.phones); // a property
// prints: ["cell", "work", "home"]
```
If you need to modify the `person` object *after* it's been created, you can do it using `Object.defineProperty`

```
var person = {
    phoneNumbers: {cell: '555-1234', work: '555-7890', home: '555-9990'}
};
Object.defineProperty(person, 'phones', {
    get: function() {
        return Object.keys(this.phoneNumbers);
    }
});
console.log(person.phones); // a property
// prints: ["cell", "work", "home"]
```

What you might notice at this point is that when using `Object.defineProperty`, our Object is missing the `phones` key if we try to examine it's properities. 
```
console.log(Object.keys(person)); 
// prints: ["phoneNumbers"]
```
That's because, by default, new properties added this way are not enumerable. Adding `enumerable: true` to the property declaration, will fix that.

```
var person = {
    phoneNumbers: {cell: '555-1234', work: '555-7890', home: '555-9990'}
};
Object.defineProperty(person, 'phones', {
    get: function() {
        return Object.keys(this.phoneNumbers);
    },
    enumerable: true
});
console.log(Object.keys(person)); 
// prints: ["phoneNumbers", "phones"]
```
There are several other keys like `enumerable` that can be added to your property descriptor depending on your situation or need.

> #### configurable
> Set it to `true` if the type of this property descriptor may be changed and if the property may be deleted from the corresponding object. Default `false`.
> 
> #### enumerable
> Set it to `true` if this property should be visible during enumeration of the object's properties. Default `false`.
> 
> #### value
> The value associated with the property. Can be any valid JavaScript number object, function, etc. Default `undefined`.
> 
> #### writable
> Set it to `true` if the property value may be changed with an assignment operator. Default `false`.


If you've used a function to define your Object, you will need to manipulate the new Object's prototype as follows:
```
// Simple function-as-an-Object
function Person() {
    this.name = "Jimmy";
    this.phoneNumbers = {home: '555-6547', emergency: '555-8520'};
};
Object.defineProperties(Person.prototype, {
    phones : {
        get : function() {
            return Object.keys(this.phoneNumbers);
        },
        enumerable: true
    }
});
var person = new Person();

console.log(person.phones);
// prints: ["home", "emergency"]

console.log(Object.keys(person)); 
// prints: ["phoneNumbers", "phones"]
```

Both examples provided here work the same way for creating custom setters as well, if your situation demands it. Keep in mind that a regular property may be more performant but it's not always an option. As always, if you're writing JavaScript for the web, check out the browser compatibility, and other details at [mozilla.org](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/defineProperties).


