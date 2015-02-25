<style>
	.pmo_header{
		margin-right:40px;
	}
	.pmo_header_active a{
		margin-right:40px;
		color: black;
	}
</style>
<div style="padding:5px 10px 5px 0">
	<div>
		<div style="width:50%; float:left; font-size:16px">
			<span style="color:grey; font-size:11px">Business PMO</span>
			<div>
				<?php $bisnis = array('Wholesale','SME','Mikro','Individuals'); 
					foreach($bisnis as $each){
						$class="pmo_header";
						if($this->uri->segment(3)==$each){
							$class="pmo_header_active";
						} 
						echo "<span class='".$class."'><a href='".base_url()."program/list_programs/".$each."'>".$each."</a></span>";
					}
				?>
			</div>
		</div>
		<div style="width:50%; float:left; font-size:16px">
			<span style="color:grey; font-size:11px">Support PMO</span>
			<div>
				<?php $support = array('IT','HC','Distribution','Risk'); 
					foreach($support as $each){ 
						$class="pmo_header";
						if($this->uri->segment(3)==$each){
							$class="pmo_header_active";
						}
						echo "<span class='".$class."'><a href='".base_url()."program/list_programs/".$each."'>".$each."</a></span>";
					}
				?>
			</div>
		</div><div style="clear:both"></div>
	</div>
	<hr>
	<h2><?php echo $segment?> Programs</h2>
	<div style="">
		<div style="margin-bottom:10px; float:right;">
		<a href="<?php echo base_url()?>initiative/input_program" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span> Program</a>
		</div>
		
		<div style="margin-bottom:10px; float:left">
			<span class="circle circle-notyet circle-lg text-left"></span>Not Started Yet
			<span class="circle circle-inprog circle-lg text-left" style="margin-left:10px"></span>In Progress
			<span class="circle circle-atrisk circle-lg text-left" style="margin-left:10px"></span>At Risk
			<span class="circle circle-delay circle-lg text-left" style="margin-left:10px"></span>Delay
			<span class="circle circle-completed circle-lg text-left" style="margin-left:10px"></span>Completed
		</div>
		<div style="clear:both">
				<table class="table table-bordered">
				<thead style="background-color:#5bc0f0; color:white">
					<tr>
						<th style="vertical-align:middle" rowspan=2>Programs</th>
						<th style="vertical-align:middle" colspan=5><center>Initiative Status</center></th>
						<th style="vertical-align:middle" rowspan=2>Total</th>
						<th style="vertical-align:middle" rowspan=2>Start Date</th>
						<th style="vertical-align:middle" rowspan=2>End Date</th>
					</tr>
					<tr>
						<th><span class="circle circle-notyet circle-lg text-left"></span></th>
						<th><span class="circle circle-inprog circle-lg text-left"></span></th>
						<th><span class="circle circle-atrisk circle-lg text-left"></span></th>
						<th><span class="circle circle-delay circle-lg text-left"></span></th>
						<th><span class="circle circle-completed circle-lg text-left"></span></th>
					</tr>
				</thead>
				<tbody>
					<?php
						usort($programs, function($a, $b) {
							return $a['code'] - $b['code'];
						});
					?>
					<?php 
					$segment=""; $i=1; $segnum=1;
				
					foreach($programs as $prog){?>
					<tr id="prog_<?php echo $prog['prog']->id?>">
						<!--<td style="width:40px"><?php echo $prog['status']['Not Started Yet']?></td>-->
						<td style="width:550px">
							<div style="float:left; width:30px; margin-right:5px;"><?php echo $prog['prog']->code?></div> 
							<div style="float:left; max-width:490px"><a href="<?php echo base_url()?>initiative/list_program_initiative/<?php echo $prog['prog']->id ?>"><?php echo $prog['prog']->title?></a></div>
							<div style="clear:both"></div>
						</td>
						<?php 
							$allstat = return_arr_status(); $total=0;
							foreach($allstat as $stat){
								$color="";
								if($prog['status'][$stat]){
									$color = color_status($stat);
								}
								echo "<td style='background-color:".$color."'><center>".$prog['status'][$stat]."</center></td>";
								$total = $total + $prog['status'][$stat];
							}
						?>
						<td><center><?php echo $total;?></center></td>
						<td colspan=2 style="width:100px">
							<?php if($prog['date']->min_start && $prog['date']->max_end){?>
							<?php
								$stdate = strtotime($prog['date']->min_start);
								$eddate = strtotime($prog['date']->max_end);
								$crdate = strtotime(date('Y-m-d'));
								$pcttgl = ($crdate-$stdate)/($eddate-$stdate)*100;
								if($pcttgl<0){$pcttgl = 0;}
								if($pcttgl>100){$pcttgl = 100;}
							?>
							<div style="font-size:12px">
								<span><?php echo date("j M y", $stdate);?></span>
								<span style="float:right"><?php echo date("j M y", $eddate);?></span>
								<?php 
									$barcol = "black";
								?>
								<div class="progress" style="margin-bottom:0">
								  <div class="progress-bar progress-bar-<?php echo $barcol?>" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pcttgl?>%">
									<span style="color:black"><?php echo number_format(100-$pcttgl,1)?>%</span>
								  </div>
								</div>
							</div>
							<?php }?>
						</td>
						<?php if($user['role']=='admin' || $user['role']=='PMO'){?><td style="width:70px">
							<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_prog_<?php echo $prog['prog']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger btn-xs" onclick="delete_program(<?php echo $prog['prog']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
						</td><?php }?>
					</tr>
					<tr id="edit_prog_<?php echo $prog['prog']->id?>" style="display:none">
						<div>
						<td colspan=9>
							<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative/<?php echo $prog['prog']->id?>" method ="post" id="formsignup" role="form">
								<div class="form-group">
									<label class="col-sm-2 control-label">Program</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="title" name="title" placeholder="Initiative" value="<?php echo $prog['prog']->title?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Id</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="code" id="code" placeholder="Id" value="<?php echo $prog['prog']->code?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8">
										<textarea type="text" class="form-control" id="description<?php echo $prog['prog']->id?>" name="description"><?php echo $prog['prog']->description?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label"></label>
									<div class="col-sm-4"><input type="submit" class="btn btn-success"></div></div>
							</form>
							<script>
								CKEDITOR.replace('description'+<?php echo $prog['prog']->id?>);
							</script>
						</div>
					</tr>
					<?php $i++;}?>
				</tbody>
			</table>	
			<!--</div>
		</div>-->
	</div><div style="clear:both"></div><br>
</div>
<script>
	function delete_program(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"initiative/delete_program",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#prog_'+id).animate({'opacity':'toggle'});
							succeedMessage('Workblock berhasil dihapus');
						}
					}
				});
			}
		});
	}
</script>