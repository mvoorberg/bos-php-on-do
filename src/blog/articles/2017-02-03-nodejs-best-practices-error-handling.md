{
"title" : "NodeJS - Best Practices Error Handling",
"image" : "2017-02-03-nodejs-best-practices-error-handling.jpg",
"author":"Mark Voorberg",
"date":"03-02-2017",
"tag":"BEst Practices, Tutorial",
"category":"Software Development",
"slug": "nodejs-best-practices-error-handling",
"meta-description": "Handling errors in NodeJs used to be a daunting task of returning errors in a callback's first argument. Thankfully there are better ways to avoid these as it's easy to shoot yourself in the foot when errors catch you by surprise."
}

Returning errors in the first argument of a callback works great in the simplest of examples, but the further you go down that path and the more code you write it quickly becomes apparent that it's not maintainable and should be handled differently. When ES6 became the standard on Node 4.x, we also inherited native Promises and a very clean way to manage errors in our Nodejs JavaScript.

#### The *old* callback way
```
var divide = function(x, y, next) {
	if ( y === 0 ) {
		// execute the callback, passing an Error for the first argument.
		return next(new Error("Divide by zero"));
	}
	var data = x / y;
	// execute the callback, passing null for the first argument.
	next(null, data);
};

divide(4, 2, function(err, result) {
	if ( err ) {  // <--- Check for Errors!!
		console.log('Bad news kid:', err);
		return; // Handle the error and stop processing.
	}
	// It's all good
	console.log('Your answer is:', result);
});
```

Notice how inside the callback we need to first check for errors and if there is one, we log it and stop processing. If there's no error, we can continue along and print the result. You can imagine how tedious this would get each time you write a callback function, checking the `err` variable for null and handling it appropriately. Your code begins to become indented like crazy and it quickly becomes a total mess with things nested so deep you have to scroll sideways to read it all. Here's an example with only 3 levels of nesting.  Notice that there are three places where we have to check for errors from the caller and handle it in each case. If we'd missed even one of these cases, your code would have no return value and happily call the next callback with a garbage input.

```
divide(4, 2, function(err, result){
	if ( err ) {  // <--- Check for Errors!!
		console.log('Bad news at the first callback:', err);
		return;
	}
	divide(result, 2, function(err, result){
		if ( err ) {  // <--- Check for Errors!!
			console.log('Bad news at the second callback:', err);
			return;
		}
		divide(result, 0, function(err, result){
			if ( err ) {  // <--- Check for Errors!!
				console.log('Bad news at the third callback:', err);
				return;
			}
			// It's all good
			console.log('Thanks goodness we made it! Your answer is:', result);
		});
	});
});
```

#### Try Catch Finally

In synchronous code, we can simply put all of our code inside a try-catch block and be satisfied that any errors will end up in the catch block and we can handle everything in one, easy to manage, place. Do the same thing in asynchronous code and you're left wondering where the hell you went wrong. In an async call, thread execution would blow right past the catch block and the context is long gone by time any errors are thrown.

```
// try catch statements **only work on synchronous code**
try {
	// Do something synchronous here...
	throw new Error('example');
} catch (err) {
	// Handle any errors
	console.log("Bad news:", err);
} finally {
	// Release any resources
}
```

#### Enter the Promise
Before promises were available natively, you had to include a Promise library such as [Bluebird](http://bluebirdjs.com), or [Q](https://www.npmjs.com/package/q), to use promises in Node, but with ES6 and Node 4, they are built-in. In many cases you don't need to explicitly create a promise, You can use the ones returned from various libraries that implement them - I'm thinking about [Mongoose](https://mongoosejs.com/docs/promises.html) specifically.

Below is a manually created promise that wraps a synchronous function call. Any errors get caught in the catch block and the promise is rejected, otherwise it resolves and the return value can be used to begin a chain of promises.
```
var p = new Promise(function(resolve, reject) {
	var data;
	try {
		data = getSomethingSync();
	} catch (err) {
		return reject(err);
	}
	return resolve(data);
});
```

When your functions (or library functions) implement Promises, you're able to chain things together without all the tedious error checking at every step. The following is a promisified version of the nested example above. Notice how we only handle errors in a single place even though we're making the same three calls to `divide()`.
```
divide(4, 2)
	.then((result, 2) => divide)
	.then((result, 0) => divide)
	.catch((error) => {
		console.log('Bad news:', err);
		throw error;
	});
```

You can even use Promises to wrap existing Express endpoints to improve the error handling and reduce the amount of code. Below is a very simple case that demonstrates what that might look like.
```
server.get('/hello/:name', function(req, res, next) {
		return new Promise(function(resolve, reject){
			var data = req.params.name;

			// Doing something Asynchronous
			setTimeout(function() {
				if (data == "jim") {
					reject(new Error("No Jim here!"));
					return;
				}
				resolve(data)
			}, 1000);
		}).then((data) => {
			res.send('hello ' + data);
			console.log("SUCCESS", data);
			next();
		}).catch(function(err) {
			console.error(err);
			next(err);
		});
	});

```

#### Uncaught Exceptions
Uncaught Exceptions are bad news and will leave your Nodejs app in an unknown state. This handler should be used to clean up resources such as open file descriptors, handles etc before exiting the process. An external process should be used to recover or restart your application after it exits.
```
// Include an UncaughtException handler and the
process.on('uncaughtException', function(err) {
	// handle the error safely, close any files or database connections and restart the console.error(err);
});
```

#### Uncaught Rejections
Starting at Nodejs version 7.0.0, if you're using Promises in your application, you should also include an [unhandledRejection handler](https://nodejs.org/api/process.html#process_event_unhandledrejection). Again, it should never be allowed to happen, but you need to be aware when it does so that it can be addressed.
```
process.on('unhandledRejection', function(reason, p) {
	// log the error so that it can be investigated and corrected as necessary
	console.error('Unhandled Rejection at: Promise', p, 'Reason:', reason);
});
```

#### Logging to Persistent Storage
Now that all the errors that occur within in your nodejs application are coming through appropriate error handlers, we need to record them somewhere. While it may seem obvious, error handling should include a logging solution that is persistent and off the server itself. It may be simple enough to log things to the console during development but by the time you're deploying your application you need persistent log storage that's easy to digest and will survive when your server becomes unavailable. If you're deploying to containers, the problem is a little more immediate as they get destroyed during scaling down or a re-deploy taking the local storage with it so logging to the file system is not an option.

#### Finally
If you're deploying Nodejs in production, it's critical that your application is properly setup to handle problems what they arise. With the asynchronous nature of Nodejs programming, it's easy to get off on the wrong foot and head down a path where finding the cause of a specific error can be very difficult. By following the things outlined in this article, you're well on your way to building a rock solid nodejs app that will serve your business, and your customers well for a long time to come. If you're developing with Node and need some help getting pointed in the right direction, or simply need some assistance hitting a deadline, give us a shout.  We've got years of professional Nodejs development experience and many more building Enterprise software.
