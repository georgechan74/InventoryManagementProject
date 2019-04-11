<?php    
   
	$connection = OpenCon();
	
	
	$locationQuery = " SELECT LOCATION FROM `locations`";
	$locationResult = $connection->query($locationQuery);
	$lResult = $connection->query($locationQuery);

    $bureauQuery = " SELECT BUREAU FROM `bureaus`";
	$theResult = $connection->query($bureauQuery);
	$Result = $connection->query($bureauQuery);

	$statusQuery = " SELECT STATUS_ FROM `statuses`";
	$statusResult = $connection->query($statusQuery);
	$sResult = $connection->query($statusQuery);

	$binventQuery = " SELECT B_INVENT_UNITCODE FROM `b_invent_unitcodes`";
	$binventResult = $connection->query($binventQuery);
	$binResult = $connection->query($binventQuery);

?>

<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add Asset </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
		  	</div>
            <div class="modal-body">
				<div class="container-fluid">
				<form method='post' action='' enctype="multipart/form-data">
					<input type="hidden" class="id" name="id">

					<div class="form-row">
					<div class="form-group col-md-6">
                         <label>Location:</label>
                         <select class="form-control" id="location">
                             <?php  
                                while ($row = $locationResult->fetch()) {
									echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
								}    
                             ?>
                         </select>
                    </div>

					<!-- 
						<div class="form-group col-md-6">
							<label class="control-label">Location:</label>
							<input type="text" class="form-control" name="location" id="location">
						</div> -->
						
						<div class="form-group col-md-6">
							<label class="control-label">Assignee:</label>
							<input type="text" class="form-control" name="assignee" id="assignee">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">Description:</label>
							<input type="text" class="form-control" name="description" id="description">
						</div>
									
						<div class="form-group col-md-6">
							<label class="control-label">Make:</label>
							<input type="text" class="form-control" name="make" id="make">
						</div>				
					
						<div class="form-group col-md-6">
							<label class="control-label"> Model:</label>
							<input type="text" class="form-control" name="model" id="model">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">SerialNo:</label>
							<input type="text" class="form-control" name="serialNo" id="serialNo">
						</div>
					
						<div class="form-group col-md-6">
							<label class="control-label">CountyNo:</label>
							<input type="text" class="form-control" name="countyNo" id="countyNo">
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Cost:</label>
							<input type="text" class="form-control" name="cost" id="cost">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label class="control-label">Comments:</label>
							<input type="text" class="form-control" name="comments" id="comments">
						</div>

						<div class="form-group col-md-6">
                            <label>Status:</label>
                            <select   class="form-control" id="status">
                                <?php  
                                	while ($row = $statusResult->fetch()) {
										echo "<option value='". $row['STATUS_'] ."'>". $row['STATUS_'] ."</option>";
									}                                
    	                        ?>
                            </select>
                        </div>
					
						<!-- <div class="form-group col-md-6">
							<label class="control-label">Status:</label>
							<input type="text" class="form-control" name="status" id="status">
						</div> -->
					
						<div class="form-group col-md-6">
							<label class="control-label"> Category:</label>
							<input type="text" class="form-control" name="category" id="category">
						</div>

						<div class="form-group col-md-6">
                            <label>BinventUnitCode:</label>
                            <select   class="form-control" id="binvent">
                                <?php  
                                	while ($row = $binventResult->fetch()) {
										echo "<option value='". $row['B_INVENT_UNITCODE'] ."'>". $row['B_INVENT_UNITCODE'] ."</option>";
									}                                       
                                ?>
                            </select>
                        </div>

				
					<!-- 	<div class="form-group col-md-6">
							<label class="control-label">BinventUnitCode:</label>
							<input type="text" class="form-control" name="binvent" id="binvent">
						</div> -->
					
						<div class="form-group col-md-6">
							<label class="control-label">Sublocation:</label>
							<input type="text" class="form-control" name="sublocations" id="sublocations">
						</div>

						<div class="form-group col-md-6">
                            <label>Bureau:</label>
                            <select class="form-control" id="bureau">
                                <?php  
                                	while ($row = $theResult->fetch()) {
										echo "<option value='". $row['BUREAU'] ."'>". $row['BUREAU'] ."</option>";
									}                                     
                                ?>
                            </select>
                         </div>

						<!-- <div class="form-group col-md-6">
							<label class="control-label"> Bureau:</label>
							<input type="text" class="form-control" name="bureau" id="bureau">
						</div> -->

						<div class="form-group col-md-6.5">
							<label class="control-label"> Asset Image:</label>
							<input type='file' name='file' id='file'>
						</div>

						<div class="form-group col-md-6">
							<label class="control-label"> Location Image:</label>
							<input type='file' name='file2' id='file2'>
						</div>

						<div class="form-group col-md-6.5">
							<label class="control-label"> Assigee Image:</label>
							<input type='file' name='file3' id='file3'>
						</div>


					</div>
            	</div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
               <input type='button' class='btn btn-info' value='Upload' id='upload'>
			</form>
			<div id='preview'></div>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
	            <h4 class="modal-title w-100 font-weight-bold">Edit Asset</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
		  	</div>
			<div class="modal-body">
			<div class="container-fluid">
			<form form method="post" action='' id="editForm" enctype="multipart/form-data">
				<input type="hidden" class="id" name="id">
				<div class="form-row">


					<div class="form-group col-md-6">
                         <label>Location:</label>
                         <select class="form-control location" name="location" id="location">
                             <?php  
                                while ($row = $lResult->fetch()) {
									echo "<option value='". $row['LOCATION'] ."'>". $row['LOCATION'] ."</option>";
								}    
                             ?>
                         </select>
                    </div>
					<!-- <div class="form-group col-md-6">
						<label class="control-label">Location:</label>
						<input type="text" class="form-control location" name="location" id="location">
					</div> -->
				
					<div class="form-group col-md-6">
						<label class="control-label">Assignee:</label>
						<input type="text" class="form-control assignee" name="assignee" id="assignee">
					</div>
			
					<div class="form-group col-md-6">
						<label class="control-label">Description:</label>
						<input type="text" class="form-control description" name="description" id="description">
					</div>
								
					<div class="form-group col-md-6">
						<label class="control-label">Make:</label>
						<input type="text" class="form-control make" name="make" id="make">
					</div>				
				
					<div class="form-group col-md-6">
						<label class="control-label"> Model:</label>
						<input type="text" class="form-control model" name="model" id="model">
					</div>
				
					<div class="form-group col-md-6">
						<label class="control-label">SerialNo:</label>
						<input type="text" class="form-control serialNo" name="serialNo" id="serialNo">
					</div>
				
					<div class="form-group col-md-6">
						<label class="control-label">CountyNo:</label>
						<input type="text" class="form-control countyNo" name="countyNo" id="countyNo">
					</div>
					
					<div class="form-group col-md-6">
						<label class="control-label">Cost:</label>
						<input type="text" class="form-control cost" name="cost" id="cost">
					</div>
				</div>

				<div class="form-row">				
					 <div class="form-group col-md-6">
						<label class="control-label">Comments:</label>
						<input type="text" class="form-control comments" name="comments" id="comments">
					</div>
				
					<div class="form-group col-md-6">
                            <label>Status:</label>
                            <select  class="form-control status" name="status" id="status">
                                <?php  
                                	while ($row = $sResult->fetch()) {
										echo "<option value='". $row['STATUS_'] ."'>". $row['STATUS_'] ."</option>";
									}                                
    	                        ?>
                            </select>
                    </div>

					<!-- <div class="form-group col-md-6">
						<label class="control-label">Status:</label>
						<input type="text" class="form-control status" name="status" id="status">
					</div> -->
				
					<div class="form-group col-md-6">
						<label class="control-label"> Category:</label>
						<input type="text" class="form-control category" name="category" id="category">
					</div>
			

			       <div class="form-group col-md-6">
                            <label>BinventUnitCode:</label>
                            <select   class="form-control binvent" name="binvent" id="binvent">
                                <?php  
                                	while ($row = $binResult->fetch()) {
										echo "<option value='". $row['B_INVENT_UNITCODE'] ."'>". $row['B_INVENT_UNITCODE'] ."</option>";
									}                                       
                                ?>
                            </select>
                    </div>
			       <!-- <div class="form-group col-md-6">
						<label class="control-label">BinventUnitCode:</label>
						<input type="text" class="form-control binvent" name="binvent" id="binvent">
					</div> -->
				
					<div class="form-group col-md-6">
						<label class="control-label">Sublocation:</label>
						<input type="text" class="form-control sublocations" name="sublocations" id="sublocations">
					</div>


						<div class="form-group col-md-6">
                            <label>Bureau:</label>
                            <select class="form-control bureau" name="bureau" id="bureau">
                                <?php  
                                	while ($row = $Result->fetch()) {
										echo "<option value='". $row['BUREAU'] ."'>". $row['BUREAU'] ."</option>";
									}                                     
                                ?>
                            </select>
                         </div>
				
					<!-- <div class="form-group col-md-6">
						<label class="control-label"> Bureau:</label>
						<input type="text" class="form-control bureau" name="bureau" id="bureau">
					</div> -->

					<div class="form-group col-md-6.5">
						<label class="control-label"> Asset Image:</label>
						<input type="file" name="file" id="file"/>
							<span id="asset_image"></span>
					</div>

					<div class="form-group col-md-6">
						<label class="control-label"> Location Image:</label>
						<input type="file" name="file2" id="file2"/>
							<span id="location_image"></span>
					</div>

					<div class="form-group col-md-6.5">
						<label class="control-label"> Assignee Image:</label>
						<input type="file" name="file3" id="file3"/>
							<span id="assignee_image"></span>
					</div>
			</div>
           	</div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
			</form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">Salvage Asset</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Do you want to mark asset as salvage?</p>			
				<form id="salvageForm">
				<input type="hidden" class="id" name="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Yes</button>
			</form>
			</div>
        </div>
    </div>
</div>

<!-- Restore -->
<div class="modal fade" id="restore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">Restore Asset</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Do you want to restore asset?</p>			
				<form id="restoreForm">
				<input type="hidden" class="id" name="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Yes</button>
			</form>
			</div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  ...
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>



  <!-- Info-->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Addition Asset Info</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#xD7;</button>
			  </div>
			  
            <div class="modal-body">
				<div class="container-fluid">
				<form method='post' action=''>

					<input type="hidden" class="id" name="id">
					<div class="form-row">

						<div class="form-group col-md-6">
							<label class="control-label">Description:</label>
								<span id="descriptionInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Make:</label>
								<span id="makeInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Model:</label>
								<span id="modelInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Serial No:</label>
								<span id="serialInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">County No:</label>
								<span id="countyInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Acquire Date:</label>
								<span id="dateInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Comments:</label>
								<span id="commentsInfo"></span>
				
						</div>

						<div class="form-group col-md-6">
							<label class="control-label">Category:</label>
								<span id="categoryInfo"></span>
				
						</div>
					
					</div>
            	</div> 
			</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                 
			</form>
		
			</div>
        </div>
    </div>
</div>