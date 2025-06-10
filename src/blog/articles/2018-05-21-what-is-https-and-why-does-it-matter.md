{
"title" : "What is HTTPS and why does it matter?",
"image" : "2018-05-21-what-is-https-and-why-does-it-matter.jpg",
"author" : "Mark Voorberg",
"date" : "21-05-2018",
"tag" : "Best Practices, Business Value",
"category" : "Software Development",
"slug" : "what-is-https-and-why-does-it-matter",
"meta-description": "HTTPS provides critical security and data integrity for your websites and the people that trust your websites with personal information"
}

####What is HTTP?
HTTP stands for Hypertext Transfer Protocol and it's the underlying communication protocol for the World Wide Web. It's used every time your browser makes a new page request. Somewhere at the end of that request, a server interprets the request and it's parameters and sends a response. Your browser receives the response and displays a web page. HTTP is unique in that it's a stateless protocol, meaning that each request is independent of the requests that came before it. 

The "S" in HTTPS stands for 'secure'. HTTP (without the S) is not secure. For example, if you’ve made a request and the server responded using a non-secure connection, the messages going back and forth are unencrypted and may be viewed in clear text along the way. With an HTTPS connection to the server, any data is encrypted by your browser and can only be decrypted by the server itself. It's virtually impossible for a bad actor to decrypt your HTTPS request or the corresponding response.

A website that uses HTTPS has the additional benefit of validating that the domain you are communicating with is who you think it is. This is true because the certificates used to implement HTTPS are matched to the domain name for which they are issued and are only provided to the verified owner of the domain. If someone were to redirect HTTPS traffic from one site to their own server, the certificate names wouldn't match and your browser should raise a 'red flag'.

####So why is HTTPS important?
We've already talked about the fact that HTTP requests are transmitted in plain text, and as such, easily tampered with but what does this mean in the real world?  It means that any website still using plain-old HTTP is exposing it's users to eavesdropping and possibly content injection. Content injection happens when someone modifies the content of your HTTP messages. HTTPS prevents these types of attacks and is considered a baseline for security on the Internet.

####Is there a Performance price with HTTPS?
It's true that there's some server CPU overhead decrypting everything sent from your browser and ecrypting every response, but it's only a tiny fraction of the processing involved handling even the simplest request. The real bottleneck in any website or web application will be in fetching content from a database or rendering frgaments of HTML to build a complete page. If your website is hosted on a webserver such as Apache, Nginx or IIS, you can gain back the overhead imposed by HTTPS by serving your website with HTTP/2. [HTTP/2](https://en.wikipedia.org/wiki/HTTP/2) is an update to HTTP/1.1 and promises many benefits all of which result in a speed boost for end users. Major browsers (Firefox & Chrome) only support HTTP/2 when served over HTTPS.

####Can I use HTTPS on part of my website?
My first reaction is to ask, "Why?". As an avid online-shopper, I want the warm fuzzy feeling that I get from seeing that the sites I use have a valid SSL certificate and the entirety of my shopping experience is secured. If your eCommerce website isn't using SSL, I have to re-evaluate my shopping choice and will consider buying elsewhere. 

Google's Chrome browser now displays an [warning message](https://security.googleblog.com/2018/02/a-secure-web-is-here-to-stay.html) on every page served over HTTP. This helps to alert users that any information they're providing may be visible to other users on the network. Warning messages like this make a website look unprofessional and worse, suspicious. 
It's also common to split up content among different services when building a complete web page. For example, you could load images, videos, and PDFs from a storage service like Amazon S3, load fonts from Google, and send HTML for webpages from your servers. If your content and fonts are being sent over HTTPS and images sent using HTTP, you have what's referred to as mixed content. Often, browsers will warn a user if this is happening because it leaves users vulnerable to attacks. Make sure that all the content included on your website is being sent over HTTPS.

####Don't forget HTTPS Redirects
Once you have HTTPS set up on your entire site, users who bookmarked the old site may still try to access your website over HTTP. This can be addressed by permanently redirecting any request using HTTP to the equivalent HTTPS resource. Without adding the redirect, you may be leaving some users behind and leave them exposed to risk unnecessarily.

####Why Security Matters
In a digital world where we conduct much of our business online, security is more important than ever. HTTPS is one tool you can use to protect yourself and your website users from intruders listening in on their communications.

####HTTPS is the future
HTTPS is a key element of the permissions workflows necessary for many interesting new web platform features, such as using a webcam or microphone, offline applications using service workers, or progressive web apps. Many of the older browser APIs, such as geolocation, are being updated to require permission using those same workflows.

We highly recommend using HTTPS for all your website content as it will affect your website SEO as well as how potential customers feel about your business. We, at BinaryOps, have the skills and experience to create a secure platform for your web presence. [Call or send us an email](https://binaryops.ca/contact), let's talk about how we can help you provide a better experience to the visitors of your website.