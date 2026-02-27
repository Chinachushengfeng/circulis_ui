  
	 
<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/fakeloader.css">
        
        
    <script src="js/jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
	font-family:'Microsoft YaHei';
 		background-repeat: repeat;
 		background-image: linear-gradient(#0ea472, #0ea472);
}
</style>
</head>

<body>

   <div class="fakeloader" style="margin-top:250;margin-left:0%"></div>

 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>
  <p> 
   
    
  </head>
  <body>
 
 
 
 
 
 
	<?php 

//$mark=$_GET['mark'];

 include("IncDB.php");
date_default_timezone_set("Australia/Sydney");

   
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userscan=$result['userscan'];
 $mid=$result['mid'];
  
  
  $sql="update command set statecode='$userscan'  ";

	mysqli_query($link,$sql);



 $nowtime=time();
 
$nowtime= date('Y-m-d H:i:s', $nowtime); 


 

 $sql="insert into ocl (  mid , cardid ,  lastdate     )  values('$mid','$userscan','$nowtime')  ";
 	mysqli_query($link,$sql);


    
 
  
 
 
	$url='https://uat-api.hellorvm.com/circulis/public/urlget/alipaysearch.php';
 
 
	 
		$data = array();
		$data["cardid"] = $userscan;  //alipay�û���
		$data = json_encode(encrypt($data));


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

	 
  
 
			print curl_error($ch);
	 
  	$i = 0;
		$response = decrypt($response);
	 
		$data = json_decode($response, true);
		
 
		//  
 
 




		$user_limited_daliy = $data['user_limited_daliy']; //�û���������(������)�Ķ�ȣ��Ѽ��㣩
 
	$alipay_limited_value=	floor($user_limited_daliy*1 )    ;
				$sql = "update command set limitedvalue='$alipay_limited_value' "; //���ocl
										mysqli_query($link, $sql);
	
 
  
 
 
 
 
  
 
  
 $auth_url = 'https://uat-api.hellorvm.com/circulis/public/urlget/api/token.php?user='.$userscan; 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $auth_url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 28);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   $response = curl_exec($ch);
   
 
  
$response = convertToJson($response);
$response= json_decode($response,true);

 
 
 
 
 
 
    $isactive=  $response['active'];
     $name=  $response['name'];
	
  
	 $name = str_replace('"', '', $name);
	
if ($isactive )
{
	$isactive=1;
}
else{
	$isactive=0;
} 
 
 
 //C10026243
	 $sql="update command set schemeid_name='$name'";
     mysqli_query($link,$sql);	
 
  
 




  //$mark=$_GET['mark'];
  
   $mark=1;
  
  error_reporting(0);
  
  $loginway=$_GET['loginway'];
  
 
			 
  
 
if (  $isactive==1 )   //ֱ�ӹ��˵���32λ���û�id
{
	
	   
	  if($loginway==1)
	  {  
  header("Location:../../recycle/index.php");  //����������qrֵ����
		}
		else
			 {
				 
			 header("Location:confirm.php");  //����������qrֵ����	 
			 }
	
}
else{
	
	  header("Location:http://127.0.0.1/tjt/index.php?$mark=$mark");  //����������qrֵ����

}
	
	
	
	
 
  









// unknow �������













	function encrypt($id)
		{
			$id = serialize($id);
			$key = file_get_contents("../../../SECRET-AES-256/secret.txt");

			$data['iv'] = base64_encode(substr($key, 0, 16));
			$data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
			$encrypt = base64_encode(json_encode($data));
			return $encrypt;
		}



		function decrypt($encrypt)
		{
			$key = file_get_contents("../../../SECRET-AES-256/secret.txt");
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




function convertToJson($input) {
    // ȥ���հ��ַ����ָ��ַ���
    $parts = array_map('trim', explode(',', $input));
    
    // ����һ����������
    $data = [
        "id" => $parts[0],
        "name" => $parts[1],
        "type" => $parts[2],
        "active" => $parts[3],
        "field1" => isset($parts[4]) ? $parts[4] : null,
        "field2" => isset($parts[5]) ? $parts[5] : null,
        "field3" => isset($parts[6]) ? $parts[6] : null,
        "field4" => isset($parts[7]) ? $parts[7] : null,
        "field5" => isset($parts[8]) ? $parts[8] : null,
        "isField1False" => filter_var($parts[9], FILTER_VALIDATE_BOOLEAN),
        "isField2False" => filter_var($parts[10], FILTER_VALIDATE_BOOLEAN),
    ];

    // ת��Ϊ JSON
    return json_encode($data, JSON_PRETTY_PRINT);
}


   
 ?>
 
 
 