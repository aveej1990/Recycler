<?php include "header.php" ?>

<section class="donate">
 <p>Sell or Donate your Items </p>
 <div class="container">
 
 <div id="success"  class="success"></div>

   <table class="table table-striped">
    <tbody>

     <tr>
      <td colspan="1">
       <form class="well form-horizontal" method="POST" id="sellform">
        <fieldset>
         <div class="form-group">
          <label class="col-md-4 control-label">Phone Number</label>
          <div class="col-md-8 inputGroupContainer">
           <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input id="phoneNumber" name="phoneNumber" placeholder="Phone Number" class="form-control" required="true" value="" type="number"></div>
         </div>
       </div>

       <div class="form-group">
        <label class="col-md-4 control-label">Full Name</label>
        <div class="col-md-8 inputGroupContainer">
         <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="fullName" name="fullName" placeholder="Full Name" class="form-control" required="true" value="" type="text"></div>
       </div>
     </div>
     <div class="form-group">
      <label class="col-md-4 control-label">Address Line</label>
      <div class="col-md-8 inputGroupContainer">
       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="address" name="address" placeholder="Address Line 1" class="form-control" required="true" value="" type="text"></div>
     </div>
   </div>

   <div class="form-group">
    <label class="col-md-4 control-label">City</label>
    <div class="col-md-8 inputGroupContainer">
     <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="city" name="city" placeholder="City" class="form-control" required="true" value="" type="text"></div>
   </div>
 </div>
 <div class="form-group">
  <label class="col-md-4 control-label">landMark</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="landmark" name="landmark" placeholder="please provide landmark" class="form-control" required="true" value="" type="text"></div>
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Postal Code/ZIP</label>
  <div class="col-md-8 inputGroupContainer">
   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input id="postcode" name="postcode" placeholder="Postal Code/ZIP" class="form-control" required="true" value="" type="text"></div>
 </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Pickup Date</label>
  <div class="col-md-4 inputGroupContainer">
   <div class='input-group date' id='datetimepicker8'>
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    <input type='text' class="form-control" name="pdate" placeholder="please select pickupdate" />
    <span class="input-group-addon">
     <span class="fa fa-calendar">
     </span>
   </span>
 </div>
</div>   
<div class="col-md-4 inputGroupContainer">
  <select class="form-control" id="sel1">
    <option>10:00 AM to 5:00 PM</option>
  </select>
</div>

</div>
</div>
<div class="form-group">
 <label class="col-md-4 control-label"></label>
 <div class="col-md-8 inputGroupContainer">
  <input type="submit" class="btn btn-success" name="submit" value="Submit"> 
  &nbsp;&nbsp; &nbsp;
  <input type="reset" class="btn btn-danger" value="reset" > 
</div>
</div>
</fieldset>
</form>
</td>

</tbody>
</table>
</div>

</section>

<?php include "footer.php" ?>
 
  <!-- for date picker -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
 

<script>
  $(document).ready(function() {
	  
	   $('#datetimepicker8').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"	
      }
    });
	
	
                $('form').submit(function(event) { //Trigger on form submit

             //Fetch form data
             var mobile  = $('input[name=phoneNumber]').val();
             var name  = $('input[name=fullName]').val();
             var address  = $('input[name=address]').val();
             var city  = $('input[name=city]').val();
             var landmark  = $('input[name=landmark]').val();
             var postalcode  = $('input[name=postcode]').val();
             var pdate  = $('input[name=pdate]').val();


			 //alert(pdate);'fullName':name,'address':address,'city':city,'landmark':landmark,'postalcode':postcode,'pdate':pdate
			 
                    $.ajax({ //Process the form using $.ajax()
                        type        : 'POST', //Method type
                        url         : 'sell_insert.php', //Your form processing file url
                        dataType    : "json",
                        data        : {'phoneNumber':mobile,'fullName':name,'address':address,'city':city,'landmark':landmark,'postcode':postalcode,'pdate':pdate}, //Forms name
                        success     : function(data) {
						
                          if(data.msg=='success')
                           {  
                             //swal("success...we will meet you between 10:00 AM to 6:00 PM on " +pdate); 
							 $("#success").html("<div class='alert alert-info'>Order placed...we will meet you between 10:00 AM to 5:00 PM on your pickupdate</div>");
							 $("#sellform")[0].reset();
                           } 
                         else
                         {
							  if(data.msg=='error')
							 $("#success").html("<div class='alert alert-danger'>Something went wrong</div>");
                         }

                       }
                     });
                     event.preventDefault();//Prevent the default submit
                   });
              });
            </script>