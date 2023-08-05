<div class="modal fade" id="update_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_itemquery.php">
				<div class="modal-header">
					<h3 class="modal-title">Update Item</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Item Name</label>
							<input type="hidden" name="user_id" value="<?php echo $fetch['user_id']?>"/>
							<input type="text" name="itemname" value="<?php echo $fetch['itemname']?>" class="form-control" required="required"/>
						</div>
                        <div class="form-group">
                        <label>Category</label>  
                                <input type="radio" name="category" value="Gold" class="form-control" required="required" 
                                <?php if($fetch['category'] == "Gold") echo "checked"; ?>
                                > 
                                <label>Gold</label> <br><br>
                                <label>Silver</label> 
                                <input type="radio" name="category" value="Silver" class="form-control" required="required"
                                <?php if($fetch['category'] == "Silver") echo "checked"; ?> 
                                >
						</div>
                        <div class="form-group">
							<label>Weight</label>
							<input type="text" name="weight" value="<?php echo $fetch['weight']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Quantity</label>
							<input type="number" name="quantity" value="<?php echo $fetch['quantity']?>" class="form-control" required="required"/>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>