<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Hộp thư đến</h2>

<?php 
if (isset($_GET['seenid'])) {
	$seenid = $_GET['seenid'];

	$query = "UPDATE tbl_contact 
        SET
        status = '1'

        WHERE id = '$seenid'";
        $updated_row = $db->update($query);

if ($updated_row) {
    
    echo "<span class='success'>Tin nhắn được gửi trong hộp nhìn thấy.</span>";
} else {

      echo "<span class='error'>Something Wrong!</span>";
}
    

}

?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số sê-ri</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Điện thoại</th>
							<th>Tin nhắn</th>
							<th>Ngày</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>

			<?php

			$query = "select * from tbl_contact where status='0' order by id desc";
			$msg = $db->select($query);
			if ($msg) {

			$i=0;
			while ($result = $msg->fetch_assoc()) {
			   $i++;

           ?>	


		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['name'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $result['contact'];?></td>
			<td><?php echo $fm->textShorten($result['message'],30);?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			<td>
				<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">Xem</a> || 
				<a href="replymsg.php?msgid=<?php echo $result['id'];?>">Hồi đáp</a>||
				<a onclick="return confirm('Bạn có chắc chắn Di chuyển tin nhắn!');" href="?seenid=<?php echo $result['id'];?>">Đã xem</a> 
			</td>
		</tr>
						
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>

             <div class="box round first grid">
                <h2>Đã xem tin nhắn</h2>


 <?php  
if (isset($_GET['delid'])) {
   $delid = $_GET['delid'];
   $delquery = "delete from tbl_contact where id = '$delid'";
   $deldata = $db->delete($delquery);
   if ($deldata) {
      echo "<span class='success'>Đã xóa tin nhắn thành công.</span>";
   } else {

     echo "<span class='error'>Tin nhắn chưa bị xóa.</span>";
   }

}

?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số sê-ri</th>
							<th>Tên</th>
							<th>Email</th>
							<th>Điện thoại</th>
							<th>Tin nhắn</th>
							<th>Ngày</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>

			<?php

			$query = "select * from tbl_contact where status='1' order by id desc";
			$msg = $db->select($query);
			if ($msg) {

			$i=0;
			while ($result = $msg->fetch_assoc()) {
			   $i++;

           ?>	


		<tr class="odd gradeX">
			<td><?php echo $i;?></td>
			<td><?php echo $result['name'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $result['contact'];?></td>
			<td><?php echo $fm->textShorten($result['message'],30);?></td>
			<td><?php echo $fm->formatDate($result['date']);?></td>
			<td>

				<a href="viewmsg.php?msgid=<?php echo $result['id'];?>">Xem</a> || 
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa không !');" href="?delid=<?php echo $result['id'];?>">Xóa</a> 
				
			</td>
		</tr>
						
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>



        </div>


    <script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });
  </script>

  

 <?php include 'inc/footer.php'; ?>
