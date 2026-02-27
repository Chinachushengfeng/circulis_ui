<?php



sleep(1);

include("IncDB.php");
include("function/sql.php");

		$sql = "update command set command=1"; //开门
		mysqli_query($link, $sql);



sleep(1);


 
$mid=select("command","mid");  //此command非之前的command 注意标记号！！！

$userid=select("command","userscan");  //此command非之前的command 注意标记号！！！

$recognitionstatus=select("command","recognitionstatus");  //此command非之前的command 注意标记号！！！

if ($recognitionstatus !='1')
{
 
	
	
	$url = 'https://uat-api.hellorvm.com/circulis/public/urlget/opendoor.php?mid='.$mid.'&user='.$userid.'';

 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 不验证证书
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 不验证证书域名

$response = curl_exec($ch);
	 

}







?>