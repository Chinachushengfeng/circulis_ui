<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: 'Microsoft JhengHei';
            letter-spacing: 0.5px;
			text-align:center;
        }

        .main {
            width: 1080px;
            height: 660px;
            padding: 30px;
            box-sizing: border-box;
            background-color: #12a672;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .tltle {
            height: 120px;
            font-size: 36px;
            font-weight: 800;
            color: #fff;
            display: flex;
            align-items: start;
            /* background-color: red; */
            margin-bottom: 10px;
        }

        .content {
            width: 660px;
            height: 280px;
            border-radius: 10px;
            border: 1px solid #579f85;
            background-color: #fff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            color: #1a7e5c;
            font-size: 30px;
            font-weight: 900;
        }

        .btn {
            width: 675px;
            height: 120px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .no {
            width: 280px;
            height: 105px;
            border-radius: 10px;
            border: 1px solid #579f85;
            background-color: #fff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .yes {
            width: 280px;
            height: 105px;
            border-radius: 10px;
            border: 1px solid #579f85;
            background-color: #fff;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        img {
            height: 70px;
        }
    </style>
</head>

<body>

    <div class="main">
        <!-- 标题 -->
        <div class="tltle">Confirm member number</div>
        <!-- 内容 -->
        <div class="content">
            <div class="content_main" >
			<span style='text-align:center;align-items:center;align:center'> ID:<?php 


		include("incdb.php");

 	$sql = "select * from command ";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);
		$userscan = $result['userscan'];

	
 echo $userscan;
		
		
		

?> </span>
<br>
<span>Name:<?php 


		include("incdb.php");

 	$sql = "select * from command ";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);
		$name = $result['schemeid_name'];

	
 echo $name;
		
		//by defult use Member numbe C10026243
		

?> </span></div>
        </div>
        <!-- 按钮 -->
        <div class="btn">
            <a href='gotoscan.php'>   <div class="no"><img src="./no.svg" alt=""></div></a>
            <a href='../../recycle/index.php'>  <div class="yes"> <img src="./yes.svg" alt="">  </div></a>
        </div>
    </div>
</body>

</html>