<?php
?>

<div class="col-4" >
  
<img src="images/logo.png" style="height: 150px" >

</div>

<div class="col-4" >


<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newbt" style="margin-top: 40px" >
 CONTACT US
</button>

<!-- Modal -->
<div class="modal fade" id="newbt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newbtLabel" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header bg-dark text-warning ">
        <h1 class="modal-title fs-5  " id="newbtLabel">GIVE FEEDBACKS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body  bg-dark text-warning">
          
<table>
	
<form action="feedback_user.php" >
	
<tr>
	<th>NAME</th>
  <td><input type="text" name="feedback_name"></td>

</tr>

<tr>
	<th>EMAIL</th>
  <td><input type="text" name="feedback_email"></td>
    
</tr>
<tr>
	<th>FEEDBACK</th>
  <td><textarea name="feedback" style="width: 300px;height:100px" ></textarea></td>
    
</tr>





</table>

      </div>
      <div class="modal-footer  bg-dark text-warning">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name=" login" value="SEND" class="btn btn-warning" >
       <!--  <button type="button" class="btn btn-primary">Understood</button> -->
        </form>
      </div>
    </div>
  </div>




<?php


?>









