{
"title" : "JavaScript Object Constructors and Classes",
"image" : "2017-07-21-javascript-object-constructors-and-classes.jpg",
"author":"Mark Voorberg",
"date":"21-07-2017",
"tag":"Best Practices",
"category":"Software Development",
"slug": "javascript-object-constructors-and-classes",
"meta-description": "Reviewing the ins and outs of Object Constructors and Classes in JavaScript."
}


While exploring the details of ES6, one of the first things that you'll read about is the new `class` keyword.
It's not really something new, rather a new way to do the same thing we were doing before.
It's simply a different way to create JavaScript Objects.

###Creating JavaScript Objects

Let's review several different ways to create an Object in JavaScript.

```
// Realisticly, I haven't created an Object this way in years
var foo = new Object();

// or, the more familiar function-as-an-Object
function Book() {};
var bar = new Book();

// When using objects as 'containers', this is much simpler
var baz = { name: "Bill" };

```

While each of these statements creates a new Object, they're not identical.
If you examine the constructor on each object you'll see that they have different prototypes.
The constructor property points to the constructor that was used to instantiate the object.
Any objects that inherit from another object will also inherit the constructor property.
After running each of the above statements in the browser console, we can print out their constructors.
```
console.log(foo.constructor)
// prints: function Object() { [native code] }

console.log(bar.constructor)
// prints: function Book() {}

console.log(baz.constructor)
// prints: function Object() { [native code] }

```
So the second one, where we provided a function as it's definition has a unique constructor because it has it's own `Book` prototype.
Objects created with the `new` keyword and a constructor other than `Object()`, get their prototype from that constructor.
The prototype is used as a template for creating new instances of an object and can be modified after the fact allowing us to
add methods giving our objects behaviours.

```
// Creating a simple object constructor, then adding to it.
var Bot = function() {};
Bot.prototype.sayCheese = function() {console.log(":D");};

var foo = new Bot();
foo.sayCheese();

// prints: :D
```

###Starting in ES5 we could use Object.create()

Let try the same thing using [Object.create()](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/create) providing a simple prototype that includes both a property and a method. The second argument on Object.create() is an optional [properties definition object](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/defineProperties) that lets us add fields to the prototype.

```
var vehiclePrototype = {
	trunk: "tennis rackets",
	drive: function(){
		console.log(`Vroom with ${this.trunk} in my trunk!`);
	}
};
var vehicle = Object.create(vehiclePrototype,
	{
		trunk: {value: "shoes", writable: true},
		transmission: {value: "5-Speed manual"}
	});

console.log(vehicle.constructor);
// prints: function Object() { [native code] }

console.log(vehicle.drive());
// prints: Vroom with shoes in my trunk!

console.log(vehicle);
// prints:
	Object {trunk: "shoes", transmission: "5-Speed manual"}
```

Granted this is more than the simple examples above but it's interesting and worth exploring a little.
If we were building an inheritance chain, we could create `car` inheriting the prototype of our `vehicle` class and adding any properties we might need.
```
var car = Object.create(vehicle,
	{
		fuelPercent: {value: 35}
	});

console.log(car.drive());
// prints: Vroom with shoes in my trunk!

console.log(car);
// prints: Object {fuelPercent: 35}

```

I'm not yet sure how I'd leverage this in my projects, but the wheels are turning and I'm glad I spent the time to sort it out.

###Creating JavaScript Objects in ES6

Let's try something similar with an object defined using a *class declaration* using the new `class` keyword.

```
var Animal = class AnimalClass{};
var dog = new Animal();

console.log(dog.constructor);
// prints: class AnimalClass{}
```

> *FYI* A couple interesting things about using *class declarations*.
> A class declaration is not *hoisted*, whereas a function declaration gets hoisted
> (moved to the top).
> So make sure that classes are declared before they get used.
> Any code inside the class expression, within the curly brackets, is executed in strict mode,
> that includes the constructor, static and prototype methods, getter and setter functions.

We can everything with objects created using the 'class' keyword that we could do using classes
created by any other method but perhaps it's a little bit more familiar, it's a matter of preference.

While creating the example to demonstrate the various ways to augment my new class instance, I may have got carried away and added more than necessary to make my point, but I was having fun with it and wanted to include everything in a single example.
I've added a base class to demonstrate inheritance, methods to manipulate public and private states to your object instances and even a static constant.


Here's the code for my base class.  It's again quite simple and takes only a single constructor argument.
```
var Animal = class AnimalClass {
	constructor(options) {
		this.species = options.species;
	}
}
```
You can see that I'm passing an `options` object into our Animal base class.
The reason for this is that I don't know what properties I'll add in the future and I want to avoid changes to my constructor signature.
Depending where I use this class, the constructor could leak throughout my project and I'd like to avoid having to change it every time I add something new.

I'll add to our example with a health indicator and a secret-number function to 'play' with our new pet.
After running the Animal class declaration in your browser console, copy the following code into your console run the code and see how it responds.

```
var Mammal = class MammalClass extends Animal {
	constructor(options) {
		super(options);

		// Adding publicly accessible instance variables
		this.healthPercent = 100;
		this.says = options.says || "nothing";

		// A constructor private variable
		var secretNumber = Math.ceil(Math.random()*10);

		// A privileged method with access to the secretNumber.
		this.secret = function() {
			console.log(`${this.says}, I am thinking of #${secretNumber}.`);
			secretNumber = Math.ceil(Math.random()*10);
		};
	}

	// Adding a static constant
	static get HEALTH() {
		return ['dying', 'hungry', 'fine', 'good', 'awesome'];
	}

	// Adding some instance methods
	speak() {
		this.healthPercent -= 5;
		console.log(`A ${this.species} says ${this.says.toLowerCase()}!`);
	}
	run() {
		this.healthPercent -= 20;
		this.checkUp();
	}
	eat(health) {
		this.healthPercent += (health || 20);
		this.checkUp();
	}
	checkUp() {
		var healthVal = Math.ceil(this.healthPercent/20)-1;
		console.log(`I am one ${MammalClass.HEALTH[healthVal]} ${this.species}.`);
	}
};

var cat = new Mammal({species: 'cat', says: 'Meow'});
cat.secret();
// prints: Meow, I am thinking of #5.

cat.checkUp();
// prints: I am one awesome cat.

var dog = new Mammal({species: 'dog', says: 'Bark'});
dog.checkUp();
dog.run();
dog.run();
dog.secret();
dog.run();
dog.speak();
// prints:
	I am one awesome dog.
	I am one good dog.
	I am one fine dog.
	Bark, I am thinking of #6.
	I am one hungry dog.
	A dog says bark!
```

One thing that became apparent to me was that by adding private state to my constructor, I was bloating the size of my object.
For each instance of my Mammal object, there would be a copy of everything inside my constructor, in this case, that includes
the `secret()` function but in a real-world example the amount of code that accesses private data could be significantly more.
If we're creating 1000's of Mammal instances, things could get out of hand and it's something to keep in mind.

###Closures and Factories
We can avoid bloating our constructors by declaring our classes with a factory method and using closures to assemble our Objects.
A closure is a function that has access to member variables of it's enclosing scope.

Consider the following, simple closure.
```
function greetings(name) {
	return function() { console.log(`Good afternoon ${name}!`) };
}
var greetJim = greetings('Jim');
var greetGeorge = greetings('George');

greetJim();
greetGeorge();
// prints:
	Good afternoon Jim!
	Good afternoon George!
```
You'll notice that the value of `name` is preserved inside the function (closure) that is later used to print the expected greeting.

If a factory method is used to create new Object instances, we can add functions an properties our new Object using a closure.
Here's a simple factory example, returning a new object.
```
function simpleFactory(name) {
	return new Object({name});
}
console.log(simpleFactory('Amber'));

prints: // Object {name: "Amber"}
```

Of course, we can also use closures when composing an object with a *class declaration*
to create Objects that include private instance variables and class methods that won't get duplicated in memory for each new object instance.
```
function automobileFactory(name) {

	// This function gets captured in the Automobile constructor's closure.
	function transform(name) {
		return `**${name}**`;
	}

	// The odometer value is private within each instance of Automobile.
	var kms = 0;

	var Automobile = class AutomobileClass {
		drive() {
			kms++;
			console.log(`${transform(name)} goes vroom!.`,
							`Odometer: ${kms}km`);
		};
	};
	return new Automobile();
}

var mini = automobileFactory("MINI Cooper");
var camaro = automobileFactory("Chevrolet Camaro");

for (var i=0; i < 5; i++) {
	mini.drive();
	if (i%2){ camaro.drive(); }
}

// prints:
	**MINI Cooper** goes vroom!. Odometer: 1km
	**MINI Cooper** goes vroom!. Odometer: 2km
	**Chevrolet Camaro** goes vroom!. Odometer: 1km
	**MINI Cooper** goes vroom!. Odometer: 3km
	**MINI Cooper** goes vroom!. Odometer: 4km
	**Chevrolet Camaro** goes vroom!. Odometer: 2km
	**MINI Cooper** goes vroom!. Odometer: 5km
```

When creating objects that are going to be used outside of their immediate context,
it's good practice to hide their implementation inside a factory method.
This allows the freedom to define and instantiate objects however I choose and minimize
the impact of changes on the code that uses them when refactoring in the future.

As is true with any programming language, it's the finer details that separate good code from bad, and the better we understand how it all works together, the better software we can deliver to our customers.
