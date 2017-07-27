<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Contact Us</title>
<style type='text/css'>
#contact_form_holder { 
    font-family: 'Verdana'; 
    font-variant: small-caps; 
    width:400px;
}
#contact_form_holder input, #contact_form_holder textarea { 
    width:100%; /* make all the inputs and the textarea same size (100% of the div they are into) */ 
    font-family:inherit; /* we must set this, because it doesn't inherits it */ 
    padding:5px;
}
#contact_form_holder textarea { 
    height:100px; /* i never liked small textareas, so make it 100px in height */ 
}
#send_message { 
    width:200px !important; /* the width of the submit button  */ 
    font-variant: small-caps; /* nicer font-variant (like explained before) */  
    border:1px solid black; /* remove the default border and put a normal black one */
    cursor:pointer;
    cursor:hand;
}
#cf_submit_p { text-align:right; } /* show the submit button aligned with the right side */

.error { display: none; padding:10px; color: #D8000C; font-size:12px;background-color: #FFBABA;}
.success { display: none; padding:10px; color: #044406; font-size:12px;background-color: #B7FBB9;}

#contact_logo { vertical-align: middle; }
.error img { vertical-align:top; }
</style>
<!--<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'></script>-->
<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>                                                                                          
<script type='text/javascript'>
    $(document).ready(function(){
        $('#send_message').click(function(e){
            e.preventDefault();
            var error = false;
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var company = $('#company').val();
            var message = $('#message').val();
            if(name.length == 0){
                var error = true;
                $('#name_error').fadeIn(500);
            }else{
                $('#name_error').fadeOut(500);
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                $('#email_error').fadeIn(500);
            }else{
                $('#email_error').fadeOut(500);
            }
            if(phone.length == 0){
                var error = true;
                $('#phone_error').fadeIn(500);
            }else{
                $('#phone_error').fadeOut(500);
            }
            if(company.length == 0){
                var error = true;
                $('#company_error').fadeIn(500);
            }else{
                $('#company_error').fadeOut(500);
            }
            if(message.length == 0){
                var error = true;
                $('#message_error').fadeIn(500);
            }else{
                $('#message_error').fadeOut(500);
            }
            
            //now when the validation is done we check if the error variable is false (no errors)
            if(error == false){
                //disable the submit button to avoid spamming
                //and change the button text to Sending...
                $('#send_message').attr({'disabled' : 'true', 'value' : 'Sending...' });
                
                /* using the jquery's post(ajax) function and a lifesaver
                function serialize() which gets all the data from the form
                we submit it to send_email.php */
                $.post("send.php", $("#contact_form").serialize(),function(result){
                    //and after the ajax request ends we check the text returned
                    if(result == 'sent'){
                        //if the mail is sent remove the submit paragraph
                         $('#cf_submit_p').remove();
                        //and show the mail success div with fadeIn
                        $('#mail_success').fadeIn(500);
                    }else{
                        //show the mail failed div
                        $('#mail_fail').fadeIn(500);
                        //reenable the submit button by removing attribute disabled and change the text back to Send The Message
                        $('#send_message').removeAttr('disabled').attr('value', 'Send The Message');
                    }
                });
            }
        });    
    });
</script>

</head>
<body>
<div id='contact_form_holder'>
                            <form id="contact_form" class="contact-form form" action="index2.php?menu=contact" method="post">
                                <div class="row">
                                    <label>Your Name</label>
                                    <input type="text" name="name"  id="name"/>
                                </div>
								<div id='name_error' class='error'> I don't talk to strangers.</div>
                                <div class="row">
                                    <label class="labelEmail">Email</label>
                                    <input type="mail" name="email" class="inputEmail" id="email"/>
                                    <label class="labelPhone">Phone</label>
                                    <input type="text" name="phone" class="inputPhone" id="phone"/>
                                </div>
								<div id='email_error' class='error'> You don't want me to answer?</div>
								<div id='phone_error' class='error'> You don't want me to answer?</div>
                                <div class="row">
                                    <label>Company</label>
                                    <input type="text" name="company" id="company"/>
                                </div>
								<div id='company_error' class='error'> What is your company?</div>
                                <div class="row">
                                    <label>Message</label>
                                    <textarea name="message" id="message"></textarea>
                                </div>
								<div id='message_error' class='error'> Forgot why you came here?</div>
                                <div class="row">
                                    <div id='mail_success' class='success'> Thank you. The mailman is on his way.</div>
                                    <div id='mail_fail' class='error'> Sorry, don't know what happened. Try later.</div>
                                    <p id='cf_submit_p'>
                                    <input type='submit' id='send_message' value='Send The Message' class="greenBtn">
                                    </p>
                                </div>
                                
                            </form>
</div>
</body>
</html>
