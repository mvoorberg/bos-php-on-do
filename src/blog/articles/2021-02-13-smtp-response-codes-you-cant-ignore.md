{
"title" : "SMTP response codes you can't ignore!",
"author":"Mark Voorberg",
"tag":"Tutorial",
"category":"Software Development",
"meta-description": "You need to know about these status codes when ending mail with SMTP, even if you don't use them directly."
}

I'll cut straight to the chase with this article. You should never ignore the response codes from your SMTP server.

We're so used to dealing with HTTP and RESTful webservices and everyone who's been around a while knows the difference between a 2xx series response from your webserver and 404 response. Why should SMTP be any different? Sure there's a different set of condes to become familiar with but that shouldn't excuse us from listening to what's arguabley the most important part of the conversation!

SMTP Server responses have format somewhat similar to HTTP responses: three digits, a space (or dash), followed by some free-format text.
In the case of error messages, this is often intended for users to read; otherwise it's just noise. 
If there is a dash after the third digit instead of a space, further lines of response follow; otherwise, it's the last line. 

The only truly important thing about the response is the first digit, like so:

<table style="width:100%;border:1px solid black;">
  <tr> <th style="text-align:center;"> Code <th> Meaning
  <tr> <td style="text-align:center;"> 2xx <td> everything is fine, carry on
  <tr> <td style="text-align:center;"> 4xx <td> temporary issue, try again later
  <tr> <td style="text-align:center;"> 5xx <td> permanent error, give up
</table><br/>


The second digit, represents the subject of the response. It could indicate a syntax problem, connection issues or similar.
The third digit, provides additional detail about the request status.

The following is an example SMTP conversation between your email client and the SMTP server.

```
S: 220 smtp.example.com ESMTP Postfix
C: HELO relay.example.com
S: 250 smtp.example.com, I am glad to meet you
C: MAIL FROM:<bob@example.com>
S: 250 Ok
C: RCPT TO:<alice@example.com>
S: 250 Ok
C: RCPT TO:<theboss@example.com>
S: 250 Ok
C: DATA
S: 354 End data with <CR><LF>.<CR><LF>
C: From: "Bob Example" <bob@example.com>
C: To: Alice Example <alice@example.com>
C: Cc: theboss@example.com
C: Date: Tue, 15 Jan 2008 16:02:43 -0500
C: Subject: Test message
C: 
C: Hello Alice.
C: This is a test message with 5 header fields and 4 lines in the message body.
C: Your friend,
C: Bob
C: .
S: 250 Ok: queued as 12345
C: QUIT
S: 221 Bye
```

You'll notice that, unlike an HTTP request, there are multiple server response codes coming back. That's because it *is* a conversation and it has to follow the expected pattern.

When the conversation is completed, you should see a 250 or a 221 response code from the server. If you didn't get that, it's worth a second look to see what did happen and if the message was sent successfully.

### What can we do with this information?

If you've ever looked for example code to send email with SMTP, you've probably seen a code block like this: 
```php
<?php     
  $to_email = 'name@examplecom';
  $subject = 'Testing PHP Mail';
  $message = 'This mail is sent using the PHP mail function';
  $headers = 'From: noreply@example.com';
  mail($to_email, $subject, $message, $headers);
?>
```
It lays out variables for input values in detail so that you can get an email message out the door. What these examples are all missing however, is any indication of success or failure. The details of what to do when something goes sideways will vary wildly based on your requirements but ignoring the possibility seems like a collossal miss. 

Depending on the programming language and the libraries you're using to send email, the parameters and syntax will be different, but the gist remains the same. 

> Successfully *sending* an email is not the same as successfully *delivering* an email.

So, given that we can only confirm successful sending of an email, we should be sure to do that. With the PHP mail() function, as per our example, that looks something like:
```php
<?php     
  $to_email = 'name@examplecom';
  $subject = 'Testing PHP Mail';
  $message = 'This mail is sent using the PHP mail function';
  $headers = 'From: noreply@example.com';

  // Where `$result` is false on failure and a hash when successful.
  $result = mail($to_email, $subject, $message, $headers);
  if ($result) {
    echo "Message sent successfully";
  } else {
    echo "Failed to send message";
  }
?>
```
You'll notice that we didn't have to specifically watch for the 250 or 221 response codes in our PHP code, that's because the mail() function handles it for us. If we'd implemented the SMTP protocol ourselves, we would have needed to carefully parse the server responses for success and failure codes.


We see this request from consulting clients quite a bit, where someone wants to know that an email is delivered, but it's really quite impossible. You can add tracking pixels to each message, but those too aren't guaranteed to be correct. If a person is reading your email as text-only, the tracking pixel has been filtered out by the recieving server policy or blocked at the mail client by disabling remote content, you're not going to know if they received your email at all.

### Wrap-up
If you need to know the details about why a message failed to send, you need to see the SMTP response codes. For a permanent error, resending a bad message is only going to hurt your sender reputation. Resending a message due to a temporary error code is fine and may result in only a slight delay getting your message in front of users.
Depending on the type of messages being sent and the value that you ascribe to successful delivery of messages, it may mean choosing a different library to handle server communication or even implementing the protocol yourself.


### Common 2xx & 3xx SMTP Codes

* 220 - SMTP Service ready. This is a general reply stating that the SMTP server is ready to continue with the next command.
* 221 - Service closing. This response states that the session or connection to the mail server is ending and all processes are complete. The end result could be either a success or failure.
* 250 - Requested action taken and completed. This is the best message for a sender to receive because it indicates that the SMTP communication was successful. SMTP response code 250 is also the most common response code in SMTP since it is issued in response to every accepted command (likely 4 to 6 times per message).
* 354 - Start message input and end with '.' This indicates that the server is ready to accept the message itself.

### Common 4xx Error codes
* 421 - The service is not available and the connection will be closed. If you receive ‘SMTP error (421) connection server failed’, think of this as an open ended error, which is most typically related to the destination server not being “reachable.” If you’re using a remote mail server, ensure that it’s working properly and the connections are successful. 
* 450 - The requested command failed because the user’s mailbox was unavailable (for example because it was locked) try again later. There can also be some additional meanings to this response code such as:
  * The email account no longer exists
  * The email account does not have permission to receive the email
  * The recipient mail server rejected the email due to a blacklisting or filtering
* 451 - The command has been aborted due to a server error. This is usually not your fault because the receiving mailserver’s rules may have prevented the mail from processing.
* 452 - The command has been aborted because the server has insufficient system storage. This is usually caused by overloading the mail server while attempting to send too many messages at once. 
* 455 - The server cannot deal with the command at this time. If you receive this message, allow time for more attempts. If unsuccessful, then contact the administrator on the recipient mail server’s side.

### Common 5xx Error codes
* 500 - The server could not recognize the command due to a syntax error. This response could be caused by antivirus or firewall software.
* 501 - A syntax error was encountered in command arguments. This is similar to SMTP response code 500. However, a 501 response is often caused by an incorrect/invalid email address.
* 502 - This command is not implemented. If you receive this response, then you’re most likely experiencing a configuration issue with your underlying MTA.
* 503 - The server has encountered a bad sequence of commands. This response indicates that the parameters being used are out of order from what the mail server is expecting, which commonly happens when not authenticating an email account.
* 504 - A command parameter is not implemented. This is very similar to SMTP response code 502.
* 521 — This host never accepts mail; a response by a dummy server. This response simply means that the recipient mail server does not accept and deliver email.
* 541 - The message could not be delivered for policy reasons - typically a spam filter (only some SMTP servers return this error code.) 
* 550 - The requested command failed because the user’s mailbox was unavailable for example because it was not found, or because the command was rejected for policy reasons.In addition, SMTP response code 550 is also commonly used to indicate additional instances of permanent failures. For example, "550 The mail server detected your message as spam and has prevented delivery"
* 551 - The recipient is not local to the server. The server then gives a forward address to try. This is commonly used as a strategy for spam prevention.
* 552 - The action was aborted due to exceeded storage allocation. This is usually due to the recipient’s mail server being too full. This could either be because the recipient doesn’t check their email, or possibly the recipient is a victim of mail bombing.
* 553 - The command was aborted because the mailbox name is invalid. In this case, the mailbox was unable to verify the email address. Check to ensure that all the email addresses that you’re sending to are correct.
* 554 - delivery error: Sorry, your message cannot be delivered. This mailbox is disabled. If you receive SMTP code 554, then this is just a normal invalid address response. Check the email address and try again.
