 
<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/fakeloader.css">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
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

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>



 <div style="font-size:70px;transform;color:#fff;margin-top:400px" align='center'>
 
 <?php
   error_reporting(0); 
 
 include("IncDB.php");
 
 
 
 include("../word_function/sql.php");
echo select('Processing');




$user=$_GET['userscan'];
$loginway=$_GET['loginway'];
$sql="update command set statecode='$user',userscan='$user' ";

	mysqli_query($link,$sql);
	
 
 
 
  
 
	
 ?>
  
 <div>
 
 
   <div class="fakeloader" style="margin-top:200px;margin-left:0%"></div>

     
 
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
   
 </p>  
 
 

 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
 <script language="javascript" type="text/javascript"> 
  
 setTimeout("javascript:location.href=<?php 

   if  ($loginway=='1')
   {
	      echo "'donate_ownlogin_clz.php?loginway=1'";  //   echo "'../recycle/dorecycle.php'";  
   }
   else
	   
	   {
		      echo "'donate_ownlogin_clz.php'";   
	   }
 
 
 ?>", 4000); 
</script>
   
   
   
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
    
        
</p>  
