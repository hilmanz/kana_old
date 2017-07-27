
$(window).load(function(){
	function text1(){
		$('#text1').delay(3000).animate({'left':'+=1000'},1000)
		$('#text2').animate({opacity:0},0)
		$('#text3').animate({opacity:0},0)
		$('#kubus2').animate({opacity:0},0)
	}
	function text2(){
		$('#text2').delay(4000).animate({opacity:1},500).delay(1000).animate({'left':'+=1000'},1000)
	}
	function text3(){
		$('#text3').delay(7000).animate({opacity:1},4000).delay(1000)
		$('#kubus1').delay(7000).animate({opacity:0},2000)
		$('#kubus2').delay(7000).animate({opacity:1})
	}
	text1();
	text2();
	text3();
});
