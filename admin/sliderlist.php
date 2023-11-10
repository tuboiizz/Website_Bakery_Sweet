<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách trượt</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Không.</th>
					<th>Tiêu đề thanh trượt</th>
					<th>Hình ảnh thanh trượt</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>

				<tr class="odd gradeX">
					<td>01</td>
					<td>Tiêu đề của thanh trượt</td>
					<td><img src="" height="40px" width="60px"/></td>				
				<td>
					<a href="">Edit</a> || 
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa không!');" >Xóa</a> 
				</td>
					</tr>	
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
<?php include 'inc/footer.php';?>
