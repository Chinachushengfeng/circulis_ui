<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="utf-8" /> 
  <title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta charset="utf-8" http-equiv="refresh" content="12;url=index.php">
  <link rel="stylesheet" href="css/style.css" />
  
  <script src="js/qrcode.min.js"></script>
 <style>
        body {
          display: flex; 
         
        }
        #qrcode {
            margin-top: 490px;
			            margin-left:100px;
        }
    </style>
 
 
  <div align="center" style="margin-top:20%;margin-left:43%;font-size:100px"><?php 
   
   
   
    include("IncDB.php");
include("word_function/sql.php");
echo select('RVM is overfull');
echo '<br>';	
 



?></div>
    
	
   <div align="center" style="margin-top:10%;position:absolute;margin-left:50%;margin-top:35%;font-size:50px"><?php 
   
 echo select('suspend');
?>
 </div>
 
    <img  src="images/overfull.png" style="position:absolute;margin-left:20%;margin-top:10%" width=15%> </img>
 
 
  <?php 
  
error_reporting(0);
date_default_timezone_set("Australia/Sydney");
$nowtime=time();

if(!$_COOKIE["emailtime"])
{
	 
	setcookie("emailtime",$nowtime);
email();
exit;
}



 
$cookiesemailtime= $_COOKIE["emailtime"];


if(($nowtime-$cookiesemailtime)>7200)
{
	setcookie("emailtime",$nowtime);
 email();
}





function email()
{
	
	
include("IncDB.php");
 
 
   $mysql = "select * from command ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
	
$url="https://uat-api.hellorvm.com/rvmalert?mid=".$mid."&content=RVM Full，need empty";
		 
		 
	 
		 

 
// getcharity?lang=zh
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); //這裏是判斷網絡狀況  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 28);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);

 curl_exec($ch); 
 

//email 报警endendendendendendendendendendendendendendendendendendend：

 




}











?>

   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"myapi.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"5000000000"}, //40秒后无论结果服务器都返回数据    
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
 
 
	    <div id="qrcode" class='qrcode'></div>
	 
	 

    <a href="http://127.0.0.1/tjt/" class="btn bottombtn" style="top:90%;left:50%;position:absolute;transform:translate(-50%,-50%);width:15%">Back
 
	</a>
	 
	 <?php
	 
	 include("IncDB.php");
 
 
   $mysql = "select * from command ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
	
	?>
	     <script>
        // 页面加载时直接生成二维码
        window.onload = function() {
            // 设置固定的 URL
            const url = "https://uat-api.hellorvm.com/circulis/public/urlget/full.php?empty=1&mid=<?php echo $mid?>";

            // 生成二维码
            new QRCode(document.getElementById('qrcode'), {
                text: url,
                width: 150,
                height: 150
            });
        };
    </script>