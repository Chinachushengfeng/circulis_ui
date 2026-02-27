 
<link rel="stylesheet" href="../../css/style.css">
         <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../css/fakeloader.css">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="../js/jquery.min.js"></script>
        <script src="../js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
 background-repeat: repeat;
 			background-image: linear-gradient(#0ea472, #0ea472);
 			font-family: "Arial Black", Gadget, sans-serif;er
ID: C10026243
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
   
 </p>  
 
 
 <?php 
 
$url=$_GET['url'];
  
  
  
  if($url=='first')
  {
	$url='http://127.0.0.1/tjt/index.php';	
  }
  elseif($url=='thanks')
  {
	  $url='../thanks.php';	
	  
  }
 
  
  
 ?>


 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='<?php echo $url;?>'", 1000); 
</script>


 
 
 
 