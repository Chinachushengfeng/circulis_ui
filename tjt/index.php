  
<html lang="en" class="no-js">

 <link rel="stylesheet" href="css/style.css" />
 <meta charset="utf-8">
 	<meta http-equiv="refresh" content="50">
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
 		background-repeat: repeat;
 	 
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
 
  <?php
 

  
 
 	//  <a href="http://127.0.0.1/tjt/login/index.php" class="btn bottombtn">
	
include("IncDB.php");
 





		$sql = "update command set userscan=0,isbottle=0"; 
		mysqli_query($link, $sql);
		
		
       $sql = "select * from  command ";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
		
    
         $sql = "select * from  command ";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
		$mid=$result['mid'];
  
 $errorcode = $result['errorcode']; 
 
 
 
 
 
 
 
 
 $auth_url = "https://uat-api.hellorvm.com/circulis/public/urlget/full.php?mid=".$mid; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 

 

if(curl_errno($ch))
{
    
		echo 'error='.curl_errno($ch);
		
 echo ' <div style="margin-top:280px;margin-left:200px;font-size:25px;justify-content: center;align-items: center;height: 100vh"><div align=center style="margin-left:-200px">【Temporarily Suspended】</div><br>Network request failed, please contact the administrator</div>' ;
 
 exit;
 
}
 
 
 
 else{
	 
	 
	 echo '
<img src="images/index.png" width=100% style="top:320px;left:45%;position:absolute;transform:translate(-45%,-50%)"> </img>

 
<div id="particles">
    <div class="intro">


    </div>
</div>
</div>
 
 
 
 
 
 
 
 
 
	<div style="position:absolute;top:52%;width:100%;height:40%;left:-4.5%">
 
		
		
		<div style="float:right;width:50%">
 		<a href="http://127.0.0.1/tjt/login/alipaylogin/gotoscan.php" class="paybtn" style="position: relative;float:left;width: 60%;height:126%;margin-left:-60%;margin-top:-20%;">
 			<img src="images/111.png" style="top:50%;left:50%;position:absolute;transform:translate(-50%,-50%);width:90%"/>
		 </a>
		</div>
		
		
		
			<div style="float:right;width:40%;margin-top:-30.3%;margin-right:11%">
 		<a href="http://127.0.0.1/tjt/login/choisedonate.php" class="paybtn" style="position: relative;float:right;width:75%;height:124.5%;background:#fff">
 			<img src="images/333.png" style="top:50%;left:50%;position:absolute;transform:translate(-50%,-50%);width:75%"/>
		 </a>
		</div> 
 		
		
';
	 
 }
 
 
	
$response = curl_exec($ch);

	$response = json_decode($response, true);
 
 
 $storageleft=$response['info']['storageleft'];
 $storageright=$response['info']['storageright'];
 
 
 if ($storageleft==1 or $storageright==1)
 {
	   	  Header("Location:error.php");      
		  	exit;
	 
 }

 
 
  
   
 if ($errorcode & 0x200    )
 {
	 
	  
	        
	  	  Header("Location:door.php");      
		  	exit;
 
 }
  				
 
 if ($errorcode & 0x10  || $errorcode & 0x01  ||  $errorcode & 0x02  || $errorcode & 0x20 || $errorcode & 0x80  )
 {
	 
	  
	        
	  	  Header("Location:induction.php");      
		  	exit;
 
 }
  //////////////////////////////////////////判斷是否有瓶子擋住感應結束///////////////
 
 
 
  
 ?>




 	</div>
	
	
	
 
  
 
   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"myapi.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"80000000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		   evdata.data.btn.click();    
       $("#msg").append("<br>[0]");   
		                },    
		             //Ajax请求超时，继续查询    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超时空白页]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
 
		            });    
		    });    
		        
		});  
	</script>
	  <input id="btn" type="hidden" value="测试" />  
  </p> 

 
  
<div id="msg" style="margin-top:700px"> </div>

  <script type="text/javascript">
// 两秒后模拟点击
setTimeout(function() {
// IE
if(document.all) {
document.getElementById("btn").click();
}
// 其它浏览器
else {
var e = document.createEvent("MouseEvents");
e.initEvent("click", true, true);
document.getElementById("btn").dispatchEvent(e);
}
}, 2000);
     </script>
 

 




<p>&nbsp;</p>
</body>

</html>