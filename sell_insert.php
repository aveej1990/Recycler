 <?php
 ini_set('display_errors',1);
 error_reporting(E_ALL);
 include 'Curd.php';

 $curd = new Curd(); // Object Creation for calss Curd 

 if(isset($_POST))
 {


 	$mobile=$_POST['phoneNumber'];  
 	$name=$_POST['fullName'];  
 	$address=$_POST['address'];  
 	$city=$_POST['city'];  
 	$landmark=$_POST['landmark'];  
 	$postcode=$_POST['postcode'];  
 	$pickupdate=$_POST['pdate'];  

 	$cls_date = new DateTime($pickupdate);
 	$date=$cls_date->format('Y-m-d h:i:s'); 


 	$sql="INSERT INTO `sell`(`mobile`, `name`, `address`, `city`, `landmark`, `zipcode`, `pickupdate`,`userid`) VALUES 
 	('$mobile','$name','$address','$city','$landmark','$postcode','$date',0)";

 	//INSERT INTO `sell`(`mobile`, `name`, `address`, `city`, `landmark`, `zipcode`, `pickupdate`,`userid`) VALUES ('111','sdas','1','asdasd','1','asdd','9999-12-31 23:59:59','0')

 	$res=$curd->insert($sql);

 	if($res)
 	{
 		$arr=array('msg'=>'success', 'status'=>1);
 	}
 	else
 	{
 		$arr=array('msg'=>'error', 'status'=>0);
 	}

 	 echo json_encode($arr);

 }







 /*echo $sql="update user set user_mobile=$mob where user_id=$id ";
 $res=$curd->insup($sql);

 if($res)
 {
      $r= json_decode($res);
      echo $r->msg;
 }
 else
 {
    echo "error";
 }

 $sql='SELECT e.first_name,e.last_name,e.Empid as Emp_id,r.Empid FROM employee e JOIN roseindia r  on e.Empid= r.Empid';

 $result=$curd->excecute($sql);


 $data=json_decode($result);
 $result=$data;

  echo "<pre>";
 print_r($result);


 foreach ($result as $key => $value) {
   # code...

   // if(!empty($value['first_name']))
        echo  $key.".........".(isset($value->first_name)? $value->first_name :'no data to display')."<br>";
 }

*/
 ?>