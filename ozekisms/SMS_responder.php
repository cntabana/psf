<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_GET['sender']) and isset($_GET['msg']))
{

$msg = $_GET['msg'];

$valuearray=explode("*",$msg);
$service = $valuearray[0];
$email   = $valuearray[1];
$request = $valuearray[2];
$message = "";
$date    = date('Y-m-d');
$phone   = $_GET['sender'];

	if(strtolower($service) == "kubaza")
	{

			if($email!="" and $request!="") //if($district!="" and $product!=""$)
				{
				//query from database 
				    $query="insert into request(request,phonenumber,email,requestdate,status) values ('".$request."','".$phone."','".$email."','".$date."',0)";
					$con = mysqli_connect("localhost","root","","psfdb");
					$rs = mysqli_query($con,$query);
					if($rs){
						$message = "Twishimiye ikibazo cyanyu,tuzabasubiza vuba. Murakoze.";
					}else{

						$message = "........ error";
					}

				    mysqli_close($con);

				}
			else
			{
					$message='wanditse nabi !!! andika "kubaza*email*request" murakoze.';
					
			}
	}
	else if(strtolower($service) == "igisubizo"){

                if($code !="") 
                {
				
				$query="select status from request where code =".$code;
					
                $con = mysqli_connect("localhost","inyungu_inyungu","QHTJ-h^5mAQH","inyungu_inyungudb");
				//$db_selected = mysql_select_db("inyungu_inyungudb", $con);
					
				$rs = mysqli_query($con,$query);

				//end of query from database
				while($row = mysqli_fetch_array($rs))
				{
						
			     $message=$message." ".$row['productname']."  ".$row['quantity'];
				    
			   }





	}
	else
	{
		$message='wanditse nabi !!! andika "kubaza*email*request" murakoze.';

	}
	
	
echo "{SMS:TEXT}{}{+250788543310}{".$_GET['sender']."}{".$message."}";

}


?>