<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>
</head>

<?php 
if($_GET['menu']=='about'){?>
<body id="aboutPage">
<?php }else if($_GET['menu']=='services'){ ?>
<body id="servicesPage">
<?php }else if($_GET['menu']=='tools'){ ?>
<body id="toolsPage">
<?php }else if($_GET['menu']=='tools-smac'){ ?>
<body id="toolsPage">
<?php }else if($_GET['menu']=='tools-kana'){ ?>
<body id="toolsPage">
<?php }else if($_GET['menu']=='elaborate'){ ?>
<body id="elaboratePage">
<?php }else if($_GET['menu']=='clients'){ ?>
<body id="clientsPage">
<?php }else if($_GET['menu']=='case'){ ?>
<body id="casePage">
<?php }else if($_GET['menu']=='contact'){ ?>
<body id="contactPage">
<?php }else{ ?>
<body id="homePage">
<?php }?>
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
                    	<li class="services"><a href="careers.php">Careers</a></li>
                    	<li class="about"><a <?php if($_GET['menu']=='contact'){ ?> class="current" <?php } ?> href="index2.php?menu=contact">Contact</a></li>
                    </ul>
      			     <script language="javascript">setPage()</script>
                </div>
            </div><!-- end #header -->
			<?php 
            if($_GET['menu']=='about'){
                include("about.php");
            }else if($_GET['menu']=='services'){ 
                include("services.php");
            }else if($_GET['menu']=='tools'){ 
                include("tools.php");
            }else if($_GET['menu']=='tools-smac'){ 
                include("tools-smac.php");
            }else if($_GET['menu']=='tools-kana'){ 
                include("tools-kana.php");
            }else if($_GET['menu']=='elaborate'){ 
                include("elaborate.php");
            }else if($_GET['menu']=='clients'){ 
                include("clients.php");
            }else if($_GET['menu']=='case'){ 
                include("case.php");
            }else if($_GET['menu']=='contact'){ 
                include("contact.php");
            }else{ 
                include("home.php");
            }?>
            <div id="socialBox">
            	<a class="iconFacebook" href="https://www.facebook.com/kanadigital" target="_blank">&nbsp;</a>
            	<a class="iconYoutube" href="http://www.youtube.com/user/kanadigital" target="_blank">&nbsp;</a>
            	<a class="iconCareer" href="careers.php" target="_blank">&nbsp;</a>
            </div>
        </div><!-- end #universal -->
    </div><!-- end #body -->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-867847-49', 'kana.co.id');
	  ga('send', 'pageview');
	
	</script>
</body>
</html>