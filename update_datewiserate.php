<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_datewisequery.php">
				<div class="modal-header">
					<h3 class="modal-title">Update</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
                        <div class="form-group">
							<label>Date</label>
							<input type="date" name="date" value="<?php echo $fetch['date']?>" class="form-control" required="required"/>
						</div>
						<div class="form-group">
							<label>Silver Rate</label>
							<input type="number" name="silver_rate" value="<?php echo $fetch['silver_rate']?>" class="form-control" required="required"/>
						</div>
                        <div class="form-group">
							<label>Gold Rate</label>
							<input type="number" name="gold_rate" value="<?php echo $fetch['gold_rate']?>" class="form-control" required="required"/>
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
