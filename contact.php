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
#cf_submit_p { text-align:right; } /* show the submit button aligned with the right side */

.error { display: none; padding:10px; color: #D8000C; font-size:12px;background-color: #FFBABA;}
.success { display: none; padding:10px; color: #044406; font-size:12px;background-color: #B7FBB9;}

#contact_logo { vertical-align: middle; }
.error img { vertical-align:top; }
</style>

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
					var result = parseInt(result,10) ;
                    if(result == 1){
						
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

<div id="container" class="contactPage">
   <div id="content">
   		<div class="w960">
            <div class="post postContact">
                <h1>NOW YOU KNOW</h1>
                <h2>A LITTLE ABOUT US</h2>
                <h3>LET'S TALK ABOUT</h3>
                <h4>WHAT WE CAN DO FOR YOU</h4>
                <div class="entry-post">
                	<div class="w320">
                    	<p><strong>Headquarters:</strong><br />
                         Yuliana Andi - Account Director<br /><br />
                        Jl. Kemang Timur Raya No. 100E<br />
                        Jakarta 12730<br />
                        Indonesia<br /></p>
                        
                       <p> Phone: +62 21 7179 1949<br />
                        Email: yuli@kana.co.id 

						</p>
                    </div>
                	<div class="w320">
                    	<p><strong>Kuala Lumpur:</strong><br />
                        Azrin Ajib - Managing Director<br /><br />
                        59-2 &amp; M, Jalan PJU 5/21<br />
                        The Strand Damansara<br />
                        47810 Kota Damansara, Selangor</p>
                        
                       <p> Phone: +6 03 6141 0808<br />
                        Email: azrin@kana.co.id</p>
                    </div>
                    <div class="box contactbox" id="formContact">
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
                                    <input type="text" name="company" id="company" class="required"/>
                                </div>
								<div id='company_error' class='error'> What is your company?</div>
                                <div class="row">
                                    <label>Message</label>
                                    <textarea name="message" id="message"></textarea>
                                </div>
								<div id='message_error' class='error'> Forgot why you came here?</div>
                                <div class="row">
                                    <div id='mail_success' class='success'>Thank you. The mailman is on his way.</div>
                                    <div id='mail_fail' class='error'> Sorry, don't know what happened. Try later.</div>
                                    <p id='cf_submit_p'>
                                    <input type='submit' id='send_message' value='Send The Message' class="greenBtn">
                                    </p>
                                </div>
                                
                            </form>
                    </div>
                </div>
            </div>
            <div id="map" class="anim6"></div>
            <div id="mapContact" class="anim3"></div>
        </div>
   </div><!-- end #content -->
</div><!-- end #container -->
