<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>
<style>
.psuccess{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 20px;}	
.psuccess h2{border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 10px;}
.psuccess p{line-height: 25px; text-align: left; font-size: 18px;}

</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="psuccess">
                <h2>Thành công</h2>
                <?php 
                $cmrId = Session::get("cmrId");
                $amount = $ct->payableAmount($cmrId);
                if ($amount) {
                    $sum = 0;
                    while ($result = $amount->fetch_assoc()) {
                        $price = $result['price'];
                        $sum = $sum + $price;
                    }
                }
                ?>
                <p>Tổng số tiền cần thanh toán (bao gồm VAT): 
                    <?php 
                    $vat = $sum * 0.1;
                    $total = $sum + $vat;
                    echo $total;
                    ?> VNĐ
                </p>
                <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đã được xử lý thành công. Chúng tôi sẽ liên hệ với bạn sớm để sắp xếp giao hàng. Dưới đây là chi tiết đơn hàng của bạn... <a href="orderdetails.php">Xem chi tiết tại đây...</a></p>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
