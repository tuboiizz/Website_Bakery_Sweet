<?php include 'inc/header.php';?>

<?php 
if (isset($_GET['delpro'])) {
	$delId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delProduct = $ct->delProductByCart($delId);
}

 ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $ct->updateCartQuantity($cartId,$quantity);

    if ($quantity <=0) {
    	$delProduct = $ct->delProductByCart($cartId);
    }
}
 ?>
 <?php  
if (!isset($_GET['id'])) {
	echo "<meta http-equiv = 'refresh' content ='0;URL=?id=admin' />";
}
 ?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
			    	<?php 
			    	if (isset($updateCart)) {
			    		echo $updateCart;
			    	}

			    	if (isset($delProduct)) {
			    		echo $delProduct;
			    	}
			    	 ?>

						<table class="tblone">


							<tr>
								<th width="5%">SL</th>
								<th width="30%">Tên sản phẩm</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="15%">Tổng giá</th>
								<th width="10%">Hành động</th>
							</tr>
							<tr>

							<?php 

							$getPro = $ct->getCartProduct();
							if ($getPro) {
								$i = 0;
								$sum = 0;
								$qty = 0;
								while ($result = $getPro->fetch_assoc()) {
								
								$i++;

							 ?>
								<td><?php echo $i;?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><?php echo $result['price']; ?> VNĐ</td>
					<td>
						<form action="" method="post">

							<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
							<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
							<input type="submit" name="submit" value="Cập nhật"/>
						</form>
					</td>
								<td>
							 <?php
						$total = $result['price'] * $result['quantity'];
						echo $total;
						 ?> VNĐ
							

									</td>
								<td><a onclick="return confirm('Bạn có chắc muốn xóa!')" href="?delpro=<?php echo $result['cartId']; ?>">Xóa</a></td>
							</tr>
							
							<?php 
							$qty = $qty + $result['quantity'];
							$sum = $sum + $total;
							Session::set("qty",$qty);
							Session::set("sum",$sum);
							 ?>


						<?php } } ?>	
						</table>

						<?php
						$getData = $ct->checkCartTable();
							if ($getData){

								?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng cộng : </th>
								<td><?php echo $sum; ?> VNĐ</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng giá :</th>
								<td>  
									<?php 
									$vat = $sum * 0.1;
									$gtotal = $sum + $vat;
									echo $gtotal;
									 ?>
									  VNĐ
								</td>
							</tr>

					   </table>
					<?php }else{
						header("Location:index.php");
						//echo "Giỏ hàng trống! Hãy mua sắm ngay...";
					} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>
