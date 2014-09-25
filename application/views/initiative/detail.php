<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 10px; float:right">
		<h5 style="color:grey">Initiative</h5>
		<h4 style="color:grey">
		<button class="btn btn-success btn-xs" disabled><span class="glyphicon glyphicon-ok"></span></button> 
		<?php echo $initiative->code?> <?php echo $initiative->title?></h4>
		<!--<div>
			<table class="table table-bordered" style="width:250px">
				<tbody>
					<tr><td>Start Date</td><td><?php echo $initiative->start?></td></tr>
					<tr><td>End Date</td><td><?php echo $initiative->end?></td></tr>
				</tbody>
			</table>
		</div><br>-->
	</div><div style="clear:both"></div>
	<h3>Workblock Summary</h3>
	<div>
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
				<tr class="headertab"><th></th><th>Workblock</th><th>Milestone</th><th>Status</th><th>Start Date</th><th>End Date</th><th style="width:80px"></th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($workblocks as $wb){?>
				<tr id="wbdtl_<?php echo $wb['wb']->id?>">
					<td rowspan=<?php echo count($wb['ms'])+1?>></td>
					<td colspan=2><?php echo $i;?>. <a href="<?php echo base_url()?>workblock/detail_workblock/<?php echo $wb['wb']->id?>"><?php echo $wb['wb']->title?></a></td>
					<td><?php echo $wb['stat'];?></td>
					<td><?php if($wb['wb']->start){echo date("d M y", strtotime($wb['wb']->start));}?></td>
					<td><?php if($wb['wb']->end){echo date("d M y", strtotime($wb['wb']->end));}?></td>
					<td>
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_wb_<?php echo $wb['wb']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_workblock(<?php echo $wb['wb']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td>
					
				</tr>
				<tr id="edit_wb_<?php echo $wb['wb']->id?>" style="display:none">	
					<td colspan=5>
						<form class="form-horizontal" method="post" id="form_src_rm" action="<?php echo base_url();?>workblock/submit_workblock/<?php echo $wb['wb']->id?>">
							<input type="hidden" value="<?php echo $initiative->id?>" name="initiative">
							<div class="form-group">
								<label class="col-sm-2 control-label">Workblock</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="Workblock" name="title" value="<?php echo $wb['wb']->title?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">PIC</label>
								<div class="col-sm-4">
								  <input type="text" class="form-control" placeholder="PIC" name="pic" value="<?php echo $wb['wb']->pic?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Start Date</label>
								<div class="col-sm-4">
								 	<?php $start=""; if($wb['wb']->start){$start = date("m/d/Y", strtotime($wb['wb']->start));}?>
									<input type="text" class="form-control" placeholder="dd-mm-yy" name="start" value="<?php echo $start?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">End Date</label>
								<div class="col-sm-4">
									<?php $end=""; if($wb['wb']->end){$end = date("m/d/Y", strtotime($wb['wb']->end));}?>
									<input type="text" class="form-control" placeholder="dd-mm-yy" name="end" value="<?php echo $end?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Objective</label>
								<div class="col-sm-4">
								  <textarea class="form-control" placeholder="Objectives" name="objective" style="height:90px"><?php echo $wb['wb']->objective?></textarea>
								</div>
							</div>
							<input type="submit" class="btn btn-success" style="margin-left:170px">
						</form>
					<td>
						
					</td>
					
				</tr>
				<?php $j=1; foreach($wb['ms'] as $ms){?>
				<tr class="ms_wb_<?php echo $wb['wb']->id?>">
					<td></td><td><?php echo $j.". ".$ms->title?></td><td><?php echo $ms->status?></td>
					<td><?php if($ms->start){echo date("j M y", strtotime($ms->start));}?></td>
					<td><?php if($ms->end){echo date("j M y", strtotime($ms->end));}?></td><td></td>
				</tr>
				<?php $j++;}?>
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
    function edit_wb(id){
    	toggle_visibility('edit_wb_'+id);
    	//toggle_visibility('ms_wb_'+id);
    }
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
							if($('.ms_wb_'+id).length > 0){$('.ms_wb_'+id).animate({'opacity':'toggle'});}
							succeedMessage('Workblock berhasil dihapus');
						}
					}
				});
			}
		});
	}
</script>