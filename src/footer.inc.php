<?php 
    if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } 
    if(!defined("BINARYOPS_SHOW_FOOTER_TOP")) { define("BINARYOPS_SHOW_FOOTER_TOP", true); }
    if(!defined("BINARYOPS_SHOW_FOOTER_MIDDLE")) { define("BINARYOPS_SHOW_FOOTER_MIDDLE", true); }
    if(!defined("BINARYOPS_SHOW_FOOTER_BOTTOM")) { define("BINARYOPS_SHOW_FOOTER_BOTTOM", true); }

    if (false && BINARYOPS_SHOW_FOOTER_TOP) { 
?>
        <!-- footer top-->
        <footer class="footer-top">
            <div class="container">
               <div class="row">
                   <div class="hidden-xs col-sm-4">
                   </div>
                   <div class="col-sm-4">
                       <h3><i class="fa fa-envelope"></i> <a href="mailto:info@binaryops.ca" >info@binaryops.ca</a></h3>
                   </div>
                   <div class="hidden-xs col-sm-4">
                       <!-- <h3><i class="fa fa-thumbs-up"></i> Great Support</h3> -->
                   </div>
               </div>
            </div>
        </footer>
        <!-- End footer Top-->
<?php 
    } // End BINARYOPS_SHOW_FOOTER_TOP
    if (false && BINARYOPS_SHOW_FOOTER_MIDDLE) { 
?>
        <!-- footer Center-->
        <footer class="footer-center">
            <div class="container">
                <!-- Info Bottom - Footer Center-->
                <div class="row">
                    <!-- Twitter Feed-->
                    <div class="col-md-6 item-peak">
                        <span class="arrow_footer"></span>
                        <div class="border-right">
                            <h4>Twitter</h4>
                            <div class="twitter">

<?php
// Don't show a Twitter Widget on the home page or the Advert landing pages!
if ($_SERVER['REQUEST_URI'] === '/' || strpos(strtolower($_SERVER['REQUEST_URI']), "/service/") !== false) {
?>
	<h4 class="timeline-Header-title u-inlineBlock" data-scribe="element:title"><i class="fa fa-twitter"></i> <span class="timeline-Header-byline" data-scribe="element:byline">
	<a class="customisable-highlight" href="https://twitter.com/BinaryOpsCa" title="‎@BinaryOpsCa on Twitter">‎@BinaryOpsCa</a></span></h4>
<?php
} else {
?>
    <a class="twitter-timeline" data-width="300" data-height="250" data-theme="dark" data-link-color="#d21c2d" href="https://twitter.com/BinaryOpsCa?ref_src=twsrc%5Etfw">Tweets by BinaryOpsCa</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php
}
?>

							</div>
                        </div>
                    </div>
                    <!-- End Twitter Feed-->

                    <!-- Recent Links-->
                    <div class="col-md-6 item-peak">
                        <span class="arrow_footer"></span>
                        <div class="border-right">
							<h4>Links</h4>
							<ul class="links">
								<li><i class="fa fa-check"></i> <a href="/">Home</a></li>
								<li><i class="fa fa-check"></i> <a href="<?=bosPageLink("/services");?>">Services</a></li>
								<li><i class="fa fa-check"></i> <a href="<?=bosPageLink("/about-us");?>">About</a></li>
								<li><i class="fa fa-check"></i> <a href="/blog/">Blog</a></li>
								<li><i class="fa fa-check"></i> <a href="<?=bosPageLink("/contact");?>">Contact</a></li>
							</ul>
						</div>
                    </div>
                    <!-- End Recent Links-->

                    <!-- Newsletter-->
                    <!-- <div class="col-md-4 item-peak">
                        <span class="arrow_footer"></span>
						<h4>Let's keep in touch!</h4>
						<p>Subscribe for updates from BinaryOps Software.</p>

                        <form action="//binaryops.us1.list-manage.com/subscribe/post?u=6dd1cbb910423ee10b9a6772f&amp;id=3c229683dc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</span>
								<input class="form-control" placeholder="Email Address" name="EMAIL" id="mce-EMAIL" type="email" required="required">
								<span class="input-group-btn">
									<button id="subscribe-btn" class="btn btn-primary" type="submit" name="subscribe" >Go!</button>
								</span>
							</div>
						</form>
                    </div> -->
                    <!-- End Newsletter-->
                </div>
                <!-- Info Bottom - Footer Center-->
            </div>
        </footer>
        <!-- End footer Center-->
<?php 
    } // End BINARYOPS_SHOW_FOOTER_MIDDLE
    if (BINARYOPS_SHOW_FOOTER_BOTTOM) { 
?>
        <!-- footer bottom-->
        <footer class="footer-bottom">
            <div class="container">
               <div class="row">
                    <!-- Nav-->
                    <div class="col-md-6">
                        <div class="logo-footer">
                            <a href="/" title="Return Home"><img src="/css/skins/red/logo_white.png" alt="BinaryOps Software Inc." class="logo_img"></a>
                        </div>
                       <div class="row copyright">
                           <div class="col-md-12">
                               <p><span class="nowrap">&copy; 2014 - <?=date("Y");?> </span>
                                    <span class="nowrap">BinaryOps Software Inc.</span>
                                    <span class="nowrap">All Rights Reserved.<span></p>
                           </div>
                       </div>
                    </div>
                    <!-- End Nav-->

                    <!-- Social-->
                    <div class="col-md-6">
                        <ul class="menu-footer">
							<li><a href="/">HOME</a></li>
                            <li><a href="<?=bosPageLink("/services");?>">SERVICES</a></li>
                            <li><a href="<?=bosPageLink("/about-us");?>">ABOUT</a></li>
                            <li><a href="/blog/">BLOG</a></li>
                            <li><a href="<?=bosPageLink("/contact");?>">CONTACT</a></li>
                        </ul>

                        <ul class="menu-footer">
                            <li><a style="font-size: 10px;" href="<?=bosPageLink("/privacy");?>">Privacy policy</a></li>

                            <!-- TODO: tos anyone? -->
                            <li><a style="font-size: 10px;" href="<?=bosPageLink("/privacy");?>">Terms of service</a></li>
                        </ul>
                    </div>
                    <!-- End Social-->
               </div>
            </div>
        </footer>
        <!-- End footer bottom-->
<?php 
    } // End BINARYOPS_SHOW_FOOTER_BOTTOM
?>

<!-- htmlmin:ignore -->
    </div>
    <!-- End layout -->
<!-- htmlmin:ignore -->
<?php
	/***********************************************************************
	*** THESE ARE THE INCLUDES FOR THE LIVE WEBSITE
	***********************************************************************/
	// ~ENVIRONMENT~ is injected during the Grunt build process. See the Gruntfile.
	if ("~ENVIRONMENT~" == "LIVE_SITE") {

		echo "<script src=\"/js/built.min.js\"></script>";
		// if ($_SERVER['PHP_SELF'] == "/index.php"){
		// 	echo "<script src=\"/js/builthome.min.js\"></script>";
		// }
// ? >
//         <!-- LinkedIn Insight -->
// 		<script>
// 				_linkedin_data_partner_id = "60244";
// 				</script><script type="text/javascript">
// 				(function(){var s = document.getElementsByTagName("script")[0];
// 				var b = document.createElement("script");
// 				b.type = "text/javascript";b.async = true;
// 				b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
// 				s.parentNode.insertBefore(b, s);})();
// 		</script>
// 		<noscript>
// 			<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=60244&fmt=gif" />
// 		</noscript>
// < ? php
	} else {
?>
	<!-- *******************************************************************
	*** THESE ARE THE INCLUDES FOR THE DEVELOPMENT WEBSITE
	******************************************************************** -->

    <!-- ======================= JQuery libs =========================== -->
    <!-- jQuery local-->
    <script src="/js/jquery.js"></script>
    <!--Nav-->
    <script src="/js/nav/tinynav.js"></script>
    <script src="/js/nav/superfish.js"></script>
    <script src="/js/nav/hoverIntent.js"></script>
    <script src="/js/nav/jquery.sticky.js"></script>
    <!--Totop-->
    <script src="/js/totop/jquery.ui.totop.js" ></script>
    <!--Slide Revolution-->
    <!-- <script src="/js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>
    <script type='text/javascript' src='/js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script> -->
    <!-- carousel.js-->
    <script src="/js/carousel/carousel.js"></script>
    <!--Scroll-->
    <!-- <script src="/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> -->
    <!-- Maps -->
    <script src="/js/maps/gmap3.js"></script>
    <!-- Filter -->
    <script src="/js/filters/jquery.isotope.js"></script>
    <!-- Retina -->
	<!-- <script src="/js/retina/retina.min.js"></script> -->
    <!-- Bootstrap.js-->
    <script src="/js/bootstrap/bootstrap.js"></script>
    <!--MAIN FUNCTIONS-->
    <script src="/js/main.js"></script>
    <!-- ======================= End JQuery libs =========================== -->

    <!-- *** Show Bootstrap size in the Dev footer *** -->
    <div class="container">
    <div class="row"> 
            <div class="col-xs-6 col-sm-3"> <span class="hidden-xs">Extra small</span> <span class="visible-xs-block">✔ Extra small</span> </div>
            <div class="col-xs-6 col-sm-3"> <span class="hidden-sm">Small</span> <span class="visible-sm-block">✔ Small</span> </div>
            <div class="col-xs-6 col-sm-3"> <span class="hidden-md">Medium</span> <span class="visible-md-block">✔ Medium</span> </div>
            <div class="col-xs-6 col-sm-3"> <span class="hidden-lg">Large</span> <span class="visible-lg-block">✔ Large</span> </div>
        </div>
        <div class="row"> 
            <div class="col-xs-12"> You are in AB Test group <?=BINARYOPS_AB_TEST?></div>
        </div>
    </div>

<?php } ?>
