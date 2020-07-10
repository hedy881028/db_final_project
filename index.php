<?php
    $title="Tourist Attraction";
    $string="台灣旅遊景點網站";
	$string1="條件篩選";
	$string2="地圖篩選";
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
			
			<input type="submit" value="搜尋"><br><br>
		</form>
		
		<div class="word1">
            <?php echo $string2; ?>
		</div>
		
		<form action="index5.php" method="post">
			<div style="position:relative">
				<input type=image src="Taiwan_map.jpg" name="sub" width="500">
				<input type="submit" value="臺北市" name="sub" style="position:absolute; left:300px; top:100px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="新北市" name="sub" style="position:absolute; left:285px; top:120px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="基隆市" name="sub" style="position:absolute; left:350px; top:80px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="宜蘭縣" name="sub" style="position:absolute; left:350px; top:160px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="桃園市" name="sub" style="position:absolute; left:270px; top:145px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="新竹縣" name="sub" style="position:absolute; left:270px; top:175px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="新竹市" name="sub" style="position:absolute; left:210px; top:175px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="苗栗縣" name="sub" style="position:absolute; left:230px; top:210px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="臺中市" name="sub" style="position:absolute; left:260px; top:240px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="彰化市" name="sub" style="position:absolute; left:220px; top:290px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="南投縣" name="sub" style="position:absolute; left:300px; top:290px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="雲林縣" name="sub" style="position:absolute; left:220px; top:320px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="嘉義市" name="sub" style="position:absolute; left:230px; top:360px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="嘉義縣" name="sub" style="position:absolute; left:270px; top:340px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="臺南市" name="sub" style="position:absolute; left:250px; top:400px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="高雄市" name="sub" style="position:absolute; left:310px; top:360px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="屏東縣" name="sub" style="position:absolute; left:330px; top:430px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="花蓮縣" name="sub" style="position:absolute; left:380px; top:240px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="臺東縣" name="sub" style="position:absolute; left:380px; top:320px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="澎湖縣" name="sub" style="position:absolute; left:90px; top:360px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="金門縣" name="sub" style="position:absolute; left:80px; top:135px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
				<input type="submit" value="連江縣" name="sub" style="position:absolute; left:80px; top:60px; width:50px;height:30px;font-size:15px;border:2px white none;background-color:rgba(255,255,255,0.5)">
			</div>
		</form>
    </body>
</html>