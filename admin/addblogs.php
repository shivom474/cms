<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>			
			<h2 align="center">Add blogs</h2>
			<div style="top:0px;left:710px; width:200px;position:relative">
				<ul >
					<li ><a href="admin.php">Welcome <?php echo $_SESSION['user'];?></a></li>
					<li ><a href="logout_admin.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="divcontent">
		<div id="sidemenu">
			<ul class="list-group">
				<li class="list-group-item"><a href="admin.php">Dashboard</a></li>
				<li class="list-group-item"><a href="manageblogs.php">Back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 30%; width:800px; height:600px; position:relative;">
			<form action="operator.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="addblogs">
				<table align="center">
					<tr><td>Blog Name</td><td><input name="data[title]" type="text" size=45></td></tr>
					<tr><td>Cover Image</td><td><input name="data[cover_image]" type="file" size=45></td></tr>
					<tr><td>Content</td><td><textarea name="data[content]" cols=34 rows=10 ></textarea></td></tr>
					<tr><td colspan=2 ALIGN="CENTER"><input type="submit" name="submit" value="Submit"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>