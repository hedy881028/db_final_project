<?php

	$user = 'root';
	$password = 'root';
	$db = 'attraction';
	$host = 'localhost';
	$port = 8889;
	
	$con = mysqli_connect($host, $user, $password, $db, $port);
	if(!$con){
		die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
	}

	$id=$_POST["data"];
	$content=$_POST["content"];
	$star=$_POST["star"];
	//$star=4;
	$time=date("Y:m:d H:i:s",time()+28800);
	$sqlcomment = "insert into comment(id,comments,stars,time) 
					values('".$id."','".$content."', '".$star."', '".$time."')";
					
	//echo "id: ", $id, "<br>";
	//echo $sqlcomment, "<br>";
	
	$resultcomment=0;
	if($content){
		
		$resultcomment=mysqli_query($con, $sqlcomment);
		//echo "resultcomment: ",$resultcomment, "<br>";
		if( $resultcomment){
			
			echo "<script type='text/javascript'>";
			echo "alert('新增留言成功');";
			//echo "location.href='index3.php';";
			echo "</script>";
			
		}
		else{
			echo "<script type='text/javascript'>";
			echo "alert('新增留言失敗');";
			//echo "location.href='index3.php';";
			echo "</script>";
		}
		
	}
	
	$sql1= "select w.name, w.description, w.tel, w.picture, w.website, w.remark
			from webpage as w
			where w.id='".$id."'";
	$sql2 = "select l.address, l.x, l.y
			from location as l
			where l.id='".$id."'";
	$sql3 = "select s.open_time, s.charge, s.parking
			from search as s
			where s.id='".$id."'";
	$sql4 = "select c.comments, c.stars, date_format(c.time,'%Y-%m-%d %H:%i:%s')
			from comment as c
			where c.id='".$id."'";

	$sql5 = "select avg(c.stars)
			from comment as c
			where c.id='".$id."'
			group by c.id";
		
	//echo "$sql1<br>";	
	
	$result1 = mysqli_query($con, $sql1);
	$result2 = mysqli_query($con, $sql2);
	$result3 = mysqli_query($con, $sql3);
	$result4 = mysqli_query($con, $sql4);
	$result5 = mysqli_query($con, $sql5);
	
	$row1 = mysqli_fetch_array($result1, MYSQLI_NUM);
	$row2 = mysqli_fetch_array($result2, MYSQLI_NUM);
	$row3 = mysqli_fetch_array($result3, MYSQLI_NUM);
	$row5 = mysqli_fetch_array($result5, MYSQLI_NUM);
	//$row4 = mysqli_fetch_array($result4, MYSQLI_NUM);
		
	echo "景點名稱：<br>";
	if($row1[0])
		echo "$row1[0]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "景點介紹：<br>";
	if($row1[1])
		echo "$row1[1]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "地址：<br>";
	if($row2[0])
		echo "$row2[0]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "連絡電話：<br>";
	if($row1[2])
		echo "$row1[2]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "開放時間：<br>";
	if($row3[0])
		echo "$row3[0]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "收費資訊：<br>";
	if($row3[1])
		echo "$row3[1]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "停車資訊：<br>";
	if($row3[2])
		echo "$row3[2]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
		
	echo "照片：<br>";
	if($row1[3])
		echo "<img src=\"$row1[3]\" width=500><br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "網站：<br>";
	if($row1[4])
		echo "<a href=\"$row1[4]\" target=\"_blank\">$row1[4]</a><br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
	
	echo "注意事項：<br>";
	if($row1[5])
		echo "$row1[5]<br>";
	else
		echo "暫無資料<br>";
	echo "<br>";
		
	//comment
	echo "評論：<br>";
	$row4_cnt = mysqli_num_rows($result4);
	if ($row4_cnt!=0) {
		printf("已經有%d筆評論囉！<br>", $row4_cnt);
		echo "平均 ", round($row5[0], 1), " 顆星<br><br>";
		
		$i=1;
		while ($row4 = mysqli_fetch_array($result4, MYSQLI_NUM)) {
		echo $i,". ",$row4[1],"顆星   ",$row4[0], " ----- ", $row4[2], "<br>";
		$i=$i+1;
		}	
		
		echo "<br><br><br>";		
	}
	else
		echo "尚未有評論！可以到下方新增評論ㄛ感謝你！<br><br>";
		
	mysqli_free_result($result1);
	mysqli_free_result($result2);
	mysqli_free_result($result3);
	mysqli_free_result($result4);
	
?>

<form target="_blank" action="index4.php" method="post">
  想查看附近幾公里內的景點呢：<input type="text" name="num">
  <input type="hidden" name="x_data" value="<?=$row2[1]?>">
  <input type="hidden" name="y_data" value="<?=$row2[2]?>">
  <input type="submit" value="查看景點">
</form>

<?php
	$string="我想要發表評論和評分：";
?>

<html>
	<head>
	<style type="text/css">
		input[type="radio"]{
			margin: 0 28.5px 0 28.5px;
		}
	</style>
	</head>
	<body>
		<?php echo $string; ?>
		<form action="index3.php" method="post">
			<img src="1star.jpg" name="star" alt="一顆星" title="一顆星" width="70">				  
			<img src="2stars.jpg" name="star" alt="二顆星" title="二顆星" width="70">
			<img src="3stars.jpg" name="star" alt="三顆星" title="三顆星" width="70">
			<img src="4stars.jpg" name="star" alt="四顆星" title="四顆星" width="70">
			<img src="5stars.jpg" name="star" alt="五顆星" title="五顆星" width="70"><br>
						
			<input type="radio" name="star" value="1" id="onestar">
			<input type="radio" name="star" value="2" id="twostar">
			<input type="radio" name="star" value="3" id="threestar">
			<input type="radio" name="star" value="4" id="fourstar">
			<input type="radio" name="star" value="5" id="fivestar"><br>
			
			<br><textarea name="content" style="width:370px;height:100px;"></textarea><br><br>
			<input type="hidden" name="data" value="<?=$id?>">
			<input type="submit" value="提交">
			
		</form>
	</body>
</html>


<?php
	mysqli_close($con);	
?>


