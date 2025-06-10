<?php
    define("BINARYOPS_INCLUDE", 'true');
    
    define("BINARYOPS_TITLE", 'About - Custom Software Development');

    define("BINARYOPS_META_DESCRIPTION", "BinaryOps Software founders have been delivering quality software since 1998." 
                                        . " We have many years of experience driving innovation and growth.");

    define("BINARYOPS_META_CANONICAL", "/about-us");

	require_once 'header.inc.php';
	require_once 'title.inc.php';

	const TITLE_TEXT = <<<TITLE
We are experienced developers with strong backgrounds in software architecture and systems integration.
Our experience stems from thousands of hours and many, many projects.
Each one of these past projects brings with it knowledge of what works and what doesn't.
We know what scales and what doesn't.  We know where the pitfalls might be. 
Applying this insight to current development technologies and agile best practices gives us an edge when it comes to building your project.
TITLE;

        $title = new TitleSection("About", "Experienced Professionals", "code", TITLE_TEXT);
        $title->render();
?>

        <!-- Info About Us -->
        <section class="content_info">
            <div class="paddings">
                <div class="container">
                    <div class="row">

                        <div class="col-md-7">
                             <h2>Who is BinaryOps?</h2>
                             <p>
BinaryOps founders, Mark Voorberg and Wiebo Troost have been working together since 1998 to deliver custom software solutions in
healthcare, manufacturing, telecom and energy. Our processes are the result of many years delivering custom software to our clients.
Founded in 2014 by Mark Voorberg and Wiebo Troost, BinaryOps Software Inc. provides software development 
and IT solutions in Victoria BC, across Canada and the United States.
								 </p>
						</div>

                        <div class="hidden-sm col-md-5">
                            <!-- Simple-slide -->
                            <div id="carousel-example-generic" class="carousel slide bs-docs-carousel-example">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="/img/works/nodejs.jpg" alt="Node.js">
                                    </div>
                                    <div class="item">
                                        <img src="/img/works/angularjs.jpg" alt="Angular">
                                    </div>
									<div class="item">
                                        <img src="/img/works/mongodb.jpg" alt="MongoDB">
                                    </div>
                                    <div class="item">
                                        <img src="/img/works/express.jpg" alt="Express">
                                    </div>
                                </div>
                                <a class="left carousel-control" aria-label="Previous" href="#carousel-example-generic" data-slide="prev">
                                    <span class="noshow-icon">Previous</span>
                                    <span class="icon-prev"></span>
                                </a>
                                <a class="right carousel-control" aria-label="Next" href="#carousel-example-generic" data-slide="next">
                                    <span class="noshow-icon">Next</span>
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                            <!-- End Simple-slide -->
                        </div>

                    </div>
                </div>
                <!-- End Container-->
            </div>
        </section>
        <!-- End Info About Us-->

        <!-- Slides Team -->
        <section class="content_info">
            <div class="padding-top slide-team section-gray borders">
                <!-- Slides Team  -->
                <ul id="slide-team">
                    <!-- Item Slide Team  -->
                    <li>
                        <div class="container">
                            <div class="row">

                                <!-- Image Team  -->
                                <div class="col-md-3 col-md-offset-2">
                                   <!-- <a href="img/team-members/1.png" class="fancybox"> -->
                                        <img src="img/team-members/1.png" alt="Wiebo Troost" title="Co-Founder">
                                    <!-- </a> -->
                                </div>
                                <!-- End Image Team  -->

                                <!-- Info  Team  -->
                                <div class="col-md-5 padding-top-mini">
                                  <h3 class="title-subtitle">
                                        Wiebo Troost
                                        <span>Full-stack developer</span>
                                   </h3>
                                   <p>
Wiebo is an exceptionally talented software developer with over twenty years experience with IT consulting.
He loves to work on challenging projects and is quick to understand new business processes and
provide technical solutions that work.
                                   </p>

                                    <a id="send-email-wiebo" href="mailto:wiebo@binaryops.ca" class="btn btn-primary">SEND ME AN EMAIL</a>

                                    <!-- Social-->
                                    <ul class="social">
                                        <li data-toggle="tooltip" title data-original-title="Twitter">
                                            <a href="https://twitter.com/troostw" target="_blank">
                                            <span class="noshow-icon">Twitter</span>
                                            <i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li data-toggle="tooltip" title data-original-title="Github">
                                            <a href="https://github.com/binaryops-wiebo" target="_blank">
                                            <span class="noshow-icon">Twitter</span>
                                            <i class="fa fa-github"></i></a>
                                        </li>
                                        <li data-toggle="tooltip" title data-original-title="LinkedIn">
                                            <a href="https://www.linkedin.com/in/wiebo-troost-7483343/" target="_blank">
                                            <span class="noshow-icon">LinkedIn</span>
                                            <i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End Social-->

                               </div>
                               <!-- End Info  Team  -->

                                <!-- Skills Team  -->
                                <!-- <div class="col-md-4 padding-top-mini">
                                     <h3>Skills</h3>
                                    <div class="meter color nostripes">
                                        <span style="width: 100%"><span>JAVASCRIPT</span><span class="text-right">100%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 75%"><span>ANGULAR</span><span class="text-right">85%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 95%"><span>NODE.JS</span><span class="text-right">95%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 100%"><span>MONGODB</span><span class="text-right">100%</span></span>
                                    </div>
                               </div> -->
                               <!-- End Skills Team  -->

                           </div>
                       </div>
                    </li>
                    <!-- End Item Slide Team  -->

                     <!-- Item Slide Team  -->
                    <li>
                        <div class="container">
                            <div class="row">

                                <!-- Image Team  -->
                                <div class="col-md-3 col-md-offset-2">
                                   <!-- <a href="img/team-members/2.png" class="fancybox"> -->
                                        <img src="img/team-members/2.png" alt="Mark Voorberg" title="Co-Founder">
                                    <!-- </a> -->
                                </div>
                                <!-- End Image Team  -->

                                <!-- Info  Team  -->
                                <div class="col-md-5 padding-top-mini">
                                  <h3 class="title-subtitle">
                                        Mark Voorberg
                                        <span>Full-stack developer.</span>
                                   </h3>
                                   <p>
Mark has been doing database design and building custom software for over twenty years.
With a background in electronics, he quickly moved into software development and
has been building creative software solutions ever since, on many projects of all sizes.
                                   </p>
                                    <a id="send-email-mark" href="mailto:mark@binaryops.ca" class="btn btn-primary">SEND ME AN EMAIL</a>

                                    <!-- Social-->
                                    <ul class="social">
                                        <li data-toggle="tooltip" title data-original-title="Twitter">
                                            <a href="https://twitter.com/mvoorberg" target="_blank">
                                            <span class="noshow-icon">Twitter</span>
                                            <i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li data-toggle="tooltip" title data-original-title="Github">
                                            <a href="https://github.com/mvoorberg" target="_blank">
                                            <span class="noshow-icon">Github</span>
                                            <i class="fa fa-github"></i></a>
                                        </li>
                                        <li data-toggle="tooltip" title data-original-title="LinkedIn">
                                            <a href="https://www.linkedin.com/in/mark-voorberg-24462819/" target="_blank">
                                            <span class="noshow-icon">LinkedIn</span>
                                            <i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End Social-->

                               </div>
                               <!-- End Info  Team  -->

                                <!-- Skills Team  -->
                                <!-- <div class="col-md-4 padding-top-mini">
                                     <h3>Skills</h3>
                                    <div class="meter color nostripes">
                                        <span style="width: 100%"><span>JAVASCRIPT</span><span class="text-right">100%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 75%"><span>ANGULAR</span><span class="text-right">80%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 95%"><span>NODE.JS</span><span class="text-right">95%</span></span>
                                    </div>
                                    <div class="meter color nostripes">
                                        <span style="width: 80%"><span>MONGODB</span><span class="text-right">80%</span></span>
                                    </div>
                               </div> -->
                               <!-- End Skills Team  -->

                           </div>
                       </div>
                    </li>
                    <!-- End Item Slide Team  -->
                </ul>
                <!-- End Slides Team  -->
            </div>
        </section>
        <!-- End Team Slide-->

        <!-- Clients -->
        <section class="content_info">
            <div class="paddings clients">
                <div class="container">
                    <div class="row">
                        <!-- title-downloads -->
                        <div class="title-downloads">
                            BinaryOps has written
                            <span class="responsive-numbers">
                                <span>3</span>
                                <span>8</span>
                                <span>9</span>
                                ,
                                <span>5</span>
                                <span>1</span>
                                <span>8</span>
                            </span>
                            lines of JavaScript.
                        </div>
                        <!-- End title-downloads -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients -->

<?php
    require_once "consulting.inc.php";
    ?>

        <!-- Important Info -->
        <section class="content_info">
            <div class="padding-top important-info">
                <div class="container text-center">
                    <!--
                    <img src="img/team-members/members.png" alt="">
                    <div class="title">
                        <h1>Great Team.</h1>
                    </div>
                    -->
                </div>
            </div>
        </section>
        <!-- End Important Info -->

<?php
	require_once 'footer.inc.php';
?>
<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->
