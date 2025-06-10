<?php 
if(!defined("BINARYOPS_INCLUDE")) { die("Direct access forbidden."); }

class ConversationSection {
    var $options;
    var $stylesRendered = false;

   function ConversationSection($options) {
		if ($options) {
			$this->options = $options;
		} else {
			$options["header"] = "Have a Project to do?";
            $options["message"] = "I'm interested in discussing a [project] project for [business]. My name is [name] and you can reach me at [contact].";
            $options["button"] = "Send My Message";
            $options["fields"] = array(
                "name" => "Your Name",
                "contact" => "Email or Phone Number",
                "project" => "Type of Project",
                "business" => "Business Name or Type"
            );
            $this->options = $options;
        }
        $this->options["id"] = mt_rand();
    }

    function renderStyles() {
        // Only render the styles once!
        if ($this->stylesRendered) {
            return;
        }
        $this->stylesRendered = true;
    ?>
    <style>
        .conversation_tabs {
            padding-bottom: 20px;
        }
        .conversation h2 {
            color: #fff;
            font-weight: bold;
        }
        .conversation .convo-text {
            color: #fff;
            margin: 0 20px 20px 20px;
            font-size: 14pt;
            line-height: 2.5em;
            text-align: center;
        } 
        .conversation .convo-button {
            text-align: center;
        }
        .convo-padding {
            height: 60px;
        }
        .conversation [contenteditable=true]:before {   
            content: attr(placeholder);
            -webkit-transition: all .4s cubic-bezier(.52,0,.08,1) 0s;
            -o-transition: all .4s cubic-bezier(.52,0,.08,1) 0s;
            transition: all .4s cubic-bezier(.52,0,.08,1) 0s;
            position: absolute;
            width: 200px;
            top: 0px;
            display: block; /* For Firefox */
            opacity: 0;
            text-align: left;
            font-size: 8pt;
            font-style: italic;
            font-weight: bold;
            color: #ccc;
        }
        .conversation [contenteditable=true]:focus:before {
            opacity: 1;
            top: 26px;
        }
        .conversation span[contenteditable=true] {
            position: relative;
            padding: 0 5px;
            display: inline-block;
            min-width: 110px;
            outline: 0;
            border-bottom: #54b14e 2px dotted;
            text-align: center;
            line-height: normal;
            color: #54b14e;
        }
    </style>
    <?php
    }

    function renderResultPanes($id) {
        ?>
        <div id="conversational_error_<?=$id?>" class="panel panel-danger" style="display:none;">
            <div class="panel-heading">
                <h3 class="panel-title">Ack!</h3>
            </div>
            <div style="padding:10px;">
                <p>Something went wrong sending your message through our system.</p>
                <p>While we sort that out, you can use the following link to send your message as an email instead:
                    <div class="list-group">
                        <blockquote id="err_send_message_<?=$id?>"></blockquote>
                        <a id="conversational_fallback_<?=$id?>" href="#" class="btn btn-default btn-block">Send an email to BinaryOps.</a>
                    </div>
                    Thanks, and sorry about that.
                </p>
            </div>
        </div> <!-- End conversational_error -->

        <div id="conversational_success_<?=$id?>" class="panel panel-success" style="display:none;">
            <div class="panel-heading">
            <h3 class="panel-title">Got it, Thanks!</h3>
            </div>
            <div style="padding:10px;">
            <p>We'll have someone get back to you as soon as possible.
            <br>In the meantime, perhaps one of the following links might be useful or interesting:
                <div class="list-group">
                    <a href="/blog/" class="list-group-item">Blog</a>
                    <a href="/" class="list-group-item">Home</a>
                </div>
            </p>
            </div>
        </div> <!-- End conversational_success -->            
        <?php
    }
        
    function renderThinHTML($description="Thin Convo") {
        $id = $this->options["id"];
        $header = $this->options["header"];
        $message = $this->options["message"];
        $buttonText = $this->options["button"];
        $fields = $this->options["fields"];

        foreach ($fields as $field => $placeholder) {
            $search = "#\[{$field}\]#";
            $replacement = "<span id=\"{$field}-{$id}\" contenteditable=\"true\" placeholder=\"{$placeholder}\"></span>";
            $message = preg_replace($search, $replacement, $message);
            // echo $search . '<br>' . $placeholder . '<br>' . $message . '<br><br>';
        }
?>
        <!-- conversation-action -->
        <section class="conversation conversation-local">

            <?php $this->renderResultPanes($id); ?>

            <form class="form" id="conversational_contactform_<?=$id?>">
                <?php echo ($header ? "<h2>{$header}</h2>" : "")?>
                <div class="convo-text">
                    <?=$message?>
                </div>
                <div class="convo-button">
                    <input id="send-message-btn-<?=$id?>" class="btn btn-primary" type="submit" value="<?=$buttonText?>" />
                </div>
            </form>        
            <span id="description-<?=$id?>" style="display:none;"><?=$description?></span>
        </section>
        <!-- End conversation-action-->
    <?php
    }

   function renderHTML($description="Full-width Convo") {
        $id = $this->options["id"];
        $header = $this->options["header"];
        $message = $this->options["message"];
        $buttonText = $this->options["button"];
        $fields = $this->options["fields"];

        foreach ($fields as $field => $placeholder) {
            $search = "#\[{$field}\]#";
            $replacement = "<span id=\"{$field}-{$id}\" contenteditable=\"true\" placeholder=\"{$placeholder}\"></span>";
            $message = preg_replace($search, $replacement, $message);
            // echo $search . '<br>' . $placeholder . '<br>' . $message . '<br><br>';
        }
?>
        <!-- conversation-action -->
        <section class="conversation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="convo-padding"></div>
                        <div class="tab-pane active conversation_tabs">

                            <?php $this->renderResultPanes($id); ?>

                            <form class="form" id="conversational_contactform_<?=$id?>">
                                <?php echo ($header ? "<h2>{$header}</h2>" : "")?>
                                <div class="convo-text"><?=$message?></div>
                                <div class="convo-button">
                                    <input id="send-message-btn-<?=$id?>" class="btn btn-primary" type="submit" value="<?=$buttonText?>" />
                                </div>
                            </form>
                            <span id="description-<?=$id?>" style="display:none;"><?=$description?></span>
                        </div> <!-- End conversation -->
                        <div class="convo-padding" ></div> 
                    </div>
                </div><!-- row -->
            </div>
       </section>
       <!-- End conversation-action -->
<?php

	}

    function renderJavaScript() {
        $id = $this->options["id"];

        $this->renderStyles();        
?>
        <script>
        // ****************************************************************
        // Submit Contact form directly to email
        // ****************************************************************
        $('#conversational_contactform_<?=$id?>').submit(function(evt) {
            evt.preventDefault();  // Don't do default action
 
            // Grab the data we need to send
            // var project = $('#project-<?=$id?>').text();
            // var business = $('#business-<?=$id?>').text();
 
            var name = $('#name-<?=$id?>').text();
            if (!name) {
                $('#name-<?=$id?>').focus();
                return;
            }
            var contact = $('#contact-<?=$id?>').text();
            if (!contact) {
                $('#contact-<?=$id?>').focus();
                return;
            }
 
            // get the whole message text, removing line breaks and duplicate whitespace.
            var message = $('#conversational_contactform_<?=$id?>').text().replace(/(\r\n\t|\n|\r\t)/gm,' ').replace(/\s+/g,' ');
            var description = $('#description-<?=$id?>').text();
             // var message = $('#conversational_contactform').text().replace(/\s+/g,' ');
            var subject = "BinaryOps.ca inquiry";
            var email = [null, 'dmin@bin', 'ryops.c', null].join('a');
            var mobile = "not provided";
            if (contact.indexOf("@") > -1) {
                email = contact;
            } else {
                mobile = contact;
            }
 
            // Execute the JSONP request to submit the ticket
            //contentType: 'application/json; charset=utf-8',
            try {
                var myData = {
                        message: message,
                        description: description,
                        abtest: gtmAbTest || 'Not Found',
                        pageurl: window.location.href, 
                        subject: subject + " from: " + name,
                        name: name,
                        mobile: mobile,
                        email: email
                    };
                // console.log(myData); return false;
                $.ajax({
                    type: "POST",
                    url: '/mailer.php',
                    data: myData,
                    success: function(data) {
                        //console.log("success", data);
                        $('#conversational_contactform_<?=$id?>').fadeOut(400, function(evt) {
                            $('#conversational_success_<?=$id?>').fadeIn(400);
                        });
                    },
                    error: function(d, msg) {
                        //console.log("error", d, msg);
                        $('#conversational_contactform_<?=$id?>').fadeOut(400, function(evt) {
                            $('#conversational_error_<?=$id?>').fadeIn(400);
                            $('#err_send_message_<?=$id?>').text(message);
                            var ref = "mailto:support" + "@binaryops.ca?subject=BinaryOps.ca%20Inquiry%20Email&body=" + encodeURIComponent(message);
                            $('#conversational_fallback_<?=$id?>').attr("href", ref);
                        });
                    }
                });
            } catch (err) {
                //console.log(err);
                $('#conversational_contactform_<?=$id?>').fadeOut(400, function(evt) {
                      $('#conversational_error_<?=$id?>').fadeIn(400);
                      var ref = "mailto:support" + "@binaryops.ca?subject=BinaryOps.ca%20Inquiry%20Email&body=" + encodeURIComponent(message);
                      $('#conversational_fallback_<?=$id?>').attr("href", ref);
                  });
            }
            return false;
        });
    </script>
<?php 
    }
} // end of class BoxActionSection
