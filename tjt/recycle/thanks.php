<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 
	
	        <link rel="stylesheet" href="css/fakeloader.css">
        
         
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
		
		
		
		
	    <link rel="stylesheet" type="text/css" href="css/style1.css">
 
	
    <style type="text/css">
    body,td,th {
	font-family: Lato, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

.img{
	
border-radius:10%;

	
	
	
	
	}
    body {

 
 background-image: url(images/than.jpg);
	
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
  <!--
  
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
  
  -->
   
   
   
<?php


 


//重新提交澳大利亚支付接口

include('incdb.php');



  $sql="select * from command   ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
  $deviceId=$result['device'];     // 这个是每个RVM对应的 RVMid
 
 
 
 
 
 $sql="select * from user_transaction order by id desc ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];

 
 $au_data=array();
 
  
 
 
 
 
$sql="select * from user_transaction where   transactionid='$transactionid'  order by dateline desc";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
 $user=$comresult['user'];
 
 
 $consumerId=$user;
 $transactedOn= date("Y-m-d",time()).'T'.date("H:i:s",time()).'.510Z';
 $transactedby='';
 
 
 
 $paymentMethod='SCHEME';
 
 
 
$sql="select count(transactionid) as total from user_transaction where transactionid='$transactionid' and recognitionstatus=1   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$totalQuantity=$bottlevalue['total'];    //计算累计 


 
 $typejson='  [
    {
        "id": "GLASSMIXED",
        "name": "Glass - Mixed",
        "refundEligible": true,
        "attributes": {
            "colours": [
                "Amber/Brown",
                "Blue",
                "Flint/Clear",
                "Green",
                "Other"
            ]
        }
    },
    {
        "id": "ALUMINIUM",
        "name": "Aluminium",
        "refundEligible": true
    },
    {
        "id": "PETCLEAR",
        "name": "PET - Clear",
        "refundEligible": true
    },
    {
        "id": "PETCOLORED",
        "name": "PET - Colour",
        "refundEligible": true
    },
    {
        "id": "HDPE",
        "name": "HDPE",
        "refundEligible": true
    },
    {
        "id": "LQDPAPERBRD",
        "name": "Liquid Paper Boa",
        "refundEligible": true
    },
    {
        "id": "STEEL",
        "name": "Steel",
        "refundEligible": true
    },
    {
        "id": "OTHER",
        "name": "Other Materials",
        "refundEligible": true
    },
    {
        "id": "GLASSDIRECT",
        "name": "Glass - Direct",
        "refundEligible": true
    },
    {
        "id": "INELIGIBLE",
        "name": "Ineligible Containers",
        "refundEligible": false
    }
]';



$typejson=json_decode($typejson,true);








 $au_data['transactionId']=$transactionid;
 $au_data['transactedBy']=$transactedby;
  $au_data['deviceId']=$deviceId;
 $au_data['consumerId']=$consumerId; 
 $au_data['refundPaymentType']="SCHEME_PAID";
  $au_data['paymentMethod']='SCHEME'; 
 $au_data['customerDeclaration']="false";
 $au_data['transactedOn']=$transactedOn; 
 $au_data['totalQuantity']=$totalQuantity;  
 $au_data['materialTypes']=array();
 
  
 
 
 $sql="select DISTINCT  material from user_transaction where transactionid='$transactionid' and recognitionstatus=1    ";
$materialquantity=mysqli_query($link,$sql);
 

while($it=mysqli_fetch_array($materialquantity))
{
	
	$i=0;
	
	
	error_reporting(0);
	while($typejson[$i])
	{
		
			if($it['material']==$typejson[$i]['name'])
			{

			$materialTypeId=$typejson[$i]['id'];

			}
			
			 
			
 
 	$i=$i+1;
		
	}
	 
$material=$it['material'];

$sql="select count(*) as totalnow  from user_transaction where transactionid='$transactionid' and recognitionstatus=1  and material='$material'  ";
$totalnow=mysqli_query($link,$sql);
$totalnow=mysqli_fetch_array($totalnow);

$temp_data['materialTypeId']= $materialTypeId;
$temp_data['quantity']   =$totalnow['totalnow'];

 
$temp_data['refundAmountPerUnit'] =number_format (0.1,1) ;
$temp_data['grossAmount']  = number_format(0.1* $temp_data['quantity'],2);
$temp_data['gstAmount'] =number_format( $temp_data['grossAmount']/11,4);
$temp_data['taxableAmount'] =number_format($temp_data['grossAmount']-$temp_data['gstAmount'],4); 

  array_push ($au_data['materialTypes'],$temp_data);
  	
	 
}

 
 $au_data= '['.json_encode($au_data).']';

 
  
  

  

 //得到Token 写入数据库
 

 


		
		
		
$auth_url = 'https://uat-api.hellorvm.com/circulis/public/urlget/api/transaction.php';
$max_retries = 3; // 最大重试次数
$retry_delay = 2; // 重试延迟时间（秒）
$attempt = 0;
$response = false;

while ($attempt < $max_retries && $response === false) {
    $attempt++;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $auth_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $au_data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 28);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);
    
    // 检查是否成功
    if ($response !== false && $http_code >= 200 && $http_code < 300) {
        // 成功获取响应，退出循环
        break;
    } else {
        // 失败，记录错误并准备重试
        error_log("Attempt $attempt failed. HTTP Code: $http_code, Error: $curl_error");
        
        if ($attempt < $max_retries) {
            // 如果不是最后一次尝试，等待后重试
            sleep($retry_delay);
            // 可以逐渐增加延迟时间
            $retry_delay *= 2; // 指数退避
            $response = false; // 重置响应，准备重试
        } else {
            // 最后一次尝试也失败了
            error_log("All $max_retries attempts failed.");
            $response = false;
        }
    }
}

// 检查最终结果
if ($response === false) {
    // 处理失败情况
    echo "Failed to connect after $max_retries attempts.";
    // 可以在这里添加你的错误处理逻辑
} else {
    // 成功获取响应
  //  echo "Success! Response: " . $response;
}







///////////////////////////////////// transaction 提交；

 


$sql = "select * from user_transaction where uploaddone=0  "; //查找沒有update到服務器的。
$comresult = mysqli_query($link, $sql);
$comresult = mysqli_num_rows($comresult);

if ($comresult!=0) { 


	$sql = "select * from barcode ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $barcodeversion = $comresult['version'];
	
	
    $sql = "select * from user_transaction where uploaddone=0  "; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
	
    // echo $barcodeversion;
    $sql = "select * from command ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $statecode = $comresult['statecode'];
    $mid = $comresult['mid'];
	$transactionid = $comresult['transactionid'];
 $errorcode=$comresult['errorcode'];
    $device = $comresult['device']; //device
 
	
	
    $sql = "select * from user_transaction where transactionid='$transactionid' order by dateline asc"; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
	
    $user = $comresult['user'];
    $dateline = $comresult['dateline'];
    $rebateordonate = $comresult['rebateordonate'];
    $platform = $comresult['payplatform'];
    $charityname = $comresult['charityname']; 
    $charityid = $comresult['charityid']; 
 $transactionid = $comresult['transactionid'];
    $octreceipt = $comresult['octreceipt'];
    $transactiondone = $comresult['transactiondone'];
	
 

    $sql = "select sum(bottlevalue) as total from user_transaction where transactionid='$transactionid'  and recognitionstatus=1  ";
    $bottlevalue = mysqli_query($link, $sql);

    $bottlevalue = mysqli_fetch_array($bottlevalue);
    $bottlevalue = $bottlevalue['total'];

    $totalbottlevalue = $bottlevalue; //計算累計value
	
 
if(!$totalbottlevalue)
{
	$totalbottlevalue=0;
	
}


    $sql = "select * from user_transaction  where transactionid='$transactionid'"; //
    $result = mysqli_query($link, $sql);

    $data = array();

    $data['barcodedata'] = array();
    $data['info'] = array();
    // $data['barcodedata']['barcode']=array();
    // $data['barcodedata']['weight']=array();
    // $data['barcodedata']['bottlevalue']=array();
    // $data['barcodedata']['recognitionstatus']=array();
    while ($it = mysqli_fetch_array($result)) {
        $barcodedata['dateline'] = $it['dateline'];
        $barcodedata['barcode'] = $it['barcode'];
        $barcodedata['weight'] = $it['weight'];
        $barcodedata['bottlevalue'] = $it['bottlevalue'];
        $barcodedata['recognitionstatus'] = $it['recognitionstatus'];
 	    $barcodedata['metal'] = $it['bors'];
 	 
 
        array_push($data['barcodedata'], $barcodedata);
    }

    $info['transactionid'] = $transactionid;
    $info['totalvalue'] = $totalbottlevalue; //$value;
    $info['user'] = $user;
    $info['rebateordonate'] = $rebateordonate;
	 
	if($user=='donate')
	{
		$platform="donate";
	}
    $info['platform'] = $platform;
   // $info['value'] = 1; //$value;
    $info['charityname'] = $charityname;
	  $info['charityid'] = $charityid;
  //  $info['storageplastic'] = $storageplastic;
	//    $info['storagecan'] = $storagecan;
    $info['statecode'] = $statecode;
    $info['mid'] = $mid;
	   
    $info['device'] = $device;
    $info['barcodeversion'] = $barcodeversion;
    $info['octreceipt'] = $octreceipt;
    $info['transactiondone'] = $transactiondone; 
    $info['break'] = $transactiondone;
 $info['errorcode'] = $errorcode;
 
 
    array_push($data['info'], $info);
   // echo var_dump(json_encode($data));
    $data = json_encode(encrypt($data));



    /**
     * echo var_dump($data);
     * echo '<br>';
     * echo var_dump(decrypt($data));
     */

$api_endpoint = 'https://uat-api.hellorvm.com/circulis/public/urlget/user_transaction25.php';
$max_retries_count = 3; // 最大重试次数
$retry_interval = 1; // 初始重试间隔（秒）
$attempt_number = 0;
$response_data = false;
$curl_error_number = 0;
$request_successful = false;

while ($attempt_number < $max_retries_count && !$request_successful) {
    $attempt_number++;
    
    // 如果不是第一次尝试，等待一段时间
    if ($attempt_number > 1) {
        sleep($retry_interval);
        $retry_interval *= 2; // 指数退避：1, 2, 4
    }
    
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $api_endpoint);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_TIMEOUT, 28);
    curl_setopt(
        $curl_handle,
        CURLOPT_HTTPHEADER,
        array('Content-Type: application/json; charset=utf-8')
    );
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl_handle, CURLOPT_SSLVERSION, 1);
    
    $response_data = curl_exec($curl_handle);
    $curl_error_number = curl_errno($curl_handle);
    
    curl_close($curl_handle);
    
    // 检查是否有错误
    if ($curl_error_number == 0) {
        // 成功，没有错误
        $request_successful = true;
  //成功
				   
 

						 
								if ($transactiondone == 0) {//還沒有點擊結算，很有可能是斷電。
									$sql = "update user_transaction set transactiondone=1,uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								} elseif ($transactiondone == 2) {  //已經點擊結算，結束了投樽之後的情況。
									$sql = "update user_transaction set uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								}
								
        
    } else {
        // 有错误情况
        if ($attempt_number < $max_retries_count) {
            // 还有重试机会，记录错误日志但不输出
            error_log("Attempt $attempt_number failed. Error code: $curl_error_number");
        } else {
            // 最后一次尝试也失败了，输出错误
            echo 'maybe network problem the connection has tried 3 times ,error=' . $curl_error_number;
        }
    }
}


 
    curl_close($ch);
}

else  //如果沒有需要上傳的數據
{
		$sql = "update ocl set addvaluetime='' "; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
		mysqli_query($link, $sql);

}
// ===============================================檢測是否有transaction處理結束。================================
// 系統制作人，儲盛峰來自上海，  聯系維護 email:shengfeng2015@163.com / sharonxia@163.com 電話 and wechat：13918715708
// ===============================================檢測是否要下載交換八達通文件。================================
// if(date("Hi",time()) > "1930" && date("Hi",time()) < "2000")
// 先檢測是否有新的八達通的交換文件   如果文件和服務器壹樣就不會執行， 註意，如果傳輸失敗，需要顯示錯誤信息，並且報告，記錄
 
 






 
 
 
 
 
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




 

 
   <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 
setTimeout("javascript:location.href='../index.php'", 6000); 
 


</script>
	
    <script type="text/javascript" src="js/timecountdown.js"></script>
  

 

 <!-- <div class="fakeloader" style="margin-top:200px;margin-left:0%"></div>  -->
  
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>

   
</body></html>