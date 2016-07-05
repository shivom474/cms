<?php 	
	include "includes/header.php";
	include "includes/id_check.php";
	//include "../includes/config.php";
	isset($_GET['page'])?$page_no=$_GET['page']:$page_no=1;
	$id=$_SESSION['id'];
	$str_count="select count(id) as user_count from blogs where delete_status=0 and status=2";
	$result_count=$con->query($str_count);
	if($row=$result_count->fetch_assoc())
	{
		$records=$row['user_count'];
	}
	$no_page=ceil($records/10);
	$l1=($page_no-1)*10;
	$l2=10;
	$str_blog="select * from blogs where delete_status=0 and status=2 limit ".$l1.",".$l2;
	$result_blog=$con->query($str_blog);
	//var_dump($result_blog);exit;
?>
			<h2>Activate blogs</h2>
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
				<li class="list-group-item"><a href="addblogs.php">Add blogs</a></li>
				<li class="list-group-item"><a href="activateblogs.php">Activate blogs</a></li>
			</ul>
			<ul class="list-group">
				<li class="list-group-item"><a href="manageblogs.php">back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 30%; width:800px; height:450px; position:relative;">
				<?php 
					if($result_blog->num_rows>0)
					{
						
						echo "<table  align='center' class='table' >
						<tr><th>Cover Image</th><th>User Id</th><th>Title</th><th>Content</th><th colspan=2 align='center'>Action</tr></tr>";
						while($row = $result_blog->fetch_assoc())
						{
							echo "<tr class='danger'>";
							if($row["cover_image"]!="" && file_exists("../assets/upload/".$row["cover_image"])) 
							{ 
								echo "<td style='width:8%;'><img src='../assets/upload/".$row['cover_image'].'?'.rand(1000000, 2000000)."' height=40px width=40px/></td>";
							} 
							else 
							{
								echo "<td style='width:8%;'><img src='../assets/images/no-user.gif' height=40px width=40px/></td>";
							} 
							echo "<td class='td' style='width:8%;'>" . $row['user_id'] . "</td>";
							echo "<td class='td' style='width:20%;'>" . $row['title'] . "</td>";
							echo "<td class='td' >" . substr($row['content'],0,50) . "....</td>";
							echo "<td class='td' style='width:8%;' align='center'><a href='viewblog_activate.php?blog_id=".$row['id']."'><img src='../assets/images/view.jpg' height=15px width=15px/></a></td>";
							echo "<td class='td' style='width:8%;' align='center'><a href='operator.php?action=deleteblog&data=".$row['id']."' onclick='return confirmation();'><img src='../assets/images/delete.jpg' height=15px width=15px /></a></td>";
							//echo "<td class='td' style='width:8%;' align='center'><a href='operator.php?action=activateblog&data=".$row['id']."'><img src='../assets/images/view.jpg' height=15px width=15px/></a></td>";
							echo "</tr>";
						}
					
				
						echo "<tr><td colspan=10 align='center' border=0>";
					?>
						<?php 
							if($page_no>1)
							{
						?>
							<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no-1) ;?>"><<</a>
						<?php }for($i=1;$i<=$no_page;$i++) {?>
							<a href="<?php echo $_SERVER['PHP_SELF']."?page=".$i ;?>"><?php echo $i;?></a>
						<?php 
							} 
							if($page_no<$no_page)
							{
						?>
							<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no+1) ;?>">>></a>
						<?php	
							}
							}
					else
					{
						echo "<p>no records</p>";
					}
					?>
					</td></tr>
			</table>
		</div>
	</div>
</body>
</html>