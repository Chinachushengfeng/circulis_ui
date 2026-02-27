 
<html>
	<head>
		<meta charset="utf-8">
		<title>用户电话号码输入</title>
		
    <link rel="stylesheet" type="text/css" href="css/own_donate.css">
		<style>
			*{
				padding: 0;
				margin: 0;
			}
			.main{
				
				margin-top:-400px;
				display: inline-block;
				height: 100%;
				width: 100%;
	 
				position: absolute;
			}
			.input{
				margin: 0 auto;
				height: 30px;
				width: 220px;
				border-radius: 20px;
				border: none;
				margin-top: -10px;
					margin-left: 10px;
				outline: none;
				padding-left: 10px;
				color:#52957e;
			}
			#input{
				position: relative;
				margin: 0 auto;
				margin-top: 10%;
				height: 45px;
				width: 230px;
			}
			#NumBtn{
				margin: 0 auto;
				height: 200px;
				width: 230px;
			}
			#NumBtn ul{
				list-style: none;
				font-size: 0;
			}
			#NumBtn ul li{
				display: inline-block;
				height: 55px;
				width: 55px;
			    background-color: white;
				border-radius:100px ;
				text-align: center;
				line-height: 50px;
				list-style: none;
				margin-left: 20px;
				margin-top: 8px;
				 
			}
			#NumBtn ul li button{
				background-color: white;
				border: none;
				height: 0px;
				width: 50px;
				border-radius:100px ;
				margin-top:10px;
				font-size: 30px;
				color:#52957e;
			}
			#zero{
				height: 70px;
				width: 230px;
			}
					
					
					#btn button{
				background-color: transparent;
				height: 65px;
				margin-left:14px;
				width:190px;
				margin-top:  142px;
				border-radius: 65px;
				border: 0px solid #54a77d;
				color: #54a77d;
				font-size: 20px;
			}
			
 
			
			
			body {
	font-family:'Microsoft YaHei';
 		background-repeat: repeat;
 		background-image: linear-gradient(#0ea472, #0ea472);
 
 		 
 			font-family: "Arial Black", Gadget, sans-serif;
 		}
			
		 
			
			body {
 		   background-image: url("img/full.png");
  background-repeat: no-repeat; /* 不重复 */
  background-position: center center; /* 居中 */
  background-size: cover; /* 覆盖整个元素 */
 
 		 
 			font-family: "Arial Black", Gadget, sans-serif;
 		}
			
			
		</style>
	</head>
  
<body>
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
 
 
 
   
  <div style="margin-left:10%;margin-top:120px;">
 <div>
	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
   <div align="left"  >  
   <?php 
 include("IncDB.php");
include("../word_function/sql.php");
 
              
 
date_default_timezone_set("Australia/Sydney");

//此时写入transactionid
$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
 $mid=$result['mid'];
$transactionid = $mid.time();
$sql = "update command set  userscan='123'  , transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link, $sql);

//此时写入transactionid
 

  
//C10026243
 ?>
  
  
 
  <div style='margin-left:20px;margin-top:440px;margin-left:50px;position:absolute'>
 
  
   
  <form action='qsh.php' method="get">   
		<div class="main">
			<div id="input">

					<input onclick="input()"   id="inputmain" style='font-size:30px' name='userscan'  class="input" value="C"/>
			</div>
			<div id="NumBtn">
				<ul>
					<li><button type="button" value="1" onclick="btnclick(1)">1</button></li>
					<li><button type="button" value="2" onclick="btnclick(2)">2</button></li>
					<li><button type="button" value="3" onclick="btnclick(3)">3</button></li>
					<li><button type="button" value="4" onclick="btnclick(4)">4</button></li>
					<li><button type="button" value="5" onclick="btnclick(5)">5</button></li>
					<li><button type="button" value="6" onclick="btnclick(6)">6</button></li>
					<li><button type="button" value="7" onclick="btnclick(7)">7</button></li>
					<li><button type="button" value="8" onclick="btnclick(8)">8</button></li>
					<li><button type="button" value="9" onclick="btnclick(9)">9</button></li>
			 
				</ul>
				<div id="zero">
					<ul style="margin-left:31%">
						 
						<li><button type="button" value="0" onclick="btnclick(0)">0</button></li>
	 
								<li><button type="button" onclick="btnDel()  " style='font-size:25px;margin-top:14px'><strong>DEL</strong></button></li>
	 
					</ul>
				</div>
			</div>
			<div id="btn">
		 
 
 
			<button  >      </button>
			 
				
				
				</form>
				
				 
			</div>
		</div>
		  </div>
	  
	  
				  
		 
				
				
		  
		       <script type="text/javascript" src="js/timecountdown.js"></script>
 
 <script language="javascript" type="text/javascript"> 
  
 setTimeout("javascript:location.href='choisedonate.php'", 60000); 
</script>
		  
		  <br> <br>  <br> <br> 
 		  <br> <br>  <br> <br> 
 		  <br> <br>  <br> <br> 
 		  <br> <br>  <br> <br> 
 		  <br> <br>  <br> <br>  <br>  
 



<table width='125%' style='margin-left:100px' cellpadding="2" >

<tr>
<td>
   
<br>
  

</td>


<td>
 

</td>



</tr>
 



</table>


 
 
		<a href=' choisedonate.php'  >     
<div style=' background-color: transparent; height: 65px; margin-left:590px;width:190px ; position;absolute;  margin-top:-30px; border-radius: 65px;  	border: 0px solid #54a77d; color: #54a77d; ' >	       </div></a>
		
		</a>
		
		
		
 </span>
		  
		<span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">60</span>
 	  
		 
 		<script language="javascript" type="text/javascript">
 			// 以下方式直接跳轉

 			// 以下方式定時跳轉
 			setTimeout("javascript:location.href='choisedonate.php'",  60000);
 		</script> 
	      <script>
      var tim=59;
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
  
		  
		<script>
			var num = ['C']; // 初始化时保留C
var locat = 1; // 当前位置从1开始，C占用第0位置
var numberlist = document.querySelector("input");

// 添加按钮
function btnclick(val) {
    if (locat < 0) return;
    num.splice(locat, 0, val);
    locat++;
    numberlist.value = num.join('');
}

// 清空按钮
function btnEmpty() {
    locat = 1; // 保持C
    numberlist.value = 'C';
    num = ['C']; // 清空时保留C
}

// 删除按钮
function btnDel() {
    if (locat <= 1) return; // 不删除C
    num.splice(locat - 1, 1);
    locat--;
    numberlist.value = num.join('');
}

function input() {
    const inp = document.getElementById("inputmain");
    locat = inp.selectionEnd; // 鼠标在input输入框中的位置
}

		</script>
		
		
 
  
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"5000000000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		                    if(data.success=="1"){  
window.location.href='qsh.php?loginway=1&userscan='+data.name;  //'qsh.php'
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
 
		                    }    
		                 //未从服务器得到数据，继续查询  

else if(data.success=="5"){  
window.location.href='qrerror.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
							

else if(data.success=="6"){  
window.location.href='enderrorww.php?errorcode=consult'+data.name;   
 
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
						 

else if(data.success=="8"){  
window.location.href='enderror.php?errorcode=consult'+data.name;   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
						 

else if(data.success=="9"){  
window.location.href='enderrorww.php?errorcode=consult'+data.name;  
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
						  							
		                   else{      
		                    evdata.data.btn.click();    
       $("#msg").append("<br>[0]"); 
		                    }    
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
}, 800);
     </script>
	 
  
 
		</body>
</html>
