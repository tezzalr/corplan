<?php 
	$msid = $this->uri->segment(4);
?>
<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 10px; float:right">
		<h5><a  style="color:grey" href="<?php echo base_url()?>initiative/detail_initiative/<?php echo $wb['wb']->initiative_id?>">Workblock</a></h5>
		<h4 style="color:grey">
			<?php 
				if($wb['stat']=="Delay"){$clr="danger"; $icn="remove";}
				elseif($wb['stat']=="In Progress"){$clr="warning"; $icn="refresh";}
				elseif($wb['stat']=="Completed"){$clr="success"; $icn="ok";}
				else{$clr="inverse"; $icn="off";}
			?>
			<button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button>
			<?php echo $wb['wb']->title?>
		</h4>
	</div><div style="clear:both"></div>
	<div>
		<div>
			<h3>Milestones</h3>
			<?php $inits = explode(';',$user['initiative']); if($user['role']=='admin' || in_array($wb['wb']->code,$inits)){?>
			<button style="float:right; margin-top:-34px;" class="btn btn-info btn-sm" onclick="toggle_visibility('new_milestone');">
				<span class="glyphicon glyphicon-plus"></span> Milestone
			</button>
			<?php }?>
			<div id="new_milestone" style="display:none">
				<hr>
				<h3>New Milestone</h3>
				<form class="form-horizontal" method="post" id="form_src_rm" action="<?php echo base_url();?>milestone/submit_milestone">
					<input type="hidden" value="<?php echo $wb['wb']->id?>" name="workblock">
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
					<tr id="msdtl_<?php echo $each['ms']->id?>">
						<?php 
							if($each['ms']->status=="Delay"){$clr="danger"; $icn="remove";}
							elseif($each['ms']->status=="In Progress"){$clr="warning"; $icn="refresh";}
							elseif($each['ms']->status=="Completed"){$clr="success"; $icn="ok";}
							else{$clr="inverse"; $icn="off";}
						?>
						<td style="width:40px"><center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>	
						
						<td style="min-width:500px"><?php echo $i?>. <?php echo $each['ms']->title?></td>
						<td style="width:40px"><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-comment"></span></button></td>
						<td><?php if($each['ms']->start){echo date("j M y", strtotime($each['ms']->start));}?></td>
						<td><?php if($each['ms']->end){echo date("j M y", strtotime($each['ms']->end));}?></td>
						<!--<td></td>-->
						<td></td>
						<td></td>
						<td>
							<?php if($each['ms']->status == "Not Started Yet"){?>
							<form method="post" action="<?php echo base_url();?>milestone/change_status/start/<?php echo $each['ms']->id?>/<?php echo $each['ms']->workblock_id?>"><button type="submit" class="btn btn-warning btn-xs">Start</button></form>
							<?php }elseif($each['ms']->status == "In Progress"){?>
							<form method="post" action="<?php echo base_url();?>milestone/change_status/end/<?php echo $each['ms']->id?>/<?php echo $each['ms']->workblock_id?>"><button type="submit" class="btn btn-success btn-xs">End</button></form>
							<?php }elseif($each['ms']->status == "Delay"){?>
							<?php if($each['revise']){$tul = "Fw-up";}else{$tul = "Revise";}?>
							<button type="submit" class="btn btn-danger btn-xs" onclick="revise_ms(<?php echo $each['ms']->id?>)"><?php echo $tul?></button>
							<?php }?>
						</td>
						<?php if($user['role']=='admin'){?><td style="width:70px">
							<button class="btn btn-warning  btn-xs" onclick="edit_ms(<?php echo $each['ms']->id?>)"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger btn-xs" onclick="delete_milestone(<?php echo $each['ms']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
						</td><?php }?>
					</tr>
					<tr id="edit_ms_<?php echo $each['ms']->id?>" style="display:none">	
						<td colspan=8>
							<form class="form-horizontal" method="post" action="<?php echo base_url();?>milestone/submit_milestone/<?php echo $each['ms']->id?>">
								<input type="hidden" value="<?php echo $wb['wb']->id?>" name="workblock">
								<div class="form-group">
									<label class="col-sm-2 control-label">Milestone</label>
									<div class="col-sm-4">
									  <input type="text" class="form-control" placeholder="Milestone" name="title" value="<?php echo $each['ms']->title?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Status</label>
									<div class="col-sm-4">
									  <select class="form-control" name="status" id="status">
										<option value="Not Started Yet" <?php if($each['ms']->status == "Not Started Yet"){echo "selected";}?>>Not Started Yet</option>
										<option value="In Progress" <?php if($each['ms']->status == "In Progress"){echo "selected";}?>>In Progress</option>
										<option value="Completed" <?php if($each['ms']->status == "Completed"){echo "selected";}?>>Completed</option>
										<option value="Delay" <?php if($each['ms']->status == "Delay"){echo "selected";}?>>Delay</option>
									  </select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Start Date</label>
									<div class="col-sm-4">
										<?php $start=""; if($each['ms']->start){$start = date("m/d/Y", strtotime($each['ms']->start));}?>
										<input type="date" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY" value="<?php echo $start?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">End Date</label>
									<div class="col-sm-4">
										<?php $end=""; if($each['ms']->end){$end = date("m/d/Y", strtotime($each['ms']->end));}?>
										<input type="date" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY" value="<?php echo $end?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label><div class="col-sm-4"><input type="submit" class="btn btn-success" ></div>
								</div>
								</form>
							</td>
						</tr>
					<tr id="revise_ms_<?php echo $each['ms']->id?>" style="<?php if($msid!=$each['ms']->id){echo "display:none";}?>">
						<td colspan=8>
							<div style="width:45%; float:left;">
								<form class="form-horizontal" method="post" action="<?php echo base_url();?>milestone/submit_revised/<?php echo $each['ms']->id."/".$wb['wb']->id?>">
									<?php $statform = "";
										if($each['revise']){
											if($each['revise']->user_id!= $user['id'] || ($each['revise'] && (!($each['revise']->desc_GH=="Rejected")&&!($each['revise']->desc_PMO=="Rejected")))){
												$statform = "disabled";
											}
										}
									?>
									<div class="form-group">
										<label class="col-sm-4 control-label">Revised Date</label>
										<div class="col-sm-8">
											<?php if(!$statform){?>
												<?php $rev=""; if($each['revise']){$rev = date("m/d/Y", strtotime($each['revise']->revised_date));}else{$rev = date("m/d/Y", strtotime($each['ms']->end));}?>
												<input type="date" class="form-control" id="revised_<?php echo $each['ms']->id?>" name="revised" placeholder="mm/dd/YYYY" value="<?php echo $rev?>" <?php echo $statform?>>
												<small style="color:grey">*format: mm/dd/YYYY</small>
											<?php }else{
												echo "<p class=\"form-control-static\">".date("j M Y", strtotime($each['revise']->revised_date))."</p>";
											}?>
										</div>
										<script>
											$('#revised_'+<?php echo $each['ms']->id?>).datepicker({
												autoclose: true,
												todayHighlight: true
											});
										</script>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Reason for Delay</label>
										<div class="col-sm-8">
											<textarea class="form-control" placeholder="Reason" name="reason" style="height:80px" <?php echo $statform?>><?php if($each['revise']){echo $each['revise']->reason;}?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Action Plan</label>
										<div class="col-sm-8">
											<textarea class="form-control" placeholder="Action Plan" name="action" style="height:80px" <?php echo $statform?>><?php if($each['revise']){echo $each['revise']->action;}?></textarea>
										</div>
									</div>
									<?php if(!$statform){?><div class="form-group">
										<label class="col-sm-4 control-label"></label><div class="col-sm-6"><input type="submit" class="btn btn-success" value="Submit"></div>
									</div><?php }?>
								</div>					
							</form>
							</div>
							<?php if($each['revise']){?>
							<div style="width:50%; float:left; margin-left:20px; background-color:#EBF4FC; padding:0 15px 15px 15px">
								<center><h4>Approval</h4></center>
								<div>
									<label>GH</label><br>
									<?php 
										if($each['revise']->desc_GH=="Rejected"){$gsts="danger";}
										elseif($each['revise']->desc_GH=="Approved"){$gsts="success";}
										else{$gsts="inverse";}
									?>
									<button style="margin-top:-5px" class="btn btn-<?php echo $gsts?> btn-sm" disabled></button>
									<span style="margin-left:10px">
										<?php echo $each['revise']->GH?>
									</span>
									<?php if($each['revise']->aprv_GH){?>
										<span style="float:right; margin-right:10px">
											<?php echo $each['revise']->desc_GH." at ".date("j M Y", strtotime($each['revise']->aprv_GH))?>
										</span><div style="clear:both"></div>
									<?php }?>
									<?php if($each['revise']->GH_cmnt){?>
										<div style="margin-top:10px">
											<small style="color:grey">Notes</small>
											<p><?php echo $each['revise']->GH_cmnt?></p>
										</div>
									<?php }?>
									<?php if($user['id']==$each['revise']->GH_id){?>
										<div style="margin-top:20px">
											<form id="GH_aprvl_form" action="<?php echo base_url().'milestone/aprove_revised/GH/'.$each['revise']->id.'/'.$each['ms']->id.'/'.$wb['wb']->id?>" method="post">	
												<div class="form-group">
													<textarea class="form-control" style="width:80%" placeholder="Comment for PIC" name="cmnt_GH"><?php echo $each['revise']->GH_cmnt?></textarea>
												</div>
												<input type="submit" class="btn btn-success btn-sm" name="yes" value="Yes">
												<input type="submit" class="btn btn-danger btn-sm" name="no" value="No">
											</form>
										</div>
									<?php }?>
								</div><hr>
								<div>
									<label>PMO</label><br>
									<?php 
										if($each['revise']->desc_PMO=="Approved"){$psts="danger";}
										elseif($each['revise']->desc_PMO=="Rejected"){$psts="success";}
										else{$psts="inverse";}
									?>
									<button style="margin-top:-5px" class="btn btn-<?php echo $psts?> btn-sm" disabled></button>
									<span style="margin-left:10px">
										<?php echo $each['revise']->PMO?>
									</span>
								</div>
							</div><div style="clear:both"></div>
							<?php }?>
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