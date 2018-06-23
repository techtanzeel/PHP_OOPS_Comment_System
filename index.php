<?php 
	include_once 'controllers/Comment.php';
	$com = new Comment();
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<title>Comment System OOP</title>
 	<style>
 		.box{border: 5px solid #999;margin: 30px auto 0;padding: 20px;width: 600px;height: 180px;overflow: scroll;}
 		.box ul{margin: 0;padding: 0;list-style: none;}
 		.box li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
 		.box li:last-child{border-bottom: 0 dashed #ddd;}
 		.box span{color: #888;}
 	</style>
 </head>
 <body>
 	<div class="box">
 		<ul>
 			<?php 
 				$result = $com->index();
 				while ($data = $result->fetch_assoc()) {
 			 ?>
 			<li><b><?php echo $data['name']; ?><b> - <?php echo $data['comment'] ?> - <?php echo $com->dateFormat($data['comment_time']); ?></li>
 			<?php } ?>
 		</ul>
 	</div>
 	<center>
 		<?php 
 			if (isset($_GET['msg'])) {
 				$msg = $_GET['msg'];
 				echo "<span style='color:green;font-size:20px'>".$msg."</span>";
 			}
 		 ?>
 	<form action="post_comment.php" method="post">
 		<table>
 			<tr>
 				<td>Your Name:</td>
 				<td><input type="" name="name" placeholder="Please enter your name"></td>
 			</tr>
 			<tr>
 				<td>Comment:</td>
 				<td>
 					<textarea name="comment" rows="5" cols="30" placeholder="Please enter your comment"></textarea>
 				</td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" name="submit" value="Post"></td>
 			</tr>
 		</table>
 	</form>
 	<center>
 </body>
 </html>