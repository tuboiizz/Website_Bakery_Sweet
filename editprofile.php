<?php include 'inc/header.php';?>

<?php 
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
 ?>

<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->customerUpdate($_POST,$cmrId);
}

?> 

<style>
    
.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;margin-bottom: 10px;}
.tblone tr td{text-align: justify;}    
.tblone input[type="text"]{width: 400px;padding: 5px;font-size: 15px;}
</style>

 <div class="main">
    <div class "content">
        <div class="section group">
            <?php 
            $id = Session::get("cmrId");
            $getdata = $cmr->getCustomerData($id);
            if ($getdata) {
                while ($result = $getdata->fetch_assoc()) {
            

             ?>
             <form action="" method="post">
                <table class="tblone">
                    <?php 
                    if (isset($updateCmr)) {
                    
                    echo "<tr><td colspan='2'>".$updateCmr."</td></tr>";
                    }
                     ?>
                    <tr>
                        <td colspan="2"><h2>Cập nhật chi tiết hồ sơ</h2></td>
                    </tr>
                    <tr>
                        <td width="20%">Tên</td>
                        <td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $result['email'];?>"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>
                    </tr>
                    <tr>
                        <td>Thành phố</td>
                        <td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>
                    </tr>
                    <tr>
                        <td>Mã zip</td>
                        <td><input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>
                    </tr>
                    <tr>
                        <td>Quốc gia</td>
                        <td><input type="text" name="country" value="<?php echo $result['country'];?>"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Lưu"></td>
                    </tr>

                </table>
                </form>
            <?php }} ?>
        </div>
    </div>
    </div>
  <?php include 'inc/footer.php';?>
