{
"title" : "Using template strings in ES6",
"image" : "2017-07-25-using-template-strings-in-ES6.jpg",
"author":"Mark Voorberg",
"date":"25-07-2017",
"tag":"Best Practices",
"category":"Software Development",
"slug": "using-template-strings-in-ES6",
"meta-description": "If you haven't started using template strings in JavaScript, now is the time."
}

I bought my first book on JavaScript somewhere around 1998, and the topic of String manipulation was limited to using the "+" operator to join two strings and using the "+=" operator to append to an existing string. For the most part little changed and handling Strings was always awkward especially when compared with languages like C# or Java, PHP, Python, Ruby... you're probably getting my point.

With the advance of ES6 support in current browser and Node runtimes, we can take advantage of ES6 Template Strings to clean up some of the seemingly primitive string handling. We can start using String interpolation, embedded expressions, proper multi-line Strings, formatting and something I hadn't used before, String tagging (an exciting example to follow).

####Template String Syntax
A simple template string looks exactly like any other String, with the exception of using back-ticks instead of single or double quotes. A simple example might look like:

```
let foo = `Hello World!`;
console.log(foo);
// prints: Hello World!
```

So far, nothing new here, except the backticks. Let's try something else, adding in a simple substitution.

```
let name = "James";
let foo = `Hello ${name}!`;
console.log(foo);
// prints: Hello James!
```

####Template String Substitutions
Template substitutions are JavaScript expressions, so we can evaluate code inline with our templates.

```
let name = "James";
let foo = `Hello ${name.toUpperCase()}!`;
console.log(foo);
// prints: Hello JAMES!
```

If you need to include backticks within your string templates, simply escape them, the same way you would anything else.
```
console.log(`...into what I like to call a \`Death Star\`.`;);
// prints: ...into what I like to call a `Death Star`.
```

####Multiline Syntax
Every now and then you need to include a large block of text that includes newline characters and  would require word-wrapping to fit in your editor, and until now, it's been a horrible mess with something like:
```
var message = "This is my\n";
	+ " stupidly long\n";
	+ " and horrible\n";
	+ " to maintain\n";
	+ " string.";
console.log(message);
// prints: This is my
 stupidly long
 and horrible
 to maintain
 string.
```
Or, even worse...
```
var message = "This is my\n";
message += " stupidly long\n";
message += " and horrible\n";
message += " to maintain\n";
message += " string.";
```
Or using the always hacky, but far better than previous options, backslash-newline method;

```
var message = "This is my\
 stupidly long\
 and horrible\
 to maintain\
 string.";
```

Using a template string, this all goes away and the string simply includes newlines as entered in code;
```
var message = `This is a
 lot easier to
 work with,
 read,
 and maintain.`;
console.log(message);
// prints: This is a
 lot easier to
 work with,
 read,
 and maintain.
```

####Tagged Templates
The features of a String template that we've covered so far are very simple and straight forward. While useful and new to the language, there's nothing magical happening there. This is where things get interesting. A tagged template allows you to transform the string by deconstructing the template and it's nested expressions and passing them into a function.  The function can do whatever it needs to using the template parts and the substitutions, and returns a finished string.

Let's consider a very simple example;
```
function vadar(){ 
  console.log(arguments); 
  return 'foo'; 
}; 
var name = "Luke"; 
var relative = "father"; 
console.log( vadar`Good afternoon ${name.toUpperCase()},
                    I am your ${relative}.`); 
```

> Aside: If you're not familiar with the JavaScript 'arguments' Object, it's an Array-like 
> object that is available within all JavaScript functions. It includes the parameters passed 
> in when the function was invoked. Notice I said Array-like.  It's not a *real* JavaScript Array and as such, methods like 'slice' aren't available.

Running this in your browser console, you will be able to examine the output of `console.log(arguments);`. In this case, there are three components:

1. An Array of three elements:<br/> ["Good afternoon ", ", I am your ", "."]
2. A string that is the expression result of the first substitution: "LUKE"
3. A string that is the expression result of the second substitution: "father"

Knowing the pieces that are passed into the tag function, we can now assemble them into a useful string. For this example, we'll simply convert the template pieces to uppercase, leaving the substitutions as-is.  The resulting string should look like:
```
GOOD AFTERNOON JavaScript, I AM YOUR master.
```

```
function upper(args, ...subs) { 
	var i = 0; 
	var result = args[i++].toUpperCase(); 
	for(var sub of subs) { 
		result += sub; 
		result += args[i++].toUpperCase(); 
	} 
	return result; 
} 
var name = "JavaScript"; 
var relative = "master"; 
console.log(upper`Good afternoon ${name}, I am your ${relative}.`);
```

Better use cases for tagged template strings could include escaping HTML characters, wrapping strings with HTML tags, i18n or date and currency formatting. However, using this simple example demonstrates the capability, and once you understand how they can be used there's a lot of power there. It will be interesting to see what other developers are doing with them and where they might show up!


