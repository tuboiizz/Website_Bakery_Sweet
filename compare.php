<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
	header("Location:login.php");
}
 ?>
<style>
	
table.tblone img{height: 90px;width: 100px;}

</style>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>So sánh</h2>

						<table class="tblone">


							<tr>
								<th>SL</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Hình ảnh</th>
								<th>Hành động</th>
							</tr>
							<tr>

							<?php 
							$cmrId = Session::get("cmrId");
							$getPd = $pd->getCompareData($cmrId);
							if ($getPd) {
								$i = 0;
								while ($result = $getPd->fetch_assoc()) {
								
								$i++;

							 ?>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productName']; ?></td>
								<td>Tk. <?php echo $result['price']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><a href="details.php?proid=<?php echo $result['productId']; ?>">Xem</a></td>
								
							</tr>


						<?php } } ?>	
						</table>

					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%;text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>
