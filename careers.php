<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>

<?php
if (isset($_POST['sendCV'])=="sendCV") {
	// $email_to = "ferra@kana.co.id,jobs@kana.co.id";
	$email_to = "yani@kana.co.id";
	//$email_to = "deddy@kana.co.id,dedysumarna@gmail.com";
	$subject = $_POST['yourname'];
	
	$file = $_FILES['txtImage']['tmp_name'];
	$type = explode('/',$_FILES['txtImage']['type']);
	
	if ($type[1]=="vnd.ms-excel") {
		$type[1]= "xls";
	} elseif ($type[1]=="vnd.openxmlformats-officedocument.wordprocessingml.document") {
		$type[1] = "docx";
	} elseif ($type[1]=="msword") {
		$type[1] = "doc";
	}elseif ($type[1]=="vnd.ms-powerpoint") {
		$type[1] = "ppt";
	}	
	
	$filename = md5($_FILES['txtImage']['name'].rand(1000,9999)).".".$type[1];
	$filename = $_POST['youremail']."_".$filename;
	$path = "upload/career/$filename";
	
	if (move_uploaded_file($file,$path)) {
		
		$message = "
		<h1>EMAIL CAREER KANA DIGITAL</h1>
		<table width='400' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td width='100' valign='top'>Name</td>
			<td width='10' valign='top'>:</td>
			<td width='92' valign='top'>".$_POST['yourname']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Email</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['youremail']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Phone</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['phonenumber']."</td>
		  </tr>
		  <tr>
			<td valign='top'>Expected Job Profile</td>
			<td valign='top'>:</td>
			<td valign='top'>".$_POST['lookforjob']."</td>
		  </tr>
		  <tr>
			<td valign='top' colspan='3'><a target='_blank' href='http://www.kana.co.id/upload/career/$filename'>Download File</a></td>
		  </tr>
		</table>
		";
	
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		
		// More headers
		$headers .= 'From: <'.$_POST['youremail'].'>' . "\r\n";
		if(mail($email_to, $subject, $message, $headers)){
			echo "<div class='w960'><label style='display: block;float: left; line-height: 30px; width: 250px;color:red;'>Thank you. The mailman is on his way.</label></div><br>";
		}else{
			echo "<div class='w960' ><label style='display: block;float: left; line-height: 30px; width: 250px;color:red;'>Sorry, don't know what happened. Try later.</label></div><br>";
		}
	}
}
?> 

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
	var a = Math.ceil(Math.random() * 10);
	var b = Math.ceil(Math.random() * 10);       
	var c = a + b	
	
	function DrawBotBoot() {
		document.write("<label>What is "+ a + " + " + b +" ?</label>");
		document.write("<input id='BotBootInput' type='text' maxlength='2' size='2'/>");
	}
	
    $("#careers_form").ready(function(){
        $('#send_message_careers').click(function(e){
            e.preventDefault();
            var error = false;
            var name = $('#yourname').val();
            var email = $('#youremail').val();
            var phone = $('#phonenumber').val();
            var lookforjob = $('#lookforjob').val();
            var filecv = $('#filecv').val();
            var BotBootInput = $('#BotBootInput').val();
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
			if(phone.length == 0 || isNaN(phone)){
				var error = true;
				$('#phone_error').fadeIn(500);
			} else {
				$('#phone_error').fadeOut(500);
			}
            if(lookforjob.length == 0){
                var error = true;
                $('#lookforjob_error').fadeIn(500);
            }else{
                $('#lookforjob_error').fadeOut(500);
            }
            if(filecv.length == 0){
                var error = true;
                $('#filecv_error').fadeIn(500);
            }else{
                $('#filecv_error').fadeOut(500);
            }
            if(BotBootInput.length == 0){
                var error = true;
                $('#BotBootInput_error').fadeIn(500);
            }else{
				var d = BotBootInput;
				if (d == c) {
					$('#BotBootInput_error').fadeOut(500);
				} else {
					$('#BotBootInput_error').fadeIn(500);
					return false;
				}
            }
			
			if(error == false){
				$("#careers_form").submit();
			}
        });
    });
</script>
</head>
<body style="overflow-x:hidden;">
    <div id="body">
        <div id="universal">
           <div id="header" class="w960">
            	<div class="logo">
                	<a href="index2.php">&nbsp;</a>
                </div>
                <div id="navigation">
                	<ul class="nav">
                    	<li class="about"><a <?php if($_GET['menu']=='about'){ ?> class="current" <?php } ?> href="index2.php?menu=about">About</a></li>
                    	<li class="services"><a <?php if($_GET['menu']=='services'){ ?> class="current" <?php } ?> 
												<?php if($_GET['menu']=='elaborate'){ ?> class="current" <?php } ?>  href="index2.php?menu=services">Services</a></li>
                    	<li class="tools"><a <?php if($_GET['menu']=='tools'){ ?> class="current" <?php } ?> 
                        					<?php if($_GET['menu']=='tools-smac'){ ?> class="current" <?php } ?> 
                                            <?php if($_GET['menu']=='tools-kana'){ ?> class="current" <?php } ?> 
                        					href="index2.php?menu=tools">tools</a></li>
                    	<li class="clients"><a <?php if($_GET['menu']=='clients'){ ?> class="current" <?php } ?> href="index2.php?menu=clients">Clients</a></li>
                    	<li class="case"><a <?php if($_GET['menu']=='case'){ ?> class="current" <?php } ?> href="index2.php?menu=case">Case Studies</a></li>
                    	<li class="services"><a class="current" href="careers.php">Careers</a></li>
                    	<li class="about"><a <?php if($_GET['menu']=='contact'){ ?> class="current" <?php } ?> href="index2.php?menu=contact">Contact</a></li>
                    </ul>
      			     <script language="javascript">setPage()</script>
                </div>
            </div><!-- end #header -->
<div id="container" class="careersPage">
   <div id="content">
   		<div class="w960">
            <div class="post postServices anim11">
                <h1 class="titlePage"><span class="green">The vacant chairs are yours to claim </span><br />
					<span class="red">All available positions are listed below</span><br />
                    <span class="blue f20">We invite you to fill them in immediately! Make sure to show us your area of expertise and why you think that you would make a great fit!</span>
                </h1>
                <div class="entry">
                	<div id="accordion">
						<h3>Account Executive</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
								<li>Female/Male, age max 30 years old</li>
								<li>Min. 2 years of experience, preferably in the Advertising, Agency, Marketing, Creative, or internet industry </li>
								<li>Min education S1, preferably from Communications or Marketing Programs</li>
								<li>Computer Literate</li>
								<li>Proficiency in English both oral and written</li>
								<li>Knowledge in handling digital and social media campaign </li>
								<li>Must have good selling techniques, client services and presentation skills. </li>
								<li>Responsible, Intuitive and well represented </li>
								<li>Able to face challenges and work under pressure</li>
                            </ul>
						</div><!-- end .acc-entries -->
						<h3>Account Manager</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Experience in either advertising and/or marketing discipline for min. 2 years. Digital agency experience is a plus</li>
                              <li>A basic understanding of the digital environment</li>
                              <li>To work with clients in a team format to define their digital objectives</li>
                              <li>Ability to communicate complex ideas or processes in a simplified professional manner </li>
                              <li>Understand the business goals, then manage project deliverables and timelines both internally and externally to ensure optimum execution</li>
                              <li>Coordinate with third parties when necessary for branding, analytics and report building to ensure smooth execution of projects</li>
                              <li>Regular reporting to communicate the project's status and its performance to all stakeholders</li>
                              <li>Manage multiple simultaneous projects, their status and troubleshoot possible obstacles when and as they arise </li>
                              <li>Contribute to the company's growth by identifying areas of opportunities and expansion </li>
                            </ul>
						</div><!-- end .acc-entries -->
						<h3>Copywriter</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Male/Female, between 25-35 years old</li>
                              <li>Good command in English both oral and written</li>
                              <li>Work experience in the related field is required &amp; passionate in writing as well as having a fair taste in creativity</li>
                              <li>Experience in handling different industry client's requirements</li>
                              <li>Able to write good, clear copy in variety of styles with accurate spelling and grammar</li>
                              <li>Good work ethic &amp; attitude</li>
                              <li>Hard working, well organized and process-driven. Demonstrates an ability to manage a diverse workload under demanding deadline pressures</li>
                              <li>A creative portfolio of strong copywriting concepts</li>
                            </ul>
						</div><!-- end .acc-entries -->
                        <h3>Social Media & Web Administrator</h3>
						<div class="acc-entries">
                        	<h4>Job Description:</h4>
                            <p>The Social Media & Web Administrator is responsible for scheduling, distributing, managing and monitoring social media and networking activities (including related content) of clients' online presence. 
Works closely with Content Strategists, Copywriters and the Creative team to ensure social media activities, content, and campaigns focus on consumer and customer audiences in order to create more high-touch customer experiences that drive community, commerce and brand advocacy across multiple social media platforms and websites.<strong></strong></p>
							<h4>Responsibilities:</h4>
                            <ul>
                              <li>Publish engaging copy to support online marketing objectives</li>
                              <li>Execute social media strategies for a wide range of promotion campaigns, product launches and quizes/competitions</li>
                              <li>Ensure accounts are updated on a daily basis and that messaging is timely and relevant. This also includes using social media tools (i.e., Tweetdeck, Hootsuite, etc.) to schedule tweets to appear overnight and on weekends</li>
                              <li>Proactively monitor and respond to questions and comments from community members and potential consumers</li>
                              <li>Monitors internet for trends and brand-related topics of conversation</li>
                              <li>Execute strategies to increase brand mentions and engagement within social media</li>
                              <li>Moderate website content</li>
                            </ul>
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Passion for using social media channels as a means to communicate with online audiences and deep understanding of what motivates people to engage with brands through various social media platforms/li>
                              <li>Solid experience in managing and executing consumer social media campaigns</li>
                              <li>Proven digital experience launching and growing social networking initiatives</li>
                              <li>Creative and proactive communication skills to move new ideas and enhance strategic goals</li>
                              <li>The right candidate will be comfortable in the Web 2.0 environment</li>
                              <li>Passion, integrity and energy!</li>
                            </ul>
						</div><!-- end .acc-entries -->
						
						<h3>Graphic/Web Designer</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
 							  <li>Male/Female, between 21-25 years old</li>
                              <li>Minimum of 1 year experience as a graphic/web designer</li>
                              <li>Fresh graduates are welcome as long as you have a great portfolio/showcase</li>
                              <li>Fluency in current graphic design practices and web production software, such as Adobe Photoshop, Adobe Illustrator</li>
                              <li>Having basic knowledge or familiar with Adobe Flash design/animation is an advantage</li>
                              <li>Ability to create superior, original designs for the Web</li>
                              <li>Strong design style</li>
                              <li>Having knowledge of website structure and functionality</li>
                              <li>Ability to meet tight deadlines is essential for a fast-paced environment</li>
                              <li>Can play Guitar Hero (well, it is fun!)</li>
                              <li>Provide sample of works (<strong>portfolio</strong>)</li>
                            </ul>
						</div><!-- end .acc-entries -->
						<h3>Senior Graphic/Web Designer</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Male/Female, between 24-30 years old</li>
                              <li>Minimum of 3 years experience as a graphic/web designer in the following areas: media, creative agency or advertising</li>
                              <li>Fluency in current graphic design practices and web production softwares, such as Adobe Photoshop, Adobe Illustrator</li>
                              <li>Having basic knowledge or familiar with Adobe Flash design/animation is an advantage</li>
                              <li>Ability to create superior, original designs for the Web</li>
                              <li>Strong design style, including creative design solutions within the constraints of the Internet</li>
                              <li>Having knowledge of web site structure and functionality</li>
                              <li>Having knowledge of HTML5, JavaScript trends</li>
                              <li>Ability to effective manage multiple projects/tasks of varying complexities</li>
                              <li>Strong analytical skills and the ability to meet tight deadlines is essential for a fast-paced environment</li>
                              <li>Can play Guitar Hero (well, it is fun!)</li>
                              <li>Provide sample of works (<strong>portfolio</strong>) </li>
                            </ul>
						</div><!-- end .acc-entries -->
                        <h3>PHP Programmer</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Male / Female</li>
                              <li>Holds a Diploma Degree majoring Engineering (Computer / Telecommunication), Computer Science or equivalent.</li>
                              <li>Minimum Experience min 2 years in web programming such as PHP, AJAX, JAVASCRIPT and HTML (PHP is a must)</li>
                              <li>Experience and comprehensive knowledge of My SQL databases</li>
                              <li>Knowledge in Flash Action Script / Flex would be a plus</li>
                              <li>Strong programming and analytical skills</li>
                              <li>Able to produce technical documentation</li>
                              <li>Experience using frameworks such as Cake PHP or minimum CI</li>
                              <li>Experience in version control</li>
                              <li>Creative, energetic, fast learner and highly motivated</li>
                              <li>Self-discipline, responsible and goal-oriented</li>
                              <li>Strong personality and able to work under pressure to meet deadlines</li>
                            </ul>
						</div><!-- end .acc-entries -->
                        <h3>iOS Developer</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Male / Female</li>
                              <li>D3/S1 degree in Computer Science, Engineering or a related subject</li>
                              <li>2 years of software development experience</li>
                              <li>2 years of iOS development</li>
                              <li>A deep familiarity with Objective-C and Cocoa Touch</li>
                              <li>Experience working with iOS frameworks such as Core Data, Core Animation, Core Graphics and Core Text</li>
                              <li>Experience with third-party libraries and APIs</li>
                              <li>Working knowledge of the general mobile apps development</li>
                              <li>Solid understanding of the full mobile development life cycle</li>
                            </ul>
						</div><!-- end .acc-entries -->
                        <h3>Android Developer</h3>
						<div class="acc-entries">
                            <h4>Requirements:</h4>
                            <ul>
                              <li>Male / Female</li>
                              <li> D3/S1 degree in Computer Science, Engineering or a related subject</li>
                              <li>2 years of software development experience</li>
                              <li>2 years of iOS development</li>
                              <li>Have published at least one original Android app</li>
                              <li>Experience with Android SDK</li>
                              <li>Experience working with remote data via REST and JSON</li>
                              <li>Experience with third-party libraries and APIs</li>
                              <li>Working knowledge of the general mobile apps development</li>
                              <li>Solid understanding of the full mobile development life cycle.</li>
                            </ul>
						</div><!-- end .acc-entries -->
                    </div><!-- end #accordion -->
                    <div class="bot">                    	
						<h1 class="titlePage">
							<span class="green">Apply now, claim your chair, </span><br />
							<span class="red">have a seat and rock it the way you want it!</span><br />
							<span class="blue f20">Submit your application with complete curriculum vitae indicating the job position to: 
								<span class="red">jobs@kana.co.id</span>
								<br/>or simply complete the form below:  
							</span>                   
						</h1>
						<form class="submitcv" id="careers_form" method="POST" action="" enctype="multipart/form-data">
							<fieldset>
								<div class="row">
									<label>Your Name</label>
									<input type="text" value="" id="yourname" name="yourname"/>
								</div>
								<div id='name_error' class='error'> Input your name</div>
								<div class="row">
									<label>Your Email</label>
									<input type="text" value="" id="youremail" name="youremail"/>
								</div>
								<div id='email_error' class='error'> Input your email correctly!</div>
								<div class="row">
									<label>Phone Number</label>
									<input type="text" value="" id="phonenumber" name="phonenumber"/>
								</div>
								<div id='phone_error' class='error'> Input your phone number correctly!</div>
								<div class="row">
									<label>Expected Job Profile</label>
									<select name="lookforjob" id="lookforjob">
										<option value="">- Select Job Profile -</option>
										<option value="Account Executive">Account Executive</option>
										<option value="Account Manager">Account Manager</option>
										<option value="Copywriter">Copywriter</option>
                                        <option value="Social Media & Web Administrator">Social Media & Web Administrator</option>
										<option value="Finance & Admin Manager">Finance & Admin Manager</option>
										<option value="Graphic/Web Designer">Graphic/Web Designer</option>
                                        <option value="PHP Programmer">PHP Programmer</option>
										<option value="IT Sales Professional">IT Sales Professional</option>
										<option value="Linux System Administrator">Linux System Administrator</option>
										<option value="Senior Graphic/Web Designer">Senior Graphic/Web Designer</option>
										<option value="Sales Engineer">Sales Engineer</option>
										<option value="IT Quality Control">IT Quality Control</option>
									</select>
								</div>
								<div id='lookforjob_error' class='error'> Select your Job Profile</div>
								<div class="row">
									<label>Upload Your CV</label>
									<input type="file" id="filecv" name="txtImage"/>
								</div>
								<div id='filecv_error' class='error'> Upload your CV</div>
								<div class="row">
									<script type="text/javascript">DrawBotBoot()</script>
								</div>
								<div id='BotBootInput_error' class='error'> Input the result of captcha correctly!</div>
								<div class="row">
									<label>&nbsp;</label>
									<input class="greenBtn" id='send_message_careers' type="submit" value="SUBMIT YOUR CV"/>
									<input type="hidden" name="sendCV" value="sendCV"/>
								</div>
							</fieldset>
						</form>
					</div>
                </div><!-- end .entry -->
            </div><!-- end .post -->
            <div id="bag" class="anim13"></div>
            <div id="circle4" class="anim12"></div>
        </div>
   </div><!-- end #content -->
</div><!-- end #container -->
            <div id="socialBox">
            	<a class="iconFacebook" href="https://www.facebook.com/kanadigital" target="_blank">&nbsp;</a>
            	<a class="iconYoutube" href="http://www.youtube.com/user/kanadigital" target="_blank">&nbsp;</a>
            	<a class="iconCareer" href="careers.php" target="_blank" style="opacity:1;">&nbsp;</a>
            </div>
        </div><!-- end #universal -->
    </div><!-- end #body -->
</body>
</html>
