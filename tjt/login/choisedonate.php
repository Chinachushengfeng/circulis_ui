 <link rel="stylesheet" href="../css/style.css" />
 <meta charset="utf-8">
 <style type="text/css">
 	#apDiv1 {
 		position: absolute;
 		left: 755px;
 		top: 302px;
 		width: 355px;
 		height: 336px;
 		z-index: 1;
 	}

 	body {
		font-family:'Microsoft YaHei';
 		background-repeat: repeat;
 		background-image: linear-gradient(#0ea472, #0ea472);
 	}

 	#apDiv2 {
 		position: absolute;
 		left: 54px;
 		top: 213px;
 		width: 413px;
 		height: 115px;
 		z-index: 1;
 	}

	 .bottombtn {
            bottom: 5%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, 0%);
            white-space: nowrap;
        }
 </style>

 </head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
 <br> 
 <br>  
  
  
  <div style="margin-left:10%;margin-top:20px;">
  <div style="margin-left:25%;margin-top:-30px;font-size:30px;font-weight : bold"> <strong>Please select a beneficiary or  </strong>  </div>
  
  <div style="margin-left:32%;margin-top:0px;font-size:30px;font-weight : bold"> <strong> choose your own  </strong>  </div>
 <div>
 
   
 
 <?php 
 
 
 	include("incdb.php");
	
	$sql="update command set isdonate='1',userscan='123' ,limitedvalue='5000'";
	 mysqli_query($link,$sql);	
/* 		
	$sql='select * from command';
	$result=mysqli_query($link,$sql);
	$result=mysqli_fetch_array($result);
	$username=$result['userscan'];

  	 setcookie("user",$username,time()+3600,"/" );
	 

		// ============================== 獲取慈善機構的名稱；===========================
		$auth_url = "https://uat-api.hellorvm.com/circulis/public/urlget/getcharity.php";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $auth_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,28);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		$response = curl_exec($ch);

if(!$response )
{
	
 
 //Header("Location:../index.php");  
// exit;

}



		$response = json_decode($response, true);



		$i = 0;
//echo var_dump($response[0]);
		while (isset($response[$i])) {
			$zhcharity  = $response[$i]['ch_charityname'];
			$encharity  = $response[$i]['en_charityname'];
			$charityid = $response[$i]['charityid'];
			$logo = $response[$i]['logo'];
			
			$sql = "insert into charityname (chcharityname,encharityname,charityid) values ('$zhcharity','$encharity','$charityid')";
			mysqli_query($link, $sql);
			$i = $i + 1;
		}
		// ============================== 獲取慈善機構的名稱結束===========================
		
		 
  */
 
 ?>

  
 
	<div style="position:absolute;top:40%;width:100%;height:40%;margin-left:-120px">
 
		
		
		<div style="float:right;width:50%">
 		<a href="choisedonateqsh.php?charityID=C10026243&charityname=Rosies" class="paybtn" style="position: relative;float:left;width: 60%;height:115%;margin-left:-60%;margin-top:-20%;">
 			<img src="img/001.jpg" style="top:53%;left:55%;position:absolute;transform:translate(-50%,-50%);width:90%"/>
		 </a>
		 
		 <a href="choisedonateqsh.php?charityID=C10091792&charityname=Lifeline" class="paybtn" style="position:absolute;float:right;width:30%;height:115%; margin-top:-105px;margin-left:20px; ">
 			<img src="img/002.jpg" style="top:53%;left:51%;position:absolute;transform:translate(-50%,-50%);width:90%"/>
		 </a>
		 
		</div>
		
	 
 	</div>
		
		
	 
 
	<a href='own_donate.php' ><span   class="btn  " style='  margin: 20px;padding: 22px; text-align:center;font-size:10px  height: 90px;width: 670px;position:absolute;border-radius:30px;margin-left:97px;margin-top:170px' height=20% width=62%>Choose own </span>
 
 
 
 
	</a>
	
	 
 

 	<div style="bottom:35px;left:35%;position:absolute">


 		</h1>



 		<div style="margin-top:3px;margin-left:100%">



 		</div>

 		</p>
 	</div>
 	<p align="center" class="wenzi1">
 		</div>
 		</div>


 		<p>&nbsp;</p>
 		<script type="text/javascript" src="js/timecountdown.js"></script>



 		<script language="javascript" type="text/javascript">
 			// 以下方式直接跳轉

 			// 以下方式定時跳轉
 			setTimeout("javascript:location.href='../index.php'",  15000);
 		</script>



 










 		</div>
<span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">15</span>
 

		  
		  
		  
		  
	      <script>
      var tim=15;
      function aaa(){
        var btnn=document.getElementById("daojishi");
		
  document.getElementById("daojishi").innerHTML= ''+tim+'';
		 
      
          tim--;
		  
		  if (tim<0)
		  {
			    document.getElementById("daojishi").innerHTML= '';
		 
		  }
      }
      setInterval("aaa()",1000);
    </script>   
	
 


 </body>

 </html>