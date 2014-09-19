<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 30px;">
		<a href="<?php echo base_url()?>initiative/detail_initiative/<?php echo $wb->initiative_id?>"><h2 style=""><?php echo $wb->title?></h2></a>
	</div>
	<div>
		<div>
			<table class="table table-bordered" style="width:50%">
				<tbody>
					<tr><td style="width:125px">Start Date</td><td><?php echo $wb->start?></td></tr>
					<tr><td>End Date</td><td><?php echo $wb->end?></td></tr>
					<tr><td>Objectives</td><td><?php echo $wb->objective?></td></tr>
				</tbody>
			</table>
		</div><br>
		<div>
			<h4>Key Milestones</h4>
			<button style="float:right; margin-top:-34px;" class="btn btn-info btn-sm" onclick="toggle_visibility('new_milestone');">
				<span class="glyphicon glyphicon-plus"></span> Milestone
			</button>
			<div id="new_milestone" style="display:none">
				<hr>
				<h3>New Milestone</h3>
				<form class="form-horizontal" method="post" id="form_src_rm" action="<?php echo base_url();?>milestone/submit_milestone">
					<input type="hidden" value="<?php echo $wb->id?>" name="workblock">
					<div class="form-group">
						<label class="col-sm-2 control-label">Milestone</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" placeholder="Milestone" name="title">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-4">
						  <select class="form-control" name="status" id="status" onchange="is_delay_or_not();">
						  	<option value="Not Started Yet">Not Started Yet</option>
						  	<option value="In Progress">In Progress</option>
						  	<option value="Completed">Completed</option>
						  	<option value="Delay">Delay</option>
						  </select>
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
					<div id="fordelay" style="display:none"><hr>
						<div class="form-group">
							<label class="col-sm-2 control-label">Revised Date</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" placeholder="mm-dd-yy" name="revised" id="revised">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Reason for Delay</label>
							<div class="col-sm-4">
							  <textarea class="form-control" placeholder="Reason" name="reason" style="height:80px"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label"></label><div class="col-sm-4"><input type="submit" class="btn btn-success" ></div>
					</div>
				</form>
				<hr>
			</div>
			<table class="table table-bordered" style="margin-top:20px">
				<thead>
					<tr><th></th><th>Milestone</th><th>Status</th><th style="width:110px">Start Date</th><th style="width:110px">End Date</th><th style="width:110px">Revised Date</th>
					<th>Reason Delay</th>
					<th style="width:55px"></th><th style="width:70px"></th></tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($ms as $each){?>
					<tr id="msdtl_<?php echo $each->id?>">
						<td><?php echo $i?></td>
						<td><?php echo $each->title?></td>
						<td><?php echo $each->status?></td>
						<td><?php echo $each->start?></td>
						<td><?php echo $each->end?></td>
						<td></td>
						<td></td>
						<td><button class="btn btn-success btn-xs">Start</button></td>
						<td>
							<a href="" class="btn btn-warning  btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
							<button class="btn btn-danger btn-xs" onclick="delete_milestone(<?php echo $each->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
						</td>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>
		</div>
	</div><div style="clear:both"></div><br>
</div>

<script>
    function is_delay_or_not(){
    	var stat = $("#status").val();
    	if(stat == 'Delay'){
    		$("#fordelay").css("display","block");
    	}
    	else{
    		$("#fordelay").css("display","none");
    	}
    }
    
    $('#start').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#end').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	$('#revised').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	function delete_milestone(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"milestone/delete_milestone",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#msdtl_'+id).animate({'opacity':'toggle'});
							succeedMessage('Milestone berhasil dihapus');
						}
					}
				});
			}
		});
	}
</script>