<?php
    $title="Tourist Attraction";
    $string="台灣旅遊景點網站";
	$string1="條件篩選";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<style>
			.word
			{
				text-align: center;
				font-size: 30px;
				font-family: verdana;
			}
			.word1
			{
				font-size: 20px;
				font-family: verdana;
			}
	    </style>
		
        <title>
		    <?php echo $title; ?>
		</title>
    </head>
	
    <body>
	    <div class="word">
            <?php echo $string; ?>
		</div>
		
		<div class="word1">
            <?php echo $string1; ?>
		</div>
		
		<form action="index2.php" method="post">
			請選擇地區資訊&nbsp <select name="region">
				<option value="none">不限</option>
				<option value="基隆市">基隆市</option>
				<option value="臺北市">臺北市</option>
				<option value="新北市">新北市</option>
				<option value="桃園市">桃園市</option>
				<option value="新竹市">新竹市</option>
				<option value="新竹縣">新竹縣</option>
				<option value="苗栗縣">苗栗縣</option>
				<option value="臺中市">臺中市</option>
				<option value="南投縣">南投縣</option>
				<option value="彰化縣">彰化縣</option>
				<option value="雲林縣">雲林縣</option>
				<option value="嘉義市">嘉義市</option>
				<option value="嘉義縣">嘉義縣</option>
				<option value="臺南市">臺南市</option>
				<option value="高雄市">高雄市</option>
				<option value="屏東縣">屏東縣</option>
				<option value="宜蘭縣">宜蘭縣</option>
				<option value="花蓮縣">花蓮縣</option>
				<option value="臺東縣">臺東縣</option>
				<option value="澎湖縣">澎湖縣</option>
				<option value="金門縣">金門縣</option>
				<option value="連江縣">連江縣</option>
			</select>&nbsp&nbsp
			
			請選擇開放時間&nbsp <select name="open_time">
				<option value="none">不限</option>
				<option value="週一">週一</option>
				<option value="週二">週二</option>
				<option value="週三">週三</option>
				<option value="週四">週四</option>
				<option value="週五">週五</option>
				<option value="週六">週六</option>
				<option value="週日">週日</option>
			</select>&nbsp&nbsp
			
			請選擇停車資訊&nbsp <select name="parking">
				<option value="none">不限</option>
				<option value="停車場">停車場</option>
				<option value="路邊">路邊</option>
			</select>&nbsp&nbsp
			
			請選擇收費資訊&nbsp <select name="ticket">
				<option value="none">不限</option>
				<option value="免費">免費</option>
				<option value="1">1-100元</option>
				<option value="101">101-200元</option>
				<option value="201">201-400元</option>
				<option value="401">400元以上</option>
				<option value="請電洽">請電洽</option>
			</select>&nbsp&nbsp
			
			請選擇景點分類&nbsp <select name="class">
				<option value="none">不限</option>
				<option value="公園綠地">公園綠地</option>
				<option value="主題遊樂園">主題遊樂園</option>
				<option value="觀光商圈">觀光商圈</option>
				<option value="藝術空間">藝術空間</option>
				<option value="歷史古蹟">歷史古蹟</option>
				<option value="觀光工廠">觀光工廠</option>
				<option value="戶外運動">戶外運動</option>
				<option value="花園農場">花園農場</option>
				<option value="自然之旅">自然之旅</option>
				<option value="教育資源">教育資源</option>
				<option value="特色館區">特色館區</option>
				<option value="休閒娛樂">休閒娛樂</option>
			</select>&nbsp&nbsp
			
			請選擇排序方式&nbsp <select name="order">
				<option value="none">預設</option>
				<option value="south">南到北</option>
				<option value="north">北到南</option>
				<option value="east">東到西</option>
				<option value="west">西到東</option>
			</select>&nbsp&nbsp
			
			<input type="submit" value="搜尋">
		</form>
		
    </body>
</html>

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
	
	$city=$_POST["region"];
	$type=$_POST["class"];
	$charge=$_POST["ticket"];
	$open=$_POST["open_time"];
	$car=$_POST["parking"];
	$order=$_POST["order"];
	
	
	$sql = "select i.id, w.name 
			from( 
				select l.id as id, l.x as x, l.y as y
				from location as l, search as s
				where l.id=s.id ";
	
	if($city!="none"){
		$sql=$sql."and l.city='".$city."' ";
	}
	
	if($type!="none"){
		$sql=$sql."and s.type='".$type."' ";
	}
	
	if($charge!="none"){
		if( $charge=="請電洽")
			$sql=$sql."and s.charge='".$charge."' ";
		if( $charge=="免費")
			$sql=$sql."and s.charge='".$charge."' ";
		if( $charge=="1")
			$sql=$sql."and substring( s.charge, 1, length(s.charge)-1) between 1 and 100 ";
		if( $charge=="101")
			$sql=$sql."and substring( s.charge, 1, length(s.charge)-1) between 101 and 200 ";
		if( $charge=="201")
			$sql=$sql."and substring( s.charge, 1, length(s.charge)-1) between 201 and 400 ";
		if( $charge=="401")
			$sql=$sql."and substring( s.charge, 1, length(s.charge)-1)>400 ";
			
	}
	
	
	if($open!="none"){
		if( $open=="週一"){
			$close1="%週一公休%";
			$close2="%平日公休%";
		}
		if( $open=="週二"){
			$close1="%週二公休%";
			$close2="%平日公休%";
		}
		if( $open=="週三"){
			$close1="%週三公休%";
			$close2="%平日公休%";
			}
		if( $open=="週四"){
			$close1="%週四公休%";
			$close2="%平日公休%";
		}
		if( $open=="週五"){
			$close1="%週五公休%";
			$close2="%平日公休%";
		}
		if( $open=="週六"){
			$close1="%週六公休%";
			$close2="%假日公休%";
		}
		if( $open=="週日"){
			$close1="%週日公休%";
			$close2="%假日公休%";
		}
		
		$sql=$sql."and s.open_time not like '".$close1."' and s.open_time not like '".$close2."' ";
	}
	
	if($car!="none"){
		$sql=$sql."and s.parking='".$car."' ";
			
	}
	
	
	$sql=$sql.") as i, webpage as w
			where w.id=i.id	";
			
	if( $order=="none"){
		$sql=$sql."order by i.id";
	}
	if( $order=="north"){
		$sql=$sql."order by i.y desc";
	}
	if( $order=="south"){
		$sql=$sql."order by i.y asc";
	}
	if( $order=="east"){
		$sql=$sql."order by i.x desc";
	}
	if( $order=="west"){
		$sql=$sql."order by i.x asc";
	}
	

	
	
	/*
	$sql = "select w.name, i.x, i.y 
			from( 
				select l.id, l.x, l.y
				from location as l, search as s
				where l.id=s.id
				and l.city='".$city."'
				and s.type='".$type."'
				) as i, webpage as w
			where w.id=i.id	
			order by i.id";
			
*/
	
	//echo "$sql<br>";
	
?>

<?php			
	$result = mysqli_query($con, $sql);
	
	if ($result) {	
		/* determine number of rows result set */
		//$col_cnt = mysqli_num_fields($result);
		$row_cnt = mysqli_num_rows($result);
		//printf("Result set has %d columns.<br>", $col_cnt);
		echo "<br>";
		printf("有%d筆符合條件的景點資料<br><br>", $row_cnt);
	
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
			
?>

<form target="_blank" action="index3.php" method="post">
  <input type="hidden" name="data" value="<?=$row[0]?>">
  <input type="submit" value="查看"><nobr>
</form>

<?php
			echo $row[1], "<br>";
			//print_r( $row);
		}
		
		/* close result set */
		mysqli_free_result($result);
	}
	mysqli_close($con);
?>

