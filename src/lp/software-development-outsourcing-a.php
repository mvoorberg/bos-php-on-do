<?php if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); } ?>
<?php
    require_once '../conversation.inc.php';
    
    $options["header"] = "";
    $options["message"] = "I'd like to speak with someone about a [project] project for [business]. <br>My name is [name], I can be reached at [contact].";
    $options["button"] = "Send Message";
    $options["fields"] = array(
        "name" => "Your Full Name",
        "contact" => "Email or Phone number",
        "project" => "Type of Project",
        "business" => "Business Name or Type"
    );

    $convoSectionA = new ConversationSection($options);
    $convoSectionB = new ConversationSection($options);

    $header = "Need more from your software development team?";
    $tagline = "Outsource software development with BinaryOps. Highly skilled resources!";
    
    require_once '../multi-block-alt.inc.php';
    $blocks = array(
        "header" => "Gain speed and productivity with top developers from BinaryOps!",
        "tagline" => "Add us to your team or outsource the whole project! We're able to 
                    modernize and improve your tech stack to make you more productive.",
        array(
            "title" => "Experienced Developers",
            "banner" => "Impressive Portfolio",
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
            "title" => "Modern Technologies",
            "banner" => "We work hard to stay current",
            "text" => "We build software solutions with modern web technologies and the latest 
                        proven methods so that your systems will scale when your business grows.",
            "icon" => "rocket"
        ));
    $blockSectionAlt = new MultiBlockAltSection($blocks);
?>
<style>
    div.landing-container-local {
        background: -moz-linear-gradient(53deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 6%, rgba(0,128,128,1) 100%); /* ff3.6+ */
        background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(0,0,0,1)), color-stop(6%, rgba(0,0,0,1)), color-stop(100%, rgba(0,128,128,1))); /* safari4+,chrome */
        background: -webkit-linear-gradient(53deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 6%, rgba(0,128,128,1) 100%); /* safari5.1+,chrome10+ */
        background: -o-linear-gradient(53deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 6%, rgba(0,128,128,1) 100%); /* opera 11.10+ */
        background: -ms-linear-gradient(53deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 6%, rgba(0,128,128,1) 100%); /* ie10+ */
        background: linear-gradient(37deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 6%, rgba(0,128,128,1) 100%); /* w3c */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#008080', endColorstr='#000000',GradientType=0 ); /* ie6-9 */
        position: static;
    }
    div.landing-container-local .sidebars {
        margin: 25px 0;
        text-align: center;
    }
    div.landing-container-local .sidebars h1 {
        position: static;
    }
    div.landing-container-local .sidebars h3 {
        position: static;
        color: #999; 
        text-shadow: none; 
        font-size: 1.8rem;
    }
    div.landing-container-local .sidebars p {
        color:#efefef;
        text-shadow:0px 2px 5px rgba(0, 0, 0, 0.5);
        font-size: 1.1rem;
        line-height: 1.3;
        font-weight: 800;
    }
    div.landing-container-convo {
        background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('/img/slide/slides/2.jpg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }
    div.landing-container-convo .conversation div.convo-text {
        color: #fff;
    }
    div.landing-container-convo .conversation .convo-text span[contenteditable=true]:before {
        color: #ddd;
    }    
    .lp-box-action{
        background-color: #000;
    }
    .box-action .title:before {
        border-left: 30px solid #000;
    }    
    .tab-content .conversation h1 {
        color: #555;
    }
    .conversation div.convo-text {
        color: #555;
        text-align: left;
    }

    .conversation .convo-text span[contenteditable=true]:before {
        color: #555;
    }    
    </style>
    <div class="container-fluid" style="padding:0;">
        <div class="landing-container landing-container-local">
            <div class="row">

                <!-- Sidebars -->
                <div class="col-md-8 sidebars">
                    <h1><?=$header?></h1>
                    <h3><?=$tagline?></h3>
                </div><!-- End Sidebars -->

                <!-- Content Right -->
                <div id="contact-wrapper" class="col-xs-offset-1 col-xs-10 col-md-offset-0 col-md-4">
                    <div class="tab-content tab-content-top" style="background-color:#fff;">
                        <?php $convoSectionA->renderThinHTML(); ?>
                    </div>                    
                </div><!-- End Content Right -->
            </div>
        </div>
        <?php
            $blockSectionAlt->render();
        ?>
        <div class="landing-container landing-container-convo">
            <div class="row">
                <?php $convoSectionB->renderHTML(); ?>
            </div>
        </div>
<?php

    require_once '../box-action.inc.php';
    $boxAction = new BoxActionSection("Get your project started today!");
    $boxAction->render();
    
    define("BINARYOPS_SHOW_FOOTER_TOP", false);
    define("BINARYOPS_SHOW_FOOTER_MIDDLE", false);
    require_once '../footer.inc.php';
    $convoSectionA->renderJavaScript();
    $convoSectionB->renderJavaScript();
?>
