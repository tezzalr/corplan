<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style="">Wholesale Initiative</h2>
	</div>
	<div>
		<?php $roles = explode(',',$user['role']); if(in_array("PMO",$roles) || in_array("admin",$roles)){?><div style="margin-bottom:10px; float:right;">
		<button onclick="toggle_visibility('new_initiative');" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Initiative</button>
		</div><?php }?>
		<?php
			//echo date_format(date_create('2014-05-01'), 'l');
		?>
		
		<div style="margin-bottom:10px; float:left">
			<a href="<?php echo base_url()?>initiative/list_initiative/" style="color:black">Status:</a>
			<a href="<?php echo base_url()?>initiative/list_initiative/nsy" style="color:black"><button class="btn btn-inverse btn-xs"><span style="color:grey" class="glyphicon glyphicon-off"></span></button><span style="margin-right:10px"> Not Started Yet</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/progress" style="color:black"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-refresh"></span></button><span style="margin-right:10px"> On Progress</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/completed" style="color:black"><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button><span style="margin-right:10px"> Completed</span></a>
			<a href="<?php echo base_url()?>initiative/list_initiative/delay" style="color:black"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button><span> Delay</span></a>
		</div>
		<div style="clear:both">
		<div id="new_initiative" style="display:none">
			<hr>
				<h3 class="form-signin-heading">Input Initiative</h3>
				<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative" method ="post" id="formsignup" role="form">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-2 control-label" for="">Program</label>
							<div class="col-sm-9">
								<select class="form-control" name="program">
									<?php foreach($programs as $prg){?>
									<option value="<?php echo $prg['prog']->id?>"><?php echo $prg['prog']->title?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Initiative</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="title" name="title" placeholder="Initiative">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Id</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="code" id="code" placeholder="Id">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tier</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="tier" id="tier" placeholder="Tier">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Start</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY">
								<small style="color:grey">*format: mm/dd/YYYY</small>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">End</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY">
								<small style="color:grey">*format: mm/dd/YYYY</small>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-2 control-label">Dependency</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="depen" name="depen" placeholder="Dependency">
							</div>
						</div>
					</div><div style="clear:both"></div>
					<input type="submit" class="btn btn-success" >
				</form>
				<hr>
		</div>
		
		<table class="table table-bordered">
			<thead>
				<tr class="headertab"><th style="width:60px">Program</th><th>Initiatives</th><th>WB</th><th>PIC</th><th>Start</th><th>End</th><th>Dependency</th><th>Tier</th></tr>
			</thead>
			<tbody>
				<?php 
					$statshow=$this->uri->segment(3); $prog=""; $np=1; 
					if($statshow){
						if($statshow == "progress"){$statshow = "In Progress";}
						elseif($statshow == "completed"){$statshow = "Completed";}
						elseif($statshow == "delay"){$statshow = "Delay";}
						else{$statshow = "Not Started Yet";}
					}
				foreach($ints as $int){?>
				<?php if(!$statshow || ($statshow && ($statshow == $int['stat']))){if($prog != $int['int']->program){?>
				<tr style="background-color:#F7F2E0; font-size:16px"><td colspan=8><?php echo $int['int']->progcode." ".$int['int']->program?></td></tr>
				<?php $prog=$int['int']->program; $np++;}?>
				<tr>
					<?php 
						if($int['stat']=="Delay"){$clr="danger"; $icn="remove";}
						elseif($int['stat']=="In Progress"){$clr="warning"; $icn="refresh";}
						elseif($int['stat']=="Completed"){$clr="success"; $icn="ok";}
						else{$clr="inverse"; $icn="off";}
					?>
					<td style="width:40px"><center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>				
					<td><?php echo $int['int']->code?> <a href="<?php echo base_url()?>initiative/detail_initiative/<?php echo $int['int']->id?>"><?php echo $int['int']->title?></a></td>
					<td style="width:20px"><?php echo $int['wb']?></td>
					<td><?php $sumpic = count($int['pic']); $i=1;
						if($int['pic']){
							foreach($int['pic'] as $pic){
								$namaar = explode(' ',$pic->name);
								echo $namaar[0];
								if($i<$sumpic){
									echo ", ";
								} $i++;
							}
						}?>
					</td>
					<td><?php if($int['int']->start){echo date("j M y", strtotime($int['int']->start));}?></td>
					<td><?php if($int['int']->end){echo date("j M y", strtotime($int['int']->end));}?></td>
					<td><?php echo $int['int']->dependencies?></td>
					<td><?php if($int['int']->tier){echo $int['int']->tier;}?></td>
					<?php if($user['role']=='admin'){?><td style="width:70px">
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_int_<?php echo $int['int']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_workblock(<?php echo $int['int']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td><?php }?>
				</tr>
				<tr id="edit_int_<?php echo $int['int']->id?>" style="display:none"><td></td>
					<div>
					<td colspan=6>
						<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative/<?php echo $int['int']->id?>" method ="post" id="formsignup" role="form">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="">Program</label>
								<div class="col-sm-4">
									<select class="form-control" name="program">
										<?php foreach($programs as $prg){?>
										<option value="<?php echo $prg->id?>" <?php if($int['int']->program == $prg->title){echo "selected";}?>><?php echo $prg->title?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Initiative</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="title" name="title" placeholder="Initiative" value="<?php echo $int['int']->title?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Id</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="code" id="code" placeholder="Id" value="<?php echo $int['int']->code?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tier</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" name="tier" id="tier" placeholder="Tier" value="<?php echo $int['int']->tier?>">
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">Start</label>
								<div class="col-sm-4">
									<?php $start=""; if($int['int']->start){$start = date("m/d/Y", strtotime($int['int']->start));}?>
									<input type="date" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY" value="<?php echo $start?>">
									<small style="color:grey">*format: mm/dd/YYYY</small>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label">End</label>
								<div class="col-sm-4">
									<?php $end=""; if($int['int']->end){$end = date("m/d/Y", strtotime($int['int']->end));}?>
									<input type="date" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY" value="<?php echo $end?>">
									<small style="color:grey">*format: mm/dd/YYYY</small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Dependecies</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" id="depen" name="depen" placeholder="Dependecies" value="<?php echo $int['int']->dependencies?>">
									<small style="color:grey">jika lebih dari satu pisahkan dengan ","</small>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-4"><input type="submit" class="btn btn-success"></div></div>
						</form>
					</div>
				</tr>
				<?php }}?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
</div>
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
</script>