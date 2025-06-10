{
"title" : "Developing erosion resistant software",
"image" : "2017-06-19-erosion-resistant-software.jpg",
"author":"Wiebo Troost",
"date":"19-06-2017",
"tag":"Best Practices, Tutorial",
"category":"Custom Software",
"slug": "erosion-resistant-software",
"meta-description": "Development teams get stuck in the cloud if they don't change their behavior"
}

We often see clients with IT teams and projects that, over time, suffer from software erosion.
The business requirements, or the IT landscape around the software, are changing faster than the software.
The software team is no longer able to deliver new features and functionality into the production environment with enough
velocity, to keep up with the changing business around it. Large systems, that undergo change over a long period of time are
particularly susceptible to erosion. Fear of breaking something, or fear of introducing unintended side effects eventually
cause the velocity to drop. Having worked with many different teams, on many different projects, patterns emerge that
enable teams to maintain their velocity, especially in the cloud.
If this sounds like something you're experiencing within your team, or within your own project, there are some design
principles that you can adopt to enable your team to constantly deliver new features and functionality into production.
There are no silver bullets here, you have to adopt those items that make sense in your environment.
If you are in the lucky position to start a completely new development project, you can start with a clean slate and adopt these methods in the entire stack.

###1. Use Microservices as opposed to a Monolith
Lots has been written about Microservices. They are important in this context because they allow the application to be built as a set of independent modules.
Each module can be simpler than if it were built as a piece of something larger because it can be built and tested as a single unit,
the only dependencies are the services it consumes (either internal or external). Microservices can be scaled
independently and should present a versioned API as its interface to facilitate testing, and to manage the dependencies of other Microservices in the system.
## "Your test suite produces speed and agility when you need to respond to changes in key aspects of your business."
If a Microservice is developed in a way that allows testing of individual methods, you can make the changes required by the business,
validate the results and deploy an update to production with confidence that nothing unexpected will come of it.

###2. Implement the 12 factor app
The [12 factor app](the-twelve-factor-app-methodology) speaks to the Microservice above in two ways.
First, you manage dependencies between system components. Second, you implement development and deployment
environments that are setup for continuous deployment, scalability and automated testing.
There are quite a few elements to consider, including configuration, logging and administration.

[tweet hashtag="microservices 12factorsapp javascript"]Developing erosion resistant software[/tweet]

###3. Use a test suite
Comprehensive testing eliminates large portions of the fear that causes teams to slow down.
Tests are often seen as an additional codebase to maintain, however they produce speed and
agility when you need to respond to changes in key aspects of the business.


###4. Use Javascript and open source
You're building applications that are deployed in the cloud, consumed by browsers and mobile devices. Javascript
is the ubiquitous language that truly executes in all the layers of your application. Javascript developers
are therefore continuously available. As well you gain the benefit of the largest collection of open source modules: Npm.
Your application is a collection of building blocks, each block does not need to be written by your team.
Your team should focus on how to put the blocks together to add business value.

###Conclusion
Software erosion is primarily caused by unmanaged dependencies. The Microservice architecture keeps the
dependencies simple, both in the software, as well as in the deployments. If done well, your team
will be able to respond to changes in the IT landscape, and changes in the business requirements. New
features and better user experiences can be rolled out with confidence.
