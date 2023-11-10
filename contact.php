<?php include 'inc/header.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $fm->validation($_POST['name']);
	$email = $fm->validation($_POST['email']);
	$contact = $fm->validation($_POST['contact']);
	$message = $fm->validation($_POST['message']);
	

	$name = mysqli_real_escape_string($db->link, $name);
	$email = mysqli_real_escape_string($db->link, $email);
	$contact = mysqli_real_escape_string($db->link, $contact);
	$message = mysqli_real_escape_string($db->link, $message);

	$error = "";

	if (empty($name)) {
		$error = "Tên không được để trống!";
	} elseif (empty($email)) {
		$error = "Email không được để trống!";
	} elseif (empty($contact)) {
		$error = "Số điện thoại không được để trống!";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Địa chỉ Email không hợp lệ!";
	} elseif (empty($message)) {
		$error = "Chủ đề không được để trống!";
	} else {
		$query = "INSERT INTO tbl_contact (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')";

		$inserted_rows = $db->insert($query);

		if ($inserted_rows) {
			$msg = "Gửi tin nhắn thành công.";
		} else {
			$error = "Tin nhắn không được gửi!";
		}
	}
}

?>


 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Hỗ trợ trực tuyến</h3>
  				<p><span>24 giờ | 7 ngày trong tuần | 365 ngày trong năm &nbsp;&nbsp; Hỗ trợ kỹ thuật trực tuyến</span></p>
  				<p>Uy tín chất lượng đặt lên hàng đầu</p>
  			</div>
  				<img src="images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Liên hệ chúng tôi</h2>

				  <?php 
				if (isset($error)) {
					echo "<span style='color:red'>$error</span>";
				}

				if (isset($msg)) {
					echo "<span style='color:green'>$msg</span>";
				}


				?>
					    <form action="" method="post">
					    	<div>
						    	<span><label>TÊN</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>EMAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>SỐ ĐIỆN THOẠI</label></span>
						    	<span><input type="text" name="contact" value=""></span>
						    </div>
						    <div>
						    	<span><label>CHỦ ĐỀ</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="GỬI"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông tin công ty :</h2>
						    	<p>Gần đại học Thăng Long</p>
						   		<p>Nguyễn Xiển - Đại Kim - Hoàng Mai - Hà Nội</p>
				   		<p>Mobile: 0956 789 012</p>
				   		<p>Phone: 0867 890 123</p>
				 	 	<p>Email: <span>Bakerysweet@gmail.com</span></p>
				   		<p>Theo dõi trên: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php';?>
