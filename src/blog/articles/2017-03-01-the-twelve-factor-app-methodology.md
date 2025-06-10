{
"title" : "The Twelve-Factor app Methodology",
"image" : "2017-03-01-the-twelve-factor-app-methodology.jpg",
"author":"Mark Voorberg",
"date":"01-03-2017",
"tag":"Best Practices, Agile",
"category":"Software Development",
"slug": "the-twelve-factor-app-methodology",
"meta-description": "The 12-Factor App is a methodology for building modern, scalable, maintainable software-as-a-service apps."
}

Delivering services over the web requires building software that is suitable for deploying to an environment that allows for scaling up without significant changes to the application itself. It should allow businesses to take advantage of high availability, lower cost infrastructure. Ideally, it should minimize the overhead required to train new development staff and should be easily portable through the software development lifecycle requiring little or no change as it moves through development, test, quality assurance and production environments.

## Twelve Factor Applications
A Twelve Factor Application is one that adheres to published standards based on the collective experience of developers working at Heroku who were able to witness the development and deployment of hundred of thousands of apps. With so many applications deployed on their platform, they were able to observe patterns in the application lifecycles over time.

### 1. Codebase - One codebase tracked in revision control, many deploys
Any application that's more than a few lines long should be kept in a version control system. Our preference is to use a hosted Git repository, but there are others to choose from such as Perforce, Subversion, Mercurial etc. A Codebase is a single application with it's own source control repository. Each application or application component should be isolated in it's own repository and should be twelve-factor in itself.
A codebase will be deployed many times, for example in  local development, on a development server, on a test server and likely on multiple production servers. There should be no requirement that all the deploys are using the same version of the application.

### 2. Dependencies - Explicitly declare and isolate dependencies
Application dependencies should be explicitly defined in a centralized location. Relying on implicit dependencies makes it unclear which ones are being used in each of the different environments in which the application runs.
When a new developer joins the team and tries to run the application for the first time, there's a clear set of tools in place to properly load the dependencies and apply them to his local environment. There should be no dependencies on local operating system tools or a specific structures within the runtime environment.

### 3. Config - Store config settings in the environment
An applications configuration should not be checked into source control. That is not to say these values shouldn't be documented or even automated, only that you should be able to open-source your codebase at any given moment without compromising your application's credentials.
This includes everything that's going to be different between deployments, such as credentials for accessing external systems, database connection strings, various hostnames that will be specific to each deploy etc. These values should be added to each deployment as environment variables as they are OS-agnostic, easily changed without hacking at the code and unlikely to get checked into the repository by accident.

### 4. Backing Services - Treat backing services as attached resources
Backing Services are things like a database, an SMTP server, message queue, caching server or similar. They should be treated as if they are external resources referenced only by the path loaded from config values. They're accessed via the network and should be consumed in such a way that one service could be replaced by another by simply updating the configuration and without rewriting pieces of the application itself. Each service is considered a resource and should be treated as independant. This helps enforce the loose coupling that services need to remain flexible as the application evolves or is restructured.

### 5. Build, Release, Run - Strictly separate build and run stages
When deploying a twelve factor application, we need to run it through a build step where we can apply all the things that need to happen before the source code gets shipped to the runtime environment. That may include fetching dependencies, compiling binaries, even applying a compress and minify to JavaScript & CSS resources.
Remember how we talked about automating the configuration? Here's where we apply it, at the Release step. Once out application is built, we can apply the build and the config values to create a Release package. The final step is to run the release by deploying it to the runtime environment and starting the process(es).
The beauty of this separation is that there's no way that modifications can be applied to the code at runtime and there's no way to get changes back to the build step. It forces the developer to use  deployment tools and create a proper build for each release.

### 6. Processes - Execute the app as one or more stateless processes
An application is a collection of one or more processes. It may be a short lived script, or a long-running server. Either way, it should be a stateless affair persisting nothing outside of the stateful backing services. In-memory storage or local disk storage should only be used for single use operations with no expectation that it is available on a subsequent transaction.
Putting session data into an in-memory datastore is a violation of the twelve factor paradigm and should be avoided as there's no guarantee that future requests are handled by the same process, or even by the same server. Short term storage, like session data, should instead be put into Redis or Memcached configured as a backing service, potentially available to many deploys in the same environment.

### 7. Port Binding - Export services via port binding
Services should exported via binding to a specific port. Typical web applications run under a webserver such as IIS, Apache, or in the case of Java apps, inside a an instance of Tomcat. The twelve factor application doesn't include these dependencies and exposes itself as a service on it's own port. When a developer runs locally, the service is available at a port number something like http://localhost:8000/. In a deployed application, a load balancer or some form of routing layer forwards requests from published hostnames to the services that support it. The above example URL shows a web application or webservice, but it could be any service running on a network, such as an SMTP server, streaming music service, or even a Git or Redis server.
The port binding approach allows developers to independently start and stop multiple services without affecting each other or to allow one service to act as a backing service for any other.

### 8. Concurrency - Scale out via the process model
If a running computer program is a collection of processes, then web applications are no different. PHP apps are typically spawned as child processes of Apache, created as new requests come in. In a Java app, new requests are represented as Threads created to service individual requests. Though both cases are difficult to visualize, it is important to understand how it works so that we can respond when the system gets slammed with high service loads. Scaling vertically by adding more memory, or allocating more threads will only get you so far. At some point you need to scale horizontally, that is, to add another server - or better yet, several more. If you've correctly implemented the share-nothing approach, your routing layer can choose which running service should respond to an individual request without any consideration to which process handled previous requests from the same client.

### 9. Disposability - Maximize robustness with fast startup and graceful shutdown
If we're not writing state to local disk or storing information about a client session to disk or in system memory, there's no real harm in stopping and restarting a process. Processes should be able to stop taking new requests, complete anything in-progress, close service connections and exit gracefully. At the same time a new process should start-up almost instantly so that a sudden surge in requests can be handled without an obligatory waiting period, during which, users get frustrated and lose interest. In cases where hardware failures can cause processes to be killed off unexpectedly, care should be taken to re-assign a request to another process. Granted, this is difficult to do and the added complexity should be considered carefully.

### 10. Dev/Prod parity - Keep dev, stage, and prod as similar as possible
There's nothing worse than bugs found for the first time in production, and the likelihood of it happening increases at an alarming rate when the production environment is different than the one where you did your development, or worse yet, the place where QA validated the release! This rule is and easy one to be adamant about, and with VM's, Docker or Vagrant, there's no excuse for running something different than the Production environment everywhere you deploy your application.
By keeping the deploy environments identical, there's less friction deploying new code to production resulting in reduced overhead and faster development turnaround.

### 11. Logs - Treat logs as event streams
Application logs are your primary source of information when something goes wrong. However, it's shouldn't be the responsibility of your application to manage log storage. Logging should be a continuous stream of information that gets directed to an independant storage location. If you choose to stream logs to `stdout` during development it's easy to watch it in real-time, but there's little opportunity to analyze it before it's lost. I'd recommend more permanent log storage for so that logs can be analysed after the fact and cleaned up as necessary.

### 12. Admin processes - Run admin/management tasks as one-off processes
Application management tasks are data manipulation tasks that must be run from within the production environment. They can be used to gather state information about the application itself, or database migrations, structure changes etc. Developing these one-off tasks should go through the usual dev/test/qa/prod lifecycle so that they can be validated and run using the same codebase as anything else within your app. This allows use of the same dependencies and the same environment configs as anything else that your application does. If your environment provides a shell access to execute these management tasks, developers can trigger them locally in the terminal window or via SSH in production.

## Implementing the 12 Factor Methodology
Many of the steps within the methodology are wide-open for interpretation and that's probably for the best. It provides the flexibility to implement features as best suited in the programming language of choice and as needed for a given situation while making the developers aware of potential pitfalls they may run into. The 12-Factor methodology makes an excellent blueprint for deploying stable and reliable applications. Implementing all of the steps can be overwhelming but with the right team in place and the desire to build quality software, it establishes a vocabulary for discussing the challenges and presents possible solutions for each.
