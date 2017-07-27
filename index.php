<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>
<script src="js/animation.js"></script>
<script type="text/javascript">
	function redirect(){
		window.location = "index3.php"
	}
</script>
</head>

<body onLoad="setTimeout('redirect()', 0)">
    <div id="body" style="display:none;">
    	<div id="intro">
          <div id="progress"></div>
          <div id="log"></div>
       	  <div id="step1">
           	<h1 id="text1">Introducing the box everyone’s been trying to <span class="green">think outside</span> of</h1>
            <div id="kubus1"></div>
          </div><!-- end #step1 -->
       	  <div id="step2">
           	<h1 id="text2">WELL, NOT EVERYONE</h1>
          </div><!-- end #step1 -->
       	  <div id="step3">
           	<h1 id="text3">We know every square centimeter of the box, inside and out<br /><span class="green">then we take it to the next level</span></h1>
            <div id="kubus2"></div>
          </div><!-- end #step1 -->
          <a href="index2.php" id="skip" class="greyBtn">SKIP &raquo;</a>
        </div><!-- end #intro -->
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
