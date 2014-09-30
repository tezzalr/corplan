<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 0px; color:grey; float:right">
		<div>
			<h5 style="color:grey">Initiative</h5>
			<h4>
				<?php 
					if($initiative['stat']=="Delay"){$clr="danger"; $icn="remove";}
					elseif($initiative['stat']=="In Progress"){$clr="warning"; $icn="refresh";}
					elseif($initiative['stat']=="Completed"){$clr="success"; $icn="ok";}
					else{$clr="inverse"; $icn="off";}
				?>
				<button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button>
				<?php echo $initiative['int']->code?> <?php echo $initiative['int']->title?>
			</h4>
		</div>
		<div style="width:400px; float:right">
			<?php
				$stdate = strtotime($initiative['int']->start);
				$eddate = strtotime($initiative['int']->end);
				$crdate = strtotime(date('Y-m-d'));
				$pcttgl = ($crdate-$stdate)/($eddate-$stdate)*100;
				if($pcttgl<1){$pcttgl = 0;}
			?>
			<span><?php echo date("j M y", $stdate);?></span>
			<span style="float:right"><?php echo date("j M y", $eddate);?></span>
			<div class="progress">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pcttgl?>%">
				<span><?php echo number_format($pcttgl,1)?>%</span>
			  </div>
			</div>
			
		</div>
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
				<input type="hidden" value="<?php echo $initiative['int']->id?>" name="initiative">
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
				<tr class="headertab"><th></th><th style="width:90px">Workblock</th><th>Milestone</th><th>Start Date</th><th>End Date</th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($workblocks as $wb){?>
				<tr id="wbdtl_<?php echo $wb['wb']->id?>">
					<td rowspan=<?php echo count($wb['ms'])+1?>><?php 
						if($wb['stat']=="Delay"){$clr="danger"; $icn="remove";}
						elseif($wb['stat']=="In Progress"){$clr="warning"; $icn="refresh";}
						elseif($wb['stat']=="Completed"){$clr="success"; $icn="ok";}
						else{$clr="inverse"; $icn="off";}
					?>
					<center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>
					<td colspan=2><?php echo $i;?>. <a href="<?php echo base_url()?>workblock/detail_workblock/<?php echo $wb['wb']->id?>"><?php echo $wb['wb']->title?></a></td>
					<td><?php if($wb['wb']->start){echo date("j M y", strtotime($wb['wb']->start));}?></td>
					<td><?php if($wb['wb']->end){echo date("j M y", strtotime($wb['wb']->end));}?></td>
					<?php if($user['role']=='admin'){?><td>
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_wb_<?php echo $wb['wb']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_workblock(<?php echo $wb['wb']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td><?php }?>
					
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
				</tr>
				<?php $j=1; foreach($wb['ms'] as $ms){?>
				<tr class="ms_wb_<?php echo $wb['wb']->id?>" style="">
					<td><?php 
						if($ms->status=="Delay"){$clr="danger"; $icn="remove";}
						elseif($ms->status=="In Progress"){$clr="warning"; $icn="refresh";}
						elseif($ms->status=="Completed"){$clr="success"; $icn="ok";}
						else{$clr="inverse"; $icn="off";}
					?>
					<center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>
					<td><?php echo $j.". ".$ms->title?></td>
					<td><?php if($ms->start){echo date("j M y", strtotime($ms->start));}?></td>
					<td><?php if($ms->end){echo date("j M y", strtotime($ms->end));}?></td>
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