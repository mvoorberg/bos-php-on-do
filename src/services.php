<?php
	define("BINARYOPS_INCLUDE", 'true');
	define("BINARYOPS_TITLE", 'Services - Custom Software Development');

    define("BINARYOPS_META_DESCRIPTION", "Our iterative approach to application design and software development is focused on" 
        . " solving real business problems to achieve your goals and improve your bottom line.");
    define("BINARYOPS_META_CANONICAL", "/services"); // No trailing slash!

	require_once 'header.inc.php';
	require_once 'title.inc.php';

        const TITLE_TEXT = <<<TITLE
The software development landscape changes fast and you need experienced developers
with proven expertise to deliver software solutions that can take your business to the next level.
TITLE;

        $title = new TitleSection("Our Services", "Partners with Proven Expertise", "cogs", TITLE_TEXT);
        $title->render();

		require_once 'box-action.inc.php';
		$boxAction = new BoxActionSection("Find out how we can help with your project!");
		$boxAction->render();
?>

        <!-- Info Services -->
        <section class="content_info">
            <div class="paddings">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Your Technology Partners</h2>
                            <p>
Get the most for your project budget by working with our software development experts. 
Leverage our experience as we work independantly or integrated with your team to design, 
develop and deploy reliable and sustainable solutions for your business.

When developing custom software solutions, we focus on your needs, 
and work closely with you to ensure clear and transparent workflows. 
                            </p>
						</div>

                    </div>
                </div>
                <!-- End Container-->
            </div>
        </section>
        <!-- End Info Services-->

        <!-- Services -->
        <section class="content_info">
            <div class="paddings">
                <div class="container">
                    <!-- Icon Big -->
                    <i class="fa fa-cogs icon-section top right"></i>

                    <!-- Titles Heading -->
                    <!-- <div class="titles-heading">
                        <div class="line"></div>
                        <div class="h1" style="white-space: nowrap">Great Service
                            <span style="overflow-x:hidden">
                              <i class="fa fa-star"></i>
                                Great Results
                              <i class="fa fa-star"></i>
                            </span>
                        </div>
                    </div> -->
                    <!-- End Titles Heading -->

                    <!-- Row fuid-->
                    <div class="row">

                        <!-- Web and mobile aItem service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service border-right">
                                <a href="<?=bosPageLink("/service/business-software");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>Business Software</h4>
                                            <h5>Obtain strategic advantages over your competition.</h5>
                                        </div>
                                    </div>
                                    <p>
Our solutions are designed to advance your business goals, and help your organization.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service - 01 -->

                        <!-- Item service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service border-right">
                                <a href="<?=bosPageLink("/service/software-design");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>Software Design</h4>
                                            <h5>Maintainable and testable software solutions.</h5>
                                        </div>
                                    </div>
                                    <p>
We can design your systems for agility, scalability, security, continuous and cloud deployments.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service-->
                        <div class="clearfix visible-sm-block"></div>
                        <!-- Item service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service">
                                <a href="<?=bosPageLink("/service/co-development");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="fa fa-handshake-o"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>Co-Development</h4>
                                            <h5>We'll integrate into your existing team.</h5>
                                        </div>
                                    </div>
                                    <p>
We will work side-by side your team, sharing our expert knowledge and experience along the way.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service - 01 -->
                    <div class="clearfix visible-md-block visible-lg-block"></div>
                        <!-- Item service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service border-right">
                                <a href="<?=bosPageLink("/service/web-and-mobile-apps");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>Web and Mobile Apps</h4>
                                            <h5>Successful apps start with a solid design.</h5>
                                        </div>
                                    </div>
                                    <p>
Web and mobile application development requires a thorough understanding of the complete application lifecycle.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service - 01 -->
                    <div class="clearfix visible-sm-block"></div>
                        <!-- Item service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service border-right">
                                <a href="<?=bosPageLink("/service/javascript-frameworks");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="devicons devicons-angular"></i>
                                        </div>
                                        <div class="col-md-10">
                                                <h4>JavaScript Frameworks</h4>
                                                <h5>Boost your productivity leveraging our experience.</h5>
                                        </div>
                                    </div>
                                    <p>
Benefit from our experience and deliver the productivity 
and scalable infrastructure that your business needs.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service-->

                        <!-- Item service - 01 -->
                        <div class="col-sm-6 col-md-4">
                            <div class="item-service">
                                <a href="<?=bosPageLink("/service/nodejs-consulting");?>">
                                    <div class="row head-service">
                                        <div class="col-md-2">
                                            <i class="devicons devicons-nodejs_small"></i>
                                        </div>
                                        <div class="col-md-10">
                                            <h4>Node.js Consulting</h4>
                                            <h5>We deliver simple solutions to complex business problems.</h5>
                                        </div>
                                    </div>
                                    <p>
Delivering production applications with Node since version 0.10 with scalability and performance.
                                    </p>
                                </a>
                            </div>
                        </div>
                        <!-- End Item service - 01 -->

                    </div>
                    <!-- End Row fuid-->
                </div>
                <!-- End Container-->
            </div>
        </section>
        <!-- End Services-->

        <!-- Important Info -->
        <section class="content_info">
            <div class="paddings important-info">
                <div class="container">
                   <div class="row">
                        <div class="col-md-9">
                            <div class="h1"><span>BinaryOps</span> is a professional and detail-oriented consultancy.</div>
                            <p class="lead">
                                "We bring a personal and effective approach to every project we work on, which is why our clients love us and why they keep coming back.”
                            </p>
                        </div>
                        <div class="col-md-3">
                            <i class="fa fa-html5"></i>
                        </div>
                   </div>
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