{
"title" : "Introduction to Node.js",
"image" : "2016-10-18-nodejs-intro.jpg",
"author":"Mark Voorberg",
"date":"18-10-2016",
"tag":"Tutorial, Best Practices",
"category":"Software Development",
"slug": "nodejs-intro",
"meta-description": "Node.js is a powerful JavaScript based platform built on Google's JavaScript V8 Engine. It's well suited to high volume web apps and API's that need to provide data quickly and with comparatively few resources. It's completely open source, free and is in use on some of the highest profile websites by some of the biggest companies on the Internet."
}

We've been developing solutions with Node.js for a couple years now and once you wrap your head around a few simple concepts, going back to anything else feels like work. Before getting into details, lets talk about a few key points.

Node.js is not suitable for every application. It's not a good fit for CPU-heavy applications such as image or video processing. What it does do well is non-blocking, event driven I/O. Consider a typical LAMP web application that creates a new thread and allocates RAM for each client request. Eventually, with many simultaneous connected clients, the system is bogged down and users have to wait in line for their requests to be processed.
On the other hand, Node.js uses a single threaded event loop, avoids context switching between threads and doesn't block on IO calls allowing it to support far more concurrent connections on comparable hardware.

Wait a second, there's only one thread handling all those requests?

It's true but you need to remember that the slowest thing a computer does during a typical request is fetch data from somewhere else, like the network, or your database, or even a local file system. Because Node.js doesn't block on IO, it simply initiates a request for data, then continues servicing the next request.  When the initial data request is (eventually) fulfilled, a callback function is invoked and the response is sent to the client. All of this can happen in a handful of milliseconds, but when you're servicing 10000 clients at a time those round-trips to your database really stack up!

With only one thread handling all those requests it's easy to understand that you can't allow a single request to crunch video data or execute expensive computations as it will bring the server to it's knees. The other thing to consider is that allowing errors to go uncaught would put the instance into an unknown and irrecoverable state, thereby crashing the app.
Without carefully considering what's under-the-hood and the potential weakness of a Node.js application, there's plenty of opportunity to run into trouble.

#### Community Support

The Node.js community has grown at an amazing rate since it was first conceived in 2009, to where it is today.  A quick search on NPM, the Node Package Manager, (and now Yarn) will yield hundreds of open source packages to handle most everything your applications might need to do. Choosing the packages you need is simply a matter of finding the best-fit for your application and implementing it within your app. If you don't see what you need, perhaps there's something close that you can modify for your needs or submit a pull-request with the changes you require.

#### Conclusion

Node.js isn't the answer to every computing problem, but it does solve the I/O scaling challenges faced by current web apps and when paired with current container-based deployments it provides a robust platform for high-volume, high-availabilty data applications. If you're building modern web applications or publishing APIs, Node.js is a runtime system that could be a great fit for your organization. There are plenty of tutorials, how-to's and online courses for getting started and Stackoverflow is an excellent resource when you need help but if you want experienced developers to push your project to the next level call us!
