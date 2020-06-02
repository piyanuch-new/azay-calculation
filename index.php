<!doctype html>
<html>
<head>
	<?php
	include "includes/meta.php";
	?>
	<!-- iosSlider plugin -->
	<script src = "js/jquery.iosslider.min.js"></script>
	<script>
	function choiceChange(args) {				
		$('.slider-choice .slideSelectors .item').removeClass('selected');
		$('.slider-choice .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');			
	}
	function genderChange(args) {			
	console.log(args.currentSlideNumber);	
		$('#box-gender .slideSelectors .item').removeClass('selected');
		$('#box-gender .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');			
	}
	$(document).ready(function() {
		$('.m1')
		.css({ 'bottom':-440 })
		.delay(500)
		.animate({'bottom':0}, 1000);

		$('.wm1')
		.css({ 'bottom':-380 })
		.delay(500)
		.animate({'bottom':0}, 1000);

		$('.box_welcome')
		.css({ 'width':440, 'height':450, 'opacity': 0})
		.delay(100)
		.animate({'width':364, 'height':374, 'opacity': 1}, 800);
		$(".next").click(function(){
			$(this).fadeOut();
			$(".txt_cal").fadeIn();
		});
		$("#box-welcome .b_txt_cal").click(function(){
			$("#box-welcome").fadeOut();
			$("#box-choice").fadeIn();
			if ($(window).width() < 481 ) {
				$('#box-choice .choiceSlider').iosSlider({
					responsiveSlides: true,
					desktopClickDrag: true,
					snapToChildren: true,
					infiniteSlider: true,
					navSlideSelector: '#box-choice .slideSelectors .item',
					onSlideChange: choiceChange,
					scrollbar: true,
					scrollbarContainer: '#box-choice .scrollbarContainer',
					scrollbarMargin: '0',
					scrollbarBorderRadius: '0',
					keyboardControls: true
				});
			}	
		});
		$("#box-choice input:radio").click(function(){
			var choice = $('input[name=choice]:checked').val(),
				input  = $('#box-calculator input[value='+choice+']'),
			    mainPrice = (parseInt(input.attr("data-price"))).toLocaleString();
			console.log(choice);
			$("#box-choice").fadeOut();
			$("#box-gender").fadeIn();
			input.attr('checked', true);
			$('.option input[name=option]:checked').attr('checked', false);
			$(".num_total input").val(mainPrice);
			$(".sum_brief h1 span").html(mainPrice);

			if ($(window).width() < 481 ) {
				$('#box-gender .iosSlider').iosSlider({
					responsiveSlides: true,
					desktopClickDrag: true,
					snapToChildren: true,
					infiniteSlider: true,
					navSlideSelector: '#box-gender .slideSelectors .item',
					onSlideChange: genderChange,
					scrollbar: true,
					scrollbarContainer: '#box-gender .scrollbarContainer',
					scrollbarMargin: '0',
					scrollbarBorderRadius: '0',
					keyboardControls: true
				});
			}	
		});
		$("#box-choice .btn-back").click(function(){
			$("#box-welcome").fadeIn();
			$("#box-choice").fadeOut();
		});
		$('#box-gender input:radio').click(function(){
			var gender = $('input[name=gender]:checked').val(),
				ageRang = $("#box-conclude").attr("data-age");

			$('#box-gender .label_gender').removeClass("active");
			$(this).closest(".label_gender").addClass("active");
			$(".age img").hide();
			$(".age #"+gender+"-"+ageRang).show();
			$("#box-age").fadeIn();
			$("#box-gender").fadeOut();	
			$("#box-calculator, #box-conclude").attr("data-gender", gender);
			$(".img_brief").html("<img src='images/brief-"+gender+"-3.png'>");
		});
		$("#box-gender .btn-back").click(function(){
			$("#box-choice").fadeIn();
			$("#box-gender").fadeOut();
		});
		$(".input_age .plus").click(function(){
			var oldage = parseInt($(".input_age input").val()),
				gender = $('input[name=gender]:checked').val(),
				ageRang = $("#box-conclude").attr("data-age");

			if (oldage == 69) {
				alert("เนื่องจากอายุมากกว่า 69 ปี ไม่สามารถคำนวณได้ค่ะ");
			}
			else{
				$(".input_age input").val(oldage+1);
				age = parseInt($(".input_age input").val());
				if (age == 6) {
					var ageRang = "2";
					$(".age #"+gender+"-1").hide();
					$(".age #"+gender+"-2").show();
				}
				if (age == 17) {
					var ageRang = "3";
					$(".age #"+gender+"-2").hide();
					$(".age #"+gender+"-3").show();
				}
				if (age == 23) {
					var ageRang = "4";
					$(".age #"+gender+"-3").hide();
					$(".age #"+gender+"-4").show();
				}
				if (age == 40) {
					var ageRang = "5";
					$(".age #"+gender+"-4").hide();
					$(".age #"+gender+"-5").show();
				}
				if (age == 55){
					var ageRang = "6";
					$(".age #"+gender+"-5").hide();
					$(".age #"+gender+"-6").show();
				}
				$(".img_brief").html("<img src='images/brief-"+gender+"-"+ageRang+".png'>");
				$("#box-conclude").attr("data-age", ageRang);
			}			
		});
		$(".input_age .minus").click(function(){
			var oldage = parseInt($(".input_age input").val()),
				gender = $('input[name=gender]:checked').val(),
				ageRang = $("#box-conclude").attr("data-age");
			if (oldage == 2) {
				alert("เนื่องจากอายุน้อยกว่า 2 ขวบ ไม่สามารถคำนวณได้ค่ะ");
			}
			else{
				$(".input_age input").val(oldage-1);
				age = parseInt($(".input_age input").val());
				if (age == 5) {
					var ageRang = 1;
					$(".age #"+gender+"-2").hide();
					$(".age #"+gender+"-1").show();
				}
				if (age == 16){
					var ageRang = 2;
					$(".age #"+gender+"-3").hide();
					$(".age #"+gender+"-2").show();
				}
				if (age == 22) {
					var ageRang = 3;
					$(".age #"+gender+"-4").hide();
					$(".age #"+gender+"-3").show();
				}
				if (age == 39) {
					var ageRang = 4;
					$(".age #"+gender+"-5").hide();
					$(".age #"+gender+"-4").show();
				}
				if (age == 54) {
					var ageRang = 5;
					$(".age #"+gender+"-6").hide();
					$(".age #"+gender+"-5").show();
				}
				$(".img_brief").html("<img src='images/brief-"+gender+"-"+ageRang+".png'>");
				$("#box-conclude").attr("data-age", ageRang);
			}			
		});
		$("#box-age .btn-back").click(function(){
			$("#box-gender").fadeIn();
			$("#box-age").fadeOut();
		});
		$("#box-age .btn-next").click(function(){
			$(".interactive").addClass("interactive_auto wrap_calculator");
			$("#box-calculator").fadeIn();
			$("#box-age").fadeOut();
		});
		// $(".box_calculator .item").click(function(){
		// 	$("#box-calculator .box_option").removeClass("disabled");
		// 	$(".option input[name=option]").attr("disabled", false);
		// });
		$('#box-calculator input:radio, #box-calculator input:checkbox').on('change', function() {
			var option 	  = $('.option input[name=option]:checked'),
				mainPrice = parseInt($('#box-calculator input[name=main]:checked').attr("data-price"));
			$(".num_total input").val(0);
			$(".txt_blink").hide();
			option.each(function(){
				var price = parseInt($(this).attr("data-price")),
				    id = $(this).val();
				console.log(id, price);
				$("#"+id).show();
				$(".num_total input").val(parseInt($(".num_total input").val())+price);
			});
			var totalPrice = (parseInt($(".num_total input").val())+mainPrice).toLocaleString();
			$(".num_total input").val(totalPrice);
			$(".sum_brief h1 span").html(totalPrice);
			console.log(totalPrice);
		});
		$("#box-calculator .btn-back").click(function(){
			$(".interactive").removeClass("interactive_auto wrap_calculator");
			$("#box-age").fadeIn();
			$("#box-calculator").fadeOut();
		});
		$("#box-calculator .btn-next").click(function(){
			var main = $('#box-calculator input[name=main]:checked').val();
			$(".interactive").removeClass("wrap_calculator").addClass("wrap_conclude");
			$("#box-conclude").fadeIn();
			$("#box-calculator").fadeOut();
			if (main == "main-1") {
				var liveYear = '89',
					liveMoney = '500,000',
					deadMoney = '250,000';
			}
			if (main == "main-2") {
				var liveYear = '40',
					liveMoney = '300,000',
					deadMoney = '50,000';
			}
			if (main == "main-3") {
				var liveYear = '35',
					liveMoney = '200,000',
					deadMoney = '200,000';
			}
			$("#live p span").html(liveYear);
			$("#live b span").html(liveMoney);
			$("#dead p span").html(liveYear);
			$("#dead b span").html(deadMoney);
		});
		$("#box-conclude .btn-back").click(function(){
			$(".interactive").removeClass("interactive_auto wrap_conclude");
			$("#box-choice").fadeIn();
			$("#box-conclude").fadeOut();			
			if ($(window).width() < 481 ) {
				$('#box-choice .choiceSlider').iosSlider({
					responsiveSlides: true,
					desktopClickDrag: true,
					snapToChildren: true,
					infiniteSlider: true,
					navSlideSelector: '#box-choice .slideSelectors .item',
					onSlideChange: choiceChange,
					scrollbar: true,
					scrollbarContainer: '#box-choice .scrollbarContainer',
					scrollbarMargin: '0',
					scrollbarBorderRadius: '0',
					keyboardControls: true
				});
			}
		});
		$("#box-conclude .btn-next").click(function(){
			$(".interactive").removeClass("wrap_conclude").addClass("wrap_calculator");
			$("#box-calculator").fadeIn();
			$("#box-conclude").fadeOut();
		});
	});
	</script>
</head>
<body>
	<div class="wrap-interactive">
		<form class="box_interactive">
			<div class="interactive">
				<div id="box-welcome">					
					<div class="m1">
						<img src="images/m1.png">
					</div>
					<div class="wm1">
						<img src="images/wm1.png">
					</div>
					<a class="next">
						<div class="box_welcome">
							<img src="images/bg_icon.png">
						</div>
						<div class="box_welcome-s">
							<img src="images/logo.png">
						</div>
					</a>
					<div class="txt_cal">
						<header>TERMS & CONDITIONS	</header>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	
						</p>
						<p>
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
						</p>
						<a class="btn b_txt_cal">Next</a>
					</div>	
				</div>
				<div id="box-choice" class="stage">
					<div class="h h_choice">เลือกคำนวณตามแบบประกัน</div>
					<div class="choice">
						<label class="b_choice">
							<input type="radio" name="choice" value="main-1">
							<img src="images/ch-1.png">
						</label>
						<label class="b_choice">
							<input type="radio" name="choice" value="main-2">
							<img src="images/ch-2.png">
						</label>
						<label class="b_choice">
							<input type="radio" name="choice" value="main-3">
							<img src="images/ch-3.png">
						</label>
					</div>
					<div class="choiceHeight">				
						<div class="slider-choice">				
							<div class="choiceSlider">					
								<div class="slider">	
									<label class="item">
										<input type="radio" name="choice" value="choice-1">
										<img src="images/ch-1.png">
									</label>
									<label class="item">
										<input type="radio" name="choice" value="choice-2">
										<img src="images/ch-2.png">
									</label>
									<label class="item">
										<input type="radio" name="choice" value="choice-3">
										<img src="images/ch-3.png">
									</label>									
								</div>					
							</div>					
							<div class="slideSelectors">					
								<div class="item selected"></div>						
								<div class="item"></div>	
								<div class="item"></div>					
							</div>					
							<div class="scrollbarContainer"></div>					
						</div>			
					</div>
					<a class="btn-back b_txt_cal">Back</a>
				</div>
				<div id="box-gender" class="stage">					
					<div class="h h_gender">เลือกเพศของคุณ</div>
					<div class="gender">
						<label class="label_gender">
							<div class="type_gender">
								<img src="images/m2.png">
								<div class="pic_gender"><img src="images/male.png"></div>
							</div>
							<input type="radio" name="gender" value="male" checked="checked">
						</label>
						<label class="label_gender">
							<div class="type_gender">
								<img src="images/wm2.png">
								<div class="pic_gender"><img src="images/female.png"></div>
							</div>
							<input type="radio" name="gender" value="female">
						</label>	
					</div>		
					<div class="fluidHeight">				
						<div class="sliderContainer">				
							<div class="iosSlider">					
								<div class="slider">						
									<div class="item">
										<label class="label_gender">
											<div class="type_gender">
												<img src="images/m2.png">
												<div class="pic_gender"><img src="images/male.png"></div>
											</div>
											<input type="radio" name="gender" value="male" checked="checked">
										</label>
									</div>							
									<div class="item">	
										<label class="label_gender">
											<div class="type_gender">
												<img src="images/wm2.png">
												<div class="pic_gender"><img src="images/female.png"></div>
											</div>
											<input type="radio" name="gender" value="female">
										</label>	
									</div>						
								</div>					
							</div>					
							<div class="slideSelectors">					
								<div  class="item selected"></div>						
								<div class="item"></div>				
							</div>					
							<div class="scrollbarContainer"></div>					
						</div>			
					</div>			
					<a class="btn-back b_txt_cal">Back</a>
				</div>
				<div id="box-age" class="stage">				
					<div class="h h_age">เลือกอายุของคุณ</div>
					<div class="age">
						<!-- male -->						
						<img src="images/age1m.png" id="male-1">
						<img src="images/age2m.png" id="male-2">
						<img src="images/age3m.png" id="male-3">
						<img src="images/age4m.png" id="male-4">
						<img src="images/age5m.png" id="male-5">
						<img src="images/age6m.png" id="male-6">
						
						<!-- female -->
						<img src="images/age1fm.png" id="female-1">
						<img src="images/age2fm.png" id="female-2"> 
						<img src="images/age3fm.png" id="female-3">
						<img src="images/age4fm.png" id="female-4">
						<img src="images/age5fm.png" id="female-5">
						<img src="images/age6fm.png" id="female-6">
					</div>
					<div class="txt_age">
						<div class="t_age">อายุ</div>
						<div class="input_age">
							<a class="plus"></a>
							<input type="text" value="17" readonly="">
							<a class="minus"></a>
						</div>				
						<div class="t_age">ปี</div>
					</div>		
					<a class="btn-back b_txt_cal">Back</a>
					<a class="btn-next b_txt_cal">Next</a>
				</div>
				<div id="box-calculator" class="stage" data-gender="">
					<div class="box_calculator">
						<div class="h_calculator"><img src="images/h_calculator.png"></div>
						<div class="main">
							<label class="item">
								<div class="img">
									<img src="images/item1m.png" class="male">
									<img src="images/item1fm.png" class="female">
								</div>
								<div class="popup">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<input type="radio" class="checkbox" name="main" value="main-1" data-price="10000">
								<span></span>
								<div class="txt_item">
									สัญญาหลัก มาย โฮล ไลฟ์ A90/21<br>
									<b>10,000</b>
								</div>
							</label>
							<label class="item">
								<div class="img">
									<img src="images/item2m.png" class="male">
									<img src="images/item2fm.png" class="female">
								</div>
								<div class="popup">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<input type="radio" class="checkbox" name="main" value="main-2" data-price="20000">
								<span></span>
								<div class="txt_item">
									สุขภาพปลดล็อค<br>
									<b>20,000</b>
								</div>
							</label>
							<label class="item">
								<div class="img">
									<img src="images/item3m.png" class="male">
									<img src="images/item3fm.png" class="female">
								</div>
								<div class="popup">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</div>
								<input type="radio" class="checkbox" name="main" value="main-3" data-price="30000">
								<span></span>
								<div class="txt_item">
									คุ้มครองผู้ป่วยใน<br>
									<b>30,000</b>
								</div>
							</label>
						</div>					
					</div>
					<div class="box_option">
						<div class="h h_calculator">ความคุ้มครองเพิ่มเติมอื่นๆ ที่ท่านสามารถเลือกซื้อเพิ่มได้</div>
						<label class="option">
							<div class="img">
								<img src="images/option1m.png" class="male">
								<img src="images/option1fm.png" class="female">
							</div>		
							<div class="popup">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>							
							<input type="checkbox" class="checkbox" name="option" value="option-opd" data-price="5000">
							<span></span>
							<div class="txt_option">
								คุ้มครองผู้ป่วยนอก<br>
								<b>5,000</b>
							</div>
						</label>
						<label class="option">						
							<div class="img">
								<img src="images/option2m.png" class="male">
								<img src="images/option2fm.png" class="female">
							</div>
							<div class="popup">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>						
							<input type="checkbox" class="checkbox" name="option" value="option-cancer" data-price="5000">
							<span></span>
							<div class="txt_option">
								คุ้มครองโรคมะเร็ง<br>
								<b>5,000</b>
							</div>
						</label>					
						<label class="option">											
							<div class="img">
								<img src="images/option3m.png" class="male">
								<img src="images/option3fm.png" class="female">
							</div>
							<div class="popup">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<input type="checkbox" class="checkbox" name="option" value="option-ci" data-price="5000">
							<span></span>
							<div class="txt_option">
								คุ้มครอง 48 โรคร้าย<br>
								<b>5,000</b>
							</div>
						</label>
						<label class="option">		
							<div class="img">
								<img src="images/option4m.png" class="male">
								<img src="images/option4fm.png" class="female">
							</div>
							<div class="popup">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>
							<input type="checkbox" class="checkbox" name="option" value="option-ipd" data-price="5000">
							<span></span>
							<div class="txt_option">
						        ชดเชยผู้ป่วยใน<br>
								<b>5,000</b>
							</div>
						</label>
						<div class="input-option">
							<div class="txt_total">เบี้ยรวม</div>
							<div class="num_total">
								<input type="text" name="" value="0" readonly="">
							</div>
						</div>
						<label class="option">						
							<div class="img">
								<img src="images/option5m.png" class="male">
								<img src="images/option5fm.png" class="female">			
							</div>
							<div class="popup">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							</div>					
							<input type="checkbox" class="checkbox" name="option" value="option-pa" data-price="5000">
							<span></span>
							<div class="txt_option">
								คุ้มครองกรณีเสียชีวิตจากอุบัติเหตุ<br>
								<b>5,000</b>
							</div>
						</label>
					</div>		
					<a class="btn-back b_txt_cal">Back</a>
					<!-- <a href="#" class="detail_more">ต้องการข้อมูลเพิ่มเติม</a> -->
					<a class="btn-next b_txt_cal">Next</a>
				</div>
				<div id="box-conclude" class="stage" data-gender="" data-age="3">
					<div class="h h_brief">สรุปผลประโยชน์ที่คุณจะได้รับ</div>
					<div class="brief_left">
						<div class="txt_brief" id="live">
							<p>
								ได้เงินก้อน เมื่ออายุครบ <span>0</span> ปี
							</p>
							<b>ขั้นต่ำ <span>0</span> บาท</b>
						</div>
						<div class="txt_brief" id="dead">
							<p>
								ครอบครัวได้เงินก้อนหากเสียชีวิต<br>
								ก่อนอายุ <span>0</span> ปี
							</p>
							<b>ขั้นต่ำ <span>0</span> บาท</b>
						</div>
					</div>
					<div class="brief_right">
						<div class="img_brief"></div>
						<div class="blink">
							<img src="images/blink-1.png" class="flash-1">
							<img src="images/blink-2.png" class="flash-2">
							<img src="images/blink-3.png" class="flash-3">
						</div>
						<div class="txt_blink blink1" id="option-ipd">
							<img src="images/blink-ipd-m.png" class="male">
							<img src="images/blink-ipd-fm.png" class="female">
						</div>
						<div class="txt_blink blink2" id="option-pa">
							<img src="images/blink-pa-m.png" class="male">
							<img src="images/blink-pa-fm.png" class="female">
						</div>
						<div class="txt_blink blink3" id="option-cancer">
							<img src="images/blink-cancer-m.png" class="male">
							<img src="images/blink-cancer-fm.png" class="female">
						</div>
						<div class="txt_blink blink4" id="option-opd">
							<img src="images/blink-opd-m.png" class="male">
							<img src="images/blink-opd-fm.png" class="female">
						</div>
						<div class="txt_blink blink5" id="option-ci">
							<img src="images/blink-ci-m.png" class="male">
							<img src="images/blink-ci-fm.png" class="female">
						</div>
					</div>
					<div class="sum_brief">
						เงินที่ต้องออมในแต่ละเดือน
						<h1><span></span> บาท</h1>
					</div>			
					<a class="btn-back b_txt_cal">เลือกโปรดักอื่น</a>
					<!-- <a class="detail_more b_cen">ต้องการข้อมูลเพิ่มเติม</a> -->
					<a class="btn-next b_txt_cal">ลองคำนวณใหม่</a>
				</div>
			</div>
		</form>		
	</div>	
</body>
</html>
