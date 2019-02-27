 <?php

 include 'Database.php';
 
 class Curd extends Database
 {

/*   public function __Construct()
   {
     parent::__Construct();
   }*/

   public function excecute($query)
   {

     $result1=$this->conn->query($query);

     if(!$result1)
     {
       return false;
     }

     $result=array();

     if( $result1->num_rows > 0)
     {

      while($row = $result1->fetch_assoc())
      {
        $result['result'][]=$row;
      }

       $result['msg']=array('msg'=>'success','code'=>1);

     //array_push($result,$res);
    }
    else
    {
      $result=array('msg'=>'nodata','code'=>2);
    }

    return json_encode($result);

  }


  public function insert($query)                                   
  {

   $res=$this->conn->query($query);

   if(!$res)
   {
     return false;
   }
   else
   {
    if($this->conn->affected_rows >0)
    {
       return true;
    }
    else
    {
       return false;
    }
   

  }

}


}


?>