

<div class="footer">
	<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">
						<a href="index.html"><img src="img/dribbble.png" alt="" height="30"></a>
						<p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
					</div>
					
					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class=" in">
							<li><a href="#">About</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Customize Shirt</a></li>
						</ul>
						<ul class="in in1">
							<li><a href="#">Login</a></li>
							<li><a href="#">Order</a></li>
							<li><a href="#">Sign up</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Tags</h6>
						<ul class="tag-in">
							<li><a href="#">Lorem</a></li>
							<li><a href="#">Sed</a></li>
							<li><a href="#">Ipsum</a></li>
							<li><a href="#">Contrary</a></li>
							<li><a href="#">Chunk</a></li>
							<li><a href="#">Amet</a></li>
							<li><a href="#">Omnis</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-middle-in">
						<h6>Newsletter</h6>
						<span>Sign up for News Letter</span>
							<form>
								<input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
								<input type="submit" value="Subscribe">	
							</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<ul class="footer-bottom-top">
						<li><a href="#"><img src="img/f1.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="img/f2.png" class="img-responsive" alt=""></a></li>
						<li><a href="#"><img src="img/f3.png" class="img-responsive" alt=""></a></li>
					</ul>
					<p class="footer-class">© 2018 | Shirtdesign </p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="build/cdn/js/slider.js"></script>
		<script src="fabric.js"></script>
		<script src="build/cdn/js/init.js"></script>

		<script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});

			$(document).ready(function() {
				$('.color-choose input').on('click', function() {
					var headphonesColor = $(this).attr('data-image');
					$('.left-column img[data-image = ' + headphonesColor + ']').addClass('active');
					$(this).addClass('active');
				});
				$(".cable-choose #first").trigger( "onclick" );
				
				$('#sleeves').each(function(i) {
					$(this).find('button').click(function(){
						$('#sleeves button').removeClass('active');
						$(this).addClass('active');
					})
				});

				$('#collars').each(function(i) {
					$(this).find('button').click(function(){
						$('#collars button').removeClass('active');
						$(this).addClass('active');
					})
				})
			});
		</script>
		


  </body>
</html>
