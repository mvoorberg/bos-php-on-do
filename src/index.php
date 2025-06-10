<?php
	define("BINARYOPS_INCLUDE", 'true');

    define("BINARYOPS_TITLE", 'Custom Software Development');

    define("BINARYOPS_META_DESCRIPTION", "BinaryOps Software is a custom software development company based in Victoria, BC. "
                                    . "We create rich user experiences that get results and bring value to your business.");
   
    define("BINARYOPS_META_CANONICAL", ""); // No slash!

	require_once 'header.inc.php';
?>
    <div class="container-fluid hero-container">
        <div class="container">
            <div class="row">
                <div class="col-md-2 hidden-xs hidden-lg"></div>
                <div class="col-md-10 col-lg-12 hero-text">
                    <div class="prefix">We can help you</div>
                    <h1><span class="highlight">Deliver</span> Great Software</h1>
                    <h2>Success through excellent communication and experience.</h2>
                    <a id="our-services-link" href="<?=bosPageLink("/services")?>" class='btn btn-primary learn-more'>Our Services</a>
                </div>
            </div>
        </div>
        <div class="hero-container" id="imageContainer">
            <img src="/img/slide/slides/2.jpg" alt="Deliver Great Software">
        </div>
    </div>
<?php /*
    <!-- Slide Section-->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE 02-->
                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500">
                    <!-- MAIN IMAGE -->

                    <img id="revSlide2" src="/assets/timer.png" data-lazyload="img/slide/slides/2.jpg" 
                        alt="slidebg1" data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption medium_text lft stl"
                        data-x="65"
                        data-y="70"
                        data-speed="300"
                        data-start="800"
                        data-splitin="lines"
                        data-splitout="none"
                        data-easing="easeOutExpo">We can help you
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption large_bold_white sft stb"
                        data-x="60"
                        data-y="90"
                        data-speed="300"
                        data-start="1000"
                        data-splitin="lines"
                        data-splitout="none"
                        data-easing="easeOutExpo">Deliver Great Software
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption line-slide lfb tp-resizeme"
                        data-x="60"
                        data-y="160"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                    </div>
                    <!-- END LAYER NR. 3 -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption medium_text lfb tp-resizeme"
                        data-x="65"
                        data-y="180"
                        data-speed="500"
                        data-start="1200"
                        data-splitin="lines"
                        data-splitout="none"
                        data-easing="easeOutExpo"
                        style="font-size: 28px;">
                        Success through excellent communication and experience.
                    </div>

                        <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                        data-x="65"
                        data-y="220"
                        data-speed="300"
                        data-start="1400"
                        data-easing="Power3.easeInOut"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                        <a href="<?=bosPageLink("/services")?>" class='btn btn-primary learn-more'>Learn More</a>
                    </div>
                    <!-- END LAYER NR. 4 -->
                </li>
                <!-- END SLIDE 02-->

                <!-- SLIDE 03-->
                <li data-transition="zoomout" data-slotamount="7"  data-masterspeed="1500">
                    <!-- MAIN IMAGE -->
                    <img id="revSlide3" src="/assets/timer.png" data-lazyload="img/slide/slides/3.jpg" 
                        alt="slidebg1"  data-bgposition="left center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption large_text lft tp-resizeme"
                        data-x="center"
                        data-y="40"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                        Growing your ideas into
                    </div>
                    <!-- END LAYER NR. 1 -->

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption large_bold_white lft tp-resizeme"
                        data-x="center"
                        data-y="80"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                        Extraordinary Web Apps
                    </div>
                    <!-- END LAYER NR. 2 -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption line-slide lfb tp-resizeme"
                        data-x="center"
                        data-y="160"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                    </div>
                    <!-- END LAYER NR. 3 -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption medium_text lfb tp-resizeme"
                        data-x="center"
                        data-y="180"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300"
                        style="font-size: 28px;">
                        With the latest in modern web and mobile technologies.
                    </div>
                    <!-- END LAYER NR. 3 -->

                        <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                        data-x="center"
                        data-y="220"
                        data-speed="300"
                        data-start="1400"
                        data-easing="Power3.easeInOut"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                        <a href="<?=bosPageLink("/services")?>" class='btn btn-primary learn-more'>Learn More</a>
                    </div>
                    <!-- END LAYER NR. 4 -->
                </li>
                <!-- END SLIDE 03-->

                <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1500" >
                    <!-- MAIN IMAGE -->
                    <img id="revSlide1" src="/assets/timer.png" data-lazyload="img/slide/slides/1.jpg" 
                        alt="kenburns6"  data-bgposition="center center" data-kenburns="on" data-duration="25000" data-ease="Linear.easeNone" data-bgfit="100" data-bgfitend="120" data-bgpositionend="center top">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption large_text lft tp-resizeme"
                        data-x="52"
                        data-y="40"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300"
                        style="z-index: 5; max-width: 700px; line-height: 60px; white-space: normal; ">
                        Full Stack Development
                    </div>
                    <!-- END LAYER NR. 1 -->

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption large_bold_white lft tp-resizeme"
                        data-x="45"
                        data-y="90"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300"
                        style="z-index: 5; max-width: 760px; line-height: 60px; white-space: normal;">
                        Mobile and Web Apps
                    </div>
                    <!-- END LAYER NR. 2 -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption line-slide lfb tp-resizeme"
                        data-x="64"
                        data-y="160"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                    </div>
                    <!-- END LAYER NR. 3 -->

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption medium_text lfb tp-resizeme"
                        data-x="56"
                        data-y="180"
                        data-speed="500"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-splitin="lines"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300"
                        style="font-size:28px;">
                        Dedicated to helping businesses succeed with modern web apps.
                    </div>
                    <!-- END LAYER NR. 3 -->

                        <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                        data-x="66"
                        data-y="220"
                        data-speed="300"
                        data-start="1400"
                        data-easing="Power3.easeInOut"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.1"
                        data-endelementdelay="0.1"
                        data-endspeed="300">
                        <a href="<?=bosPageLink("/services")?>" class='btn btn-primary learn-more'>Learn More</a>
                    </div>
                    <!-- END LAYER NR. 4 -->
                </li>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!-- End Slide Section-->
*/ ?>
<?php
require_once 'box-action.inc.php';
$boxAction = new BoxActionSection("Get your project started today!");
$boxAction->render();
?>
    <!-- Services Slide -->
    <section class="content_info">
        <div class="paddings borders">
            <!-- Slide Services  -->
            <ul id="slide-services">

                <!-- Item Slide Services  -->
                <li>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 padding-top-mini">
                                    <!-- Title - Subtitle  -->
                                    <h2 class="title-subtitle">
                                            Software Development Services
                                            <span>Deliver custom software with confidence.</span>
                                    </h2>
                                    <!-- End Title - Subtitle  -->
                                    <p class="delay2">
BinaryOps is a Software Development company in Victoria, BC. 
We develop <a href="https://binaryops.ca/service/web-and-mobile-apps">custom web and mobile applications</a>.
We help businesses succeed with <a href="https://binaryops.ca/service/software-design">software design</a>, API development, frameworks, DevOps tools, testing and continuous integration.
We have the experience to help your business provide software solutions with confidence.
Our customers are in both public and private sectors, ranging from large organizations to very small startups.
                                    </p>
                                    <p>
We have a passion for pragmatic and cost effective solutions and apply our 
extensive IT consulting experience to today's tools and technologies. 
We build applications that people want to use, make their jobs easier and add value to their organizations.
                                    </p>
                                    <!-- List  -->
                                    <ul class="list">
                                            <li><i class="fa fa-check"></i> More than 40 years combined experience.</li>
                                            <li><i class="fa fa-check"></i> Current tools and technologies.</li>
                                            <li><i class="fa fa-check"></i> Proven solutions and designs.</li>
                                            <li><i class="fa fa-check"></i> Follow agile development best practices.</li>
                                            <li><i class="fa fa-check"></i> Begin each project with a communication plan.</li>
                                    </ul>
                                    <!-- End List  -->
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <!-- Item Work-->
                                    <div class="col-md-12 hidden-sm hidden-xs">
                                        <div class="item-work">
                                            <div class="hover">
                                                <img src="img/works/brainstorm.jpg" alt="Collaborative brainstorming" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item Work-->
                                    <!-- Item Work-->
                                    <div class="col-md-12">
                                        <div class="item-work">
                                            <div class="hover">
                                                <img src="img/works/achievement.jpg" alt="Achievement"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item Work-->

                                    <!-- Item Work-->
                                    <div class="col-md-12 hidden-sm hidden-xs">
                                        <div class="item-work">
                                            <div class="hover">
                                                <img src="img/works/results.jpg" alt="Visible Improvement"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Item Work-->

                                </div>
                            </div>


                        </div>
                    </div>
                </li>
                <!-- End Item Slide Services  -->
            </ul>
            <!-- End Slide Services  -->
        </div>
    </section>
    <!-- End Services Slide-->

<?php
    require_once "clients.inc.php";
?>

<?php
    require_once 'multi-block.inc.php';
    $blocks = array(
        "header" => "BinaryOps can help set you up for success!",
        "tagline" => "We'll analyze your systems and remove the bottlenecks that are slowing you down.
                    Working collaboratively with your existing team or independently, we're able to 
                    quickly identify and eliminate the things in your tech stack that are holding you back.",
        array(
            "title" => "Experienced Developers",
            "banner" => "Work with the Best",
            "text" => "Solving complex business problems with custom software for over 20 years.
                        We'll provide scalable solutions that set your business up for success well into the future.",
            "icon" => "trophy"
        ),
        array(
            "title" => "Pragmatic Solutions",
            "banner" => "We understand that your software means everything",
            "text" => "We'll plan a series of incremental changes to get you back on track.
                        With our help, you can stay ahead of the competition by being proactive, not reactive.",
            "icon" => "thumbs-up"
        ),
        array(
            "title" => "Full-Stack Development",
            "banner" => "From design to deployment",
            "text" => "We'll work with you to design and build a system that reflects the needs of your business.
                        Deliver scalable technology solutions that provide a superior experience at every touch point.",
            "icon" => "rocket"
        ),
        array(
            "title" => "Modern Technologies",
            "banner" => "We work hard to stay current",
            "text" => "We build software solutions with modern web technologies and the latest 
                        proven methods so that your systems will scale with future business growth.",
            "icon" => "magic"
        ));
    $blockSectionAlt = new MultiBlockSection($blocks);
    $blockSectionAlt->render();
?>
<?php    
	require_once 'latest-blog.inc.php';
	$blogSection = new LatestBlogSection();
	$blogSection->render();

?>
    <!-- Important Info -->
    <section class="content_info">
        <div class="paddings important-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="h1">Conceptualize, Code, Connect & Repeat</h2>
                        <p class="lead">
                            <!-- 
                                Rather than focusing only on the technical requirements, we make sure to understand the context in which applications need to function. 
                                Our solutions are architected to advance your business goals and help your organization grow.
                              -->
                            Before we can start building, it's important to fully understand the business problem at hand. 
                            Let's have that conversation.
                        <br/>
                            Our solutions are architected to advance your business goals and help your organization grow.

                            <!-- 
                                We'll work with you to identify the people who will use a system and understand their needs and motivations.

                                It's important to understand how a solution is going to fit within the rest of your organization. 
                                Maybe it's a standalone system, but chances are good that it needs to integrate with something. Let's talk about that.

                                Turn data into learning... -->
                        </p>
                    </div>
                    <div class="col-md-3">
                        <svg id="Agile_1" fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m421 360.993-60.939.002c-15.544 24.203-36.264 44.689-60.619 60.013h121.558v44.985l91-74.985-91-75z"/>
                                <path d="m197.139 420.951c90.593-.619 163.861-74.202 163.861-164.944 0-86.061-65.914-156.656-150-164.244v-45.756l-90 75 90 74.985v-43.469c50.75 7.357 90 50.729 90 103.484 0 57.891-47.109 105-105 105h-196v60h197.207c-.03-.018-.039-.038-.068-.056z"/>
                                <path d="m122.749 331.007c-19.532-19.08-31.749-45.608-31.749-75 0-34.863 17.267-65.596 43.504-84.703l-47.137-39.276c-34.484 30.242-56.367 74.51-56.367 123.979 0 27.105 6.96 52.44 18.541 75z"/>
                            </g>
                        </svg>
                                            <!-- <i class="fa fa-line-chart"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Important Info -->

<?php
	require_once 'footer.inc.php';
?>

<?php
/*
    <!--Slider Function-->
    <script>
        var revapi;
        jQuery(document).ready(function() {
           revapi = jQuery('.tp-banner').revolution({
                delay:9000,
                startwidth:1170,
                startheight:300,
                lazyType: "smart",
                spinner:"spinner3",
                hideThumbs:10,
                fullWidth:"on",
                navigationType:"none",
                navigationArrows:"solo",
                navigationStyle:"preview4",
                stopAtSlide:1,
                stopAfterLoops:2,
                navigation: {
                    touch: {
                        touchenabled: 'off',
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: 'horizontal',
                        drag_block_vertical: true
                    }
                }
            });
        });
    </script>
    <!--End Slider Function-->
*/
?>

<!-- htmlmin:ignore -->
    </body>
</html>
<!-- htmlmin:ignore -->
