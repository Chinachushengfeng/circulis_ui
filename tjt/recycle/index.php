  

   	<!-- Loading Flat UI -->
	   <link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="css/swiper.min.css">
<link rel="stylesheet" href="css/naranja.min.css">
<!--  <link rel="stylesheet" href="css/swiper.min.css"> 優惠券!-->
<link rel="stylesheet" href="css/certify.css">
<link rel="stylesheet" href="css/dengdaitouping.css">


        
<style type="text/css">
body {
		font-family:'Microsoft YaHei';
 		background-repeat: repeat;
 		background-image: linear-gradient(#0ea472, #0ea472);
}
</style>
</head>

<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 

   <div   style="margin-top:180;margin-left:0%"></div>

     
  
    
  </head>
  <body>
   
 </p>  
  
  <a href="../index.php"  class="rebate" id="endbtn" style="bottom:-10px;left:50%;position:absolute;transform:translate(-50%,-50%)">  Finish</a> 

 <?php
		
		 
        error_reporting(0);
		include("IncDB.php");
	 
 
include("function/sql.php");


		//先查詢是否有未結算金額，有就強制結算
///////////////////////////////////清空//////////////////////////////////////////////////////////////////////
 
  

///////////////////////////////////清空//////////////////////////////////////////////////////////////////////


	 
		$userscan =  select("command","userscan"); 
		$mid =  select("command","mid"); 
   
		if(!$userscan)
		{
			
 	  Header("Location:../index.php");  
		}
		
		
 
			
		$data = array();
		$data["cardid"] = $userscan;
$data["mid"] = $mid;

	  
	  
		$data = json_encode(encrypt($data));

 

 
	$url='https://uat-api.hellorvm.com/circulis/public/urlget/alipaysearch.php';
 
 

      

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		$response = curl_exec($ch);

	 
if($response==false)
	
  {

	 
 
			print curl_error($ch);
	
 	 // Header("Location:../index.php");  
		 
		
			exit;
		}
	 
 
		$i = 0;
		$response = decrypt($response);
	  
		  
		$data = json_decode($response, true);
		
 
//		 echo var_dump($response);

		 

$isblack= $data['isblack'];

 	

 

if ($isblack == 1)
{

	
	echo '<h1 style="color:red; text-shadow:0 0 3px #fff" align="center">Warning:</h1>

	<br>
	<h2 style="color:yellow;font-size:30px" align="center"  >  Your account is currently under review for suspicious transactions.</h2>
									<br>		<br>			
												   
	<h2 style="color:#fff;font-size:30px" align="center">Please feel free to contact 1300-459-695 <br>if you want to appeal this matter. </h2>    ';



 
  
  
  exit;
	  
}
else
{

 

 
	 
	 Header("Location:dorecycle.php");  
	 exit; 
}



 
	 

        
		function encrypt($id)
		{
			$id = serialize($id);
			$key = file_get_contents("../../SECRET-AES-256/secret.txt");

			$data['iv'] = base64_encode(substr($key, 0, 16));
			$data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
			$encrypt = base64_encode(json_encode($data));
			return $encrypt;
		}



		function decrypt($encrypt)
		{
			$key = file_get_contents("../../SECRET-AES-256/secret.txt");
			$encrypt = json_decode(base64_decode($encrypt), true);
			$iv = base64_decode($encrypt['iv']);
			$decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
			$id = unserialize($decrypt);
			if ($id) {
				return $id;
			} else {
				return 0;
			}
		}



        ?>








 



<script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转


 
 
setTimeout("javascript:location.href='../index.php'",20000); 







</script>



 
 
 
 