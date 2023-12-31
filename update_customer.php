<div class="modal fade" id="update_modal<?php echo $fetch['user_id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_customerquery.php">
				<div class="modal-header">
					<h3 class="modal-title">Update User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<label>Name</label>
							<input type="hidden" name="user_id" value="<?php echo $fetch['user_id']?>"/>
							<input type="text" name="name" value="<?php echo $fetch['name']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" value="<?php echo $fetch['phone']?>" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" value="<?php echo $fetch['address']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="<?php echo $fetch['email']?>" class="form-control" required="required"/>
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