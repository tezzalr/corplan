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
					<tr class="headertab"><th></th><th colspan=2>Milestone</th><th style="width:110px">Start Date</th><th style="width:110px">End Date</th>
					<!--<th style="width:110px">Revised Date</th>-->
					<th>Reason Delay</th><th>Action Plan</th>
					<th style="width:55px"></th></tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($ms as $each){?>
					<tr id="msdtl_<?php echo $each->id?>">
						<?php 
							if($each->status=="Delay"){$clr="danger"; $icn="remove";}
							elseif($each->status=="In Progress"){$clr="warning"; $icn="refresh";}
							elseif($each->status=="Completed"){$clr="success"; $icn="ok";}
							else{$clr="inverse"; $icn="off";}
						?>
						<td style="width:40px"><center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>	
						
						<td style="min-width:500px"><?php echo $i?>. <?php echo $each->title?></td>
						<td style="width:40px"><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-comment"></span></button></td>
						<td><?php if($each->start){echo date("d M y", strtotime($each->start));}?></td>
						<td><?php if($each->end){echo date("d M y", strtotime($each->end));}?></td>
						<!--<td></td>-->
						<td></td>
						<td></td>
						<td>
							<?php if($each->status == "Not Started Yet"){?>
							<form method="post" action="<?php echo base_url();?>milestone/change_status/start/<?php echo $each->id?>/<?php echo $each->workblock_id?>"><button type="submit" class="btn btn-warning btn-xs">Start</button></form>
							<?php }elseif($each->status == "In Progress"){?>
							<form method="post" action="<?php echo base_url();?>milestone/change_status/end/<?php echo $each->id?>/<?php echo $each->workblock_id?>"><button type="submit" class="btn btn-success btn-xs">End</button></form>
							<?php }elseif($each->status == "Delay"){?>
							<button type="submit" class="btn btn-danger btn-xs" onclick="revise_ms(<?php echo $each->id?>)">Revise</button>
							<?php }?>
						</td>
						<?php if($user['role']=='admin'){?><td>
							<button class="btn btn-warning  btn-xs" onclick="edit_ms(<?php echo $each->id?>)"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger btn-xs" onclick="delete_milestone(<?php echo $each->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
						</td><?php }?>
					</tr>
					<tr id="edit_ms_<?php echo $each->id?>" style="display:none">	
						<td colspan=8>
							<form class="form-horizontal" method="post" action="<?php echo base_url();?>milestone/submit_milestone/<?php echo $each->id?>">
								<input type="hidden" value="<?php echo $wb->id?>" name="workblock">
								<div class="form-group">
									<label class="col-sm-2 control-label">Milestone</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control" placeholder="Milestone" name="title" value="<?php echo $each->title?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Status</label>
									<div class="col-sm-4">
									  <select class="form-control" name="status" id="status">
										<option value="Not Started Yet" <?php if($each->status == "Not Started Yet"){echo "selected";}?>>Not Started Yet</option>
										<option value="In Progress" <?php if($each->status == "In Progress"){echo "selected";}?>>In Progress</option>
										<option value="Completed" <?php if($each->status == "Completed"){echo "selected";}?>>Completed</option>
										<option value="Delay" <?php if($each->status == "Delay"){echo "selected";}?>>Delay</option>
									  </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Start Date</label>
									<div class="col-sm-4">
										<?php $start=""; if($each->start){$start = date("m/d/Y", strtotime($each->start));}?>
										<input type="date" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY" value="<?php echo $start?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-4">
										<?php $end=""; if($each->end){$end = date("m/d/Y", strtotime($each->end));}?>
										<input type="date" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY" value="<?php echo $end?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label><div class="col-sm-4"><input type="submit" class="btn btn-success" ></div>
								</div>
								</form>
							</td>
						</tr>
						<tr id="revise_ms_<?php echo $each->id?>" style="display:none">
							<td colspan=8>
								<form class="form-horizontal" method="post" action="<?php echo base_url();?>milestone/submit_revised/<?php echo $each->id."/".$wb->id?>">
									<div class="form-group">
										<label class="col-sm-2 control-label">Revised Date</label>
										<div class="col-sm-4">
											<?php $rev=""; if($each->revised){$rev = date("m/d/Y", strtotime($each->revised));}else{$rev = date("m/d/Y", strtotime($each->end));}?>
											<input type="date" class="form-control" id="revised_<?php echo $each->id?>" name="revised" placeholder="mm/dd/YYYY" value="<?php echo $rev?>">
										</div>
										<script>
											$('#revised_'+<?php echo $each->id?>).datepicker({
												autoclose: true,
												todayHighlight: true
											});
										</script>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Reason for Delay</label>
										<div class="col-sm-4">
											<textarea class="form-control" placeholder="Reason" name="reason" style="height:80px" value="<?php echo $each->reason?>"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Action Plan</label>
										<div class="col-sm-4">
											<textarea class="form-control" placeholder="Action Plan" name="reason" style="height:80px" value="<?php echo $each->reason?>"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label><div class="col-sm-4"><input type="submit" class="btn btn-success" ></div>
								</div>
							</form>
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
    
    function edit_ms(id){
    	toggle_visibility('edit_ms_'+id);
    }
    
    function revise_ms(id){
    	toggle_visibility('revise_ms_'+id);
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