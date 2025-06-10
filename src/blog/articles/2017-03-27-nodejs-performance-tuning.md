{
"title" : "Node.js Performance Tuning",
"image" : "2017-03-27-nodejs-performance-tuning.jpg",
"author":"Mark Voorberg",
"date":"27-03-2017",
"tag":"Best Practices, Tutorial",
"category":"Software Development",
"slug": "nodejs-performance-tuning",
"meta-description": "Performance tuning applications in Node.js can difficult, but if you know where to look there are several things you can optimize before they become a problem."
}

Node.js is a platform built on Chrome's JavaScript runtime for easily building fast and scalable network applications.
It provides an event-driven architecture and a non-blocking I/O for application throughput and scalability.
That's all well and good, but where do you go when your Node application performance isn't quite as fast as it needs to be to keep your users happy?
Node.js has changed quite a bit over the last few years so it's a good idea to remain up-to-date on the latest optimizations and best practices.
In this article, we’ll take a look at 6 Node.js performance tips that you can implement in your code to get the most out of your applications.

###1. Run things in Parallel
It's not uncommon to have routes in your application that aren't directly dependent on each other. For example, you may have an endpoint that aggregates data from several sources and requires multiple function calls to external APIs to fetch data.
There's little sense waiting for our first request to complete before initiating a second request. As long as we know ahead of time what the requests will be, we could start them at the same time and, after the slowest one completes, we could do our aggregation and reply to the user.
The ability to run several tasks in parallel is a feature of the Async library. This is a Node module that helps you better manage your asynchronous JavaScript by providing convenient methods to manage asynchronous function calls.

Here is a very basic snippet that shows how different functions may run in parallel using async.js:
```
// Include the async package
var async = require("async");

async.parallel([
    function(callback) { /* Task #1 goes here */ },
    function(callback) { /* Task #2 goes here */ },
    function(callback) { /* Task #3 goes here */ }
], function(err, results) {
    /* This callback runs after all of the above functions are complete */
});
```
<br/>

###2. Avoid Synchronous function calls
Node.js is by design single-threaded, which means that synchronous components cause blocking across the entire application. This may not be a big deal when you're testing your application in development as a single user, but when you have hundreds, even thousands of concurrent users, it's easily possible that a single call to a synchronous method (E.g. reading large files from disk) causes everyone to wait bringing your application to it's knees. It can be a little more difficult than reviewing the code you've written, as the synchronous function call may be buried in a third-party module you installed from NPM!
The best way around this is to always use asynchronous APIs in your code, especially in sections that are used frequently by many users. When choosing third party modules to ensure that they are well maintained and up-to-date, or take it upon yourself to read through the code and make sure your external libraries doesn’t revert to synchronous calls.

###3. Use gzip compression
Gzip is a form of data compression, very much like that used to create a *.zip file. Using a software compression algorithm, your webserver is able to compress a data stream before sending it to the browser where it is uncompressed, and ready for use by your browser. While it's true that Gzip works with both text and binary data, the compression is most noticeable with text because image file formats have compression built-in.
When a gzip compatible browser requests a resource, the server is able to compress the response before sending it to the browser, which can reduce the time required to download the file, thereby reducing lag and latency.
Make sure you use gzip both when responding to clients and when your Node application makes outbound requests to remote servers. Despite the CPU overhead of compressing and decompressing on both sides, it makes a significant difference in the overall performance of your application.

###4. Avoid Middleware bloat
With so much competition for mobile users to choose from application performance is critical, it’s especially important to keep your Node.js code base as focused as possible to reduce latencies on each request and not introduce lag that takes away from a smooth user experience.
Be careful to pay close attention to the middleware you've implemented within your application.
As each request must process the chain of middleware, it's a known and pre-determined overhead that gets applied to every request.
Make sure that any middleware is efficient and only applied as necessary.

###5. Don’t use Node.js to serve static assets
If you're serving static content from your Nodejs application, consider handling them from a proxy instead and use caching strategies to further reduce requests for files that don't change very often.
Using [Nginx to serve your static content](/blog/six-reasons-to-deploy-nodejs-with-nginx) will significantly reduce the load on your Node.js instance and thereby increase your app's performance.
If there's a possibility that you need to scale you application horizontally across multiple servers, make sure that any data files your application needs to access are stored in a way that allows you to access them from each instance without requiring a copy on the local disk.

###6. Run your app in Clustering mode
On a multi-core system a great way to reduce the single threaded event loop bottleneck is to use clustering. Clustering allows you to run multiple instances of the app as separate application processes. By running one instance per CPU core, you can use the full power of your server instead of limiting yourself to a single application instance. Keep in mind that separate instances will use separate memory so you won't be able to store application state in memory, but if you're [following the 12-Factor methodology](/blog/the-twelve-factor-app-methodology), you already know that.

###7. Combine & Minify (Bonus tip!)
This next point isn't a specific to Node.js but, to web applications in general. Ask yourself if each
client-side resource is really necessary. Do you really need module "Xyz" and is it worth the overhead? Could the same functionality be provided some other way? If it's really necessary, is there a way to limit where you're sending it to the client, perhaps it's only necessary on certain less often used pages.
After removing libraries that you've decided to live without, combine your CSS files into one or two bundles and minify them with [a build tool such as Grunt](/blog/grunt-tips) or Gulp. Same goes for your client-side JavaScript. Combine and minify them into a couple files.
By reducing the number of individual files your users need to make fewer HTTP requests for resources before they can run your application.

###8. Employ client side rendering (Bonus tip!)
Thanks to powerful client-side frameworks and libraries such as Angular and KnockoutJS, it has become much easier for developers to create dynamic applications.
These tools allow developers to make authenticated data requests and manipulate what a user sees on their screen without reloading an entire page. In the case of Angular, a complete application is delivered up front so your Node server becomes an [API for sending JSON data](/blog/guidelines-for-a-great-api) back and forth.
If Node.js doesn't have to re-send user interface elements with each request, there's much less network traffic and user's feel more engaged.

###9. Database optimization (Bonus tip!)
Does your program need to read from a database? If so, we should make sure that it's both nearby and performant. Queries should be optimized, indexes should be created as necessary and data should be stored in such a fashion that we can present it to the user with as little post-processing as possible. Depending which database you use, there are tools available to see which queries are taking the longest and with a bit of experience, you should be able to optimize the database or re-write the queries to get your application moving. In the worst cases, it's possible your database needs to be re-arranged a bit to align the physical model with how it's being consumed.

###Conclusion
Optimizing Node.js applications isn't witchcraft or anything but it can be a little trickier than working with synchronous code as things aren't always running in the same order they appear in code. By following a few simple steps such as what we've listed above, your application should be handling thousands of requests and able to grow as your users demand.
