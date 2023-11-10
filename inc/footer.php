</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h4>Thông tin</h4>
						<ul>
						<li><a href="#">Giới thiệu về chúng tôi</a></li>
						<li><a href="#">Dịch vụ khách hàng</a></li>
						<li><a href="#"><span>Tìm kiếm nâng cao</span></a></li>
						<li><a href="#">Đơn đặt hàng và trả lại</a></li>
						<li><a href="#"><span>Liên hệ với chúng tôi</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tại sao nên mua hàng của chúng tôi</h4>
						<ul>
						<li><a href="about.php">Giới thiệu về chúng tôi</a></li>
						<li><a href="faq.php">Dịch vụ khách hàng</a></li>
						<li><a href="#">Chính sách quyền riêng tư</a></li>
						<li><a href="contact.php"><span>Sơ đồ trang web</span></a></li>
						<li><a href="defaults.php"><span>Cụm từ tìm kiếm</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài khoản của tôi</h4>
						<ul>
						<li><a href="contact.php">Đăng nhập</a></li>
						<li><a href="index.php">Xem giỏ hàng</a></li>
						<li><a href="#">Danh sách mong muốn của tôi</a></li>
						<li><a href="#">Theo dõi đơn hàng của tôi</a></li>
						<li><a href="faq.php">Trợ giúp</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên hệ</h4>
						<ul>
							<li><span>0956 789 012</span></li>
							<li><span>0867 890 123</span></li>
						</ul>
						<div class="social-icons">
							<h4>Theo chúng tôi</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			
			<div class="payment_top">
			  <div class="payment">
			<img src="images/payment.jpg" alt="payment" />
			</div>
			</div>
			
			<div class="copy_right">
				<p>Bakery-Sweet Online &amp; Bảo lưu mọi quyền </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>

</body>
</html>
