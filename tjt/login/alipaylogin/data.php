 
    <?php
   

  
include("IncDB.php");
date_default_timezone_set("Australia/Sydney");

   
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userscan=$result['userscan'];
 
  $thetime=time();
  $thetime=date(('Y-m-d H:i:s'), $thetime);
  
if (   strlen($userscan) >=4 )   //直接过滤掉非32位的用户id
{
 
 
   $sql="update command  set    statecode ='$userscan' ";
   mysqli_query($link,$sql);
	 
  // $sql="update command  set longitude =0 , print=1 ";
// mysqli_query($link,$sql);

			   
 
		

 set_time_limit(0);//无限请求超时时间    
   
while (true){    
    //sleep(1);    
    
      $arr=array('success'=>"1",'name'=>"null");    
        echo json_encode($arr);    
      sleep(0.5);//0.5秿   
     
       exit();
		 
	 	 
		}
  
}

 
else 
{
 
  // $sql="update command  set longitude =0 , print=1 ";
// mysqli_query($link,$sql);


 set_time_limit(0);//无限请求超时时间    
   
while (true){    
    //sleep(1);    
    
      $arr=array('success'=>"0",'name'=>"null");    
        echo json_encode($arr);    
      sleep(1);//0.5秿   
     
       exit();
		 
	 	 
		}
  
}






















 
  
   
 ?>
 
 
   