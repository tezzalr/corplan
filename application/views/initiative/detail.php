<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h4 style="color:grey">Initiative <?php echo $initiative->code?></h4>
		<h2 style=""><?php echo $initiative->title?></h2>
	</div>
	<div>
		<div>
			<table class="table table-bordered" style="width:250px">
				<tbody>
					<tr><td>Start Date</td><td><?php echo $initiative->start?></td></tr>
					<tr><td>End Date</td><td><?php echo $initiative->end?></td></tr>
				</tbody>
			</table>
		</div><br>
		
		<h4>Workblock</h4>
		<button style="float:right; margin-top:-34px;" class="btn btn-info btn-sm" onclick="toggle_visibility('new_workblock');">
			<span class="glyphicon glyphicon-plus"></span> Workblock
		</button>
		<div id="new_workblock" style="display:none">
			<hr>
			<h3>New Workblock</h3>
			<form class="form-horizontal" method="post" id="form_src_rm" action="<?php echo base_url();?>workblock/submit_workblock">
				<input type="hidden" value="<?php echo $initiative->id?>" name="initiative">
				<div class="form-group">
					<label class="col-sm-2 control-label">Workblock</label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" placeholder="Workblock" name="title">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">PIC</label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" placeholder="PIC" name="pic">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" placeholder="mm-dd-yy" name="start" id="start">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-4">
					  <input type="text" class="form-control" placeholder="mm-dd-yy" name="end" id="end">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Objective</label>
					<div class="col-sm-4">
					  <textarea class="form-control" placeholder="Objectives" style="height:90px" name="objective"></textarea>
					</div>
				</div>
				<input type="submit" class="btn btn-success" style="margin-left:200px">
			</form>
			<hr>
		</div>
		<table class="table table-bordered" style="margin-top:20px">
			<thead>
				<tr><th></th><th>Workblock</th><th>Start Date</th><th>End Date</th><th style="width:80px"></th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($workblocks as $wb){?>
				<tr id="wbdtl_<?php echo $wb->id?>"><td><?php echo $i;?></td>
					<div id="wb">
					<td><a href="<?php echo base_url()?>workblock/detail_workblock/<?php echo $wb->id?>"><?php echo $wb->title?></a></td>
					<td><?php echo $wb->start?></td><td><?php echo $wb->end?></td>
					<td>
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_wb_<?php echo $wb->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_workblock(<?php echo $wb->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td>
					</div>
				</tr>
				<tr id="edit_wb_<?php echo $wb->id?>" style="display:none"><td></td>
					<div>
					<td colspan=3>
						<form class="form-horizontal" method="post" id="form_src_rm" action="">
							<div class="form-group">
								<label class="col-sm-2 control-label">Workblock</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="Workblock" value="<?php echo $wb->title?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Start Date</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="dd-mm-yy" value="<?php echo $wb->start?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">End Date</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="dd-mm-yy" value="<?php echo $wb->end?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Objective</label>
								<div class="col-sm-4">
								  <textarea class="form-control" placeholder="Objectives" style="height:90px"><?php echo $wb->objective?></textarea>
								</div>
							</div>
							<input type="submit" class="btn btn-success" style="margin-left:170px">
						</form>
					<td>
						
					</td>
					</div>
				</tr>
				<?php $i++; }?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
</div>

<script>
    $('#start').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#end').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	function delete_workblock(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"workblock/delete_workblock",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#wbdtl_'+id).animate({'opacity':'toggle'});
							succeedMessage('Workblock berhasil dihapus');
						}
					}
				});
			}
		});
	}
</script>