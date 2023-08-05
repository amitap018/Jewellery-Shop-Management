<div class="modal fade" id="update_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_accountquery.php">
				<div class="modal-header">
					<h3 class="modal-title">Update Account</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
                        <div class="form-group">
                        <label>Account Type</label>  
                                <input type="radio" name="type" value="Income" class="form-control" required="required" 
                                <?php if($fetch['type'] == "Income") echo "checked"; ?>
                                > 
                                <label>Income</label> <br><br>
                                <label>Expense</label> 
                                <input type="radio" name="type" value="Expense" class="form-control" required="required"
                                <?php if($fetch['type'] == "Expense") echo "checked"; ?> 
                                >
						</div>
                        <div class="form-group">
							<label>Account ID</label>
							<input type="number" name="id" value="<?php echo $fetch['id']?>" class="form-control" required="required" disabled/>
						</div>
						<div class="form-group">
							<label>Account Name</label>
							<input type="text" name="name" value="<?php echo $fetch['name']?>" class="form-control" required="required"/>
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
