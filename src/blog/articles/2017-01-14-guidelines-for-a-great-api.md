{
"title" : "Guidelines for a Great API",
"image" : "2017-01-14-guidelines-for-a-great-api.jpg",
"author":"Mark Voorberg",
"date":"14-01-2017",
"tag":"Best Practices, Business Value",
"category":"Software Development",
"slug": "guidelines-for-a-great-api",
"meta-description": "APIs are how your customers interact with your product or service, whether they realize it or not. Your API should be designed with the customer in mind."
}

It comes from the best intentions, and we've all seen it before. The business has a need, a project is started, developers are hired and given a rough set of specs that outline basic functionality and they get to work crafting HTML & CSS to make the end users swoon. The business users need to see where the team is heading and aren't concerned with what it looks like under the covers. Before you know it there's an API shuffling data back and forth to the shiny new user interface and features are added. The data API becomes a second-class citizen and as long as it's providing the necessary information, it gets little attention from the development team.

#### Think like a Consumer

We've already committed the first, and arguably most critical, design flaw. By jumping straight into UI development and getting data out the door, we've omitted the API design step altogether and we're at risk of having an API that's a collection of seemingly random endpoints that are dedicated to supporting the current User Interface and nothing else.
By putting ourselves in the shoes of an API consumer and spending a little more time up-front, we can design an API that provides access to all of our data regardless how it's being consumed. Implementing a consistent, resource based API we can not only save hours of refactoring when version 2 of the UI comes along (think dedicated mobile app) but we can make our developer's lives easier by having consistency between API calls so that exercising one endpoint is just like any other. There will almost certainly be endpoints for special usecases, and that's ok, just don't let the API design process be forgotten.

#### Resource based Endpoints

There are well established best practices around REST API development and the first one on any list is to use resource based endpoints. When you design your API around resources the endpoints become quite predictable, and the API is decoupled from the user interface.
In the simplest cases your API can a reflection of the underlying data-model, but even so that's being a little too simplistic. There are going to be data elements in your database that should never be exposed to end users, such as hashed passwords, validation tokens, or God forbid, credit-card numbers. It's also limiting your options for future database changes and it may not be the most performant for a busy UI that requires any form of parent-child data. Create DTO's that correspond to each endpoint and validate everything. You have to assume the any piece of data coming from the user could be bad, malicious, or at the very least, invalid.

#### Error Handling

Just like assembling a piece of furniture from IKEA, you're likely to try hitting an API endpoint without reading the instructions first. And again, just like the IKEA furniture, you're likely to do something wrong the first time. At least with a REST API, you'll get immediate feedback with some kind of error response. REST APIs use HTTP to communicate so it's a natural choice to use HTTP error codes, there are lots of them but you don't want to reply with any one of 70+ different HTTP error codes.  You're better off sticking with a short list and using them consistently across your application. Supplement your errors with a payload that tells the user what went wrong and perhaps what they can do to fix it. The payload mime type should match the mime type of a successful request, never send an HTML error page when the client made a request for JSON data.

#### Secure your Endpoints

Naturally, it depends on the application that you're building but there's no excuse to ignore a security. Step number one is to run everything through SSL, and block any requests that don't use it. That way nobody is going to intercept traffic and pick off cookies or tokens getting passed back and forth. Step two, is to use an authentication scheme that allows you to expire a token if you suspect it's been compromised or being abused.
Other things to consider include role based authorization to limit who gets access to the various endpoints, or for a more robust solution, combine that with record level authorization to prevent users from affecting records that don't belong to them. As with everything, it's a balancing act between adding flexibility and limiting the complexity.

#### Keep it Simple

APIs have been used for years by in the biggest companies on the internet so there's no need to re-invent something that's a solved problem. Use the industry standards as designed so that consumers of your API (developers) can get up and running as quickly as possible without having to learn something specific to your service. Keep method parameter names, data structures and naming conventions consistent across the entire API. Follow the best practices, use the simplest thing that works and be consistent.
Include a version numbering scheme and plan for future changes to your API so that users won't be left out in the cold when an endpoint disappears or changes substantially from the one they're using.

#### Documentation

I'm choosing to finish my list on with documentation so that it sticks in your mind. Even if your API is only consumed internally by your own application there's no excuse to ignore the documentation. There are many tools available that will facilitate the task of keeping your documentation current. You probably wouldn't spend much time learning a new programming language without documentation, your API should be the same way. It's not helpful to generate documentation from the code and skip out on the explanations. Spend the time to add detailed descriptions of methods and parameters, with both success and failure responses. Provide detailed examples, tutorials and when users reach out to you, provide excellent support to keep them coming back.
Once your documentation is completed, give it to someone who hasn't seen it before and ask them if it makes sense. Have them try a few of the examples and follow the tutorials, listen to their feedback and make adjustments.

#### Conclusion

After publishing your API and the documentation, maintain a changelog so that everyone who uses it can see how changes from one version to another will affect them. There are plenty of tutorials and how-to's that will get you started. If you need an API for your application or want to talk to experienced API developers drop us a line!
