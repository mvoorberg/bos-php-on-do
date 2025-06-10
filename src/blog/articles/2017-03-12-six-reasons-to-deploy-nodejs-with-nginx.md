{
"title" : "6 Reasons to deploy Node.js with Nginx",
"image" : "2017-03-12-six-reasons-to-deploy-nodejs-with-nginx.jpg",
"author":"Mark Voorberg",
"date":"12-03-2017",
"tag":"Best Practices",
"category":"Software Development",
"slug": "six-reasons-to-deploy-nodejs-with-nginx",
"meta-description": "There are several very good reasons to put Nginx in front of your Node.js application. Nginx works as a front end server, terminating SSL and proxying requests to one or more Node.js instances."
}

Node.js is an amazing platform for creating dynamic web applications.
It handles high volumes easily and the npm ecosystem provides hundreds of modules that
include some very good pre-built features but, like anything, Node.js has it's limitations.
If done correctly, a single running instance can scale to 10,000 or more concurrent connections.
Long before you get to that point, there's a few things that can help by lowering your risk and
improving the performance of your application. Once of the first things to look into is running it behind Nginx.
In this article we're going to touch on six key things that Nginx can do for your Node.js application.

#### Reason #1, Reverse Proxy
When developing an application with Node.js, or running Node.js on your development machine, it's very
typical to run it on a port number other than the usual HTTP or HTTPS ports. This is done because running on port
numbers below 1024 requires running Node as a privileged user, such as `root`, which is never recommended.
When a Node app starts, printing something like `Listening to port 3000` to the console gives you a nice way to know
that it's started successfully and you can use the app by pointing your browser at `http://localhost:3000/` but you
wouldn't want to run like that in production because it looks hack-y and your users will be confused or suspicious.
Putting Nginx in front of your Node app allows you to map requests on port 80 though to the port number where you Node app is running.
This means your Node app doesn't have to worry about privileges/setuid for the Node.js process and may help to mitigate security flaws and DoS attacks against Node.

#### Reason #2, SSL Termination
While it's possible to terminate SSL inside your Node.js application, it may not be a good idea.
Your Node app has a job and that's processing dynamic client requests and sending responses.
It should not be concerned with setting up the SSL handshake, a CPU intensive process, or handling the decryption of requests and subsequent encryption of responses.
By offloading the SSL handling your Node application server load will decrease and it will be able to handle higher request volumes.
If your app has been setup with multiple Node servers for load balancing, a decrypted header or URI can be used to facilitate more intelligent routing.
When your application is at a point where it's been scaled out horizontally, that is running on multiple servers, and it comes time to update an expiring certificate, updating it in one place is always preferable.

#### Reason #3, Load Balancing
We touched a little on this in the previous reason, but using Nginx as a load balancer can be a very effective way to scale your application.
If the application is written in such a way that it is completely stateless, ([#6 in the 12 Factor App Methodology](/blog/the-twelve-factor-app-methodology))
you're able to distribute requests to a handful of servers using one of several ways including round-robin or least-connections.
If your app depends on stateful environment, Nginx can handle that too and route requests from a given client back to the same server each time.

[tweet hashtag="nodejs nginx"]Six reasons to front your Node.js app with Nginx[/tweet]

#### Reason #4, Static File Caching
Serving static files like images, css, js, and html from node may be less efficient compared to using a proper static file web server.
On top of files serving more efficiently, you won't have to worry about handling eTags or cache control headers the way you
would if you were serving things out of Node. There are static file modules to handle this for you, but if you can offload those requests from Node, even better.
If you choose to serve static assets from Node, and doing so makes for a simpler development environment running everything from a single process,
you can still use Nginx in production to add Cache-Control headers to their responses, saving the overhead of re-sending them each time the client asks for cached resources.

#### Reason #5, Error Pages
If you Node app crashes or a user requests a URI that results in some form of 400 error, that too can be handled by Nginx.
With a little bit of setup, we can proxy those requests to an alternate webserver, or serve pages from the local file system.
That way, you have something to respond with while the service is restarted, so your users aren't left hanging with a timed out request.

#### Reason #6, Proxy WebSocket Connections
While HTTP is designed for pulling information, such as a client's page request, the websocket protocol allows for a more
robust interaction allowing a push/pull between the client and the server. When using socket.io in your Node application we can
configure Nginx to handle reverse proxying of web socket traffic as well by adding a [few simple headers](https://www.nginx.com/blog/nginx-nodejs-websockets-socketio/).

### Conclusion
We've talked in this post about a few very important performance improvements that you can make in your Node.js
application and it's not limited to high volume sites. Hiding the Node application behind an Nginx proxy lets you
run several smaller Node apps on a single server because they won't have conflicting port numbers.
Whether you're running a high-volume web service or a couple simple websites, Nginx is easy to
configure and is a great way to expose your Node applications to the Internet.
While it's true that you could probably address many of these points by writing code in your application or with some other tool,
Nginx powers some of the world's busiest sites and applications and is very easy to install and configure.
If your Node.js application could benefit from some of the points listed above,
or you would like more information about the points made here please give us a shout.
We would love to hear what you're doing with Node.js in your organization.
