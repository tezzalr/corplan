<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style="">Wholesale Programs</h2>
	</div>
	<div style="">
		<div style="margin-bottom:10px; float:right;">
		<a href="<?php echo base_url()?>initiative/input_program" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Program</a>
		</div><div style="clear:both"></div>
		<table class="table table-bordered">
			<thead>
				<tr class="headertab"><th></th><th colspan=2>Programs</th><th style="width:100px">Segment</th><th>Start Date</th><th>End Date</th></tr>
			</thead>
			<tbody>
				<?php
					usort($programs, function($a, $b) {
						return $a['code'] - $b['code'];
					});
				?>
				<?php $segment=""; $i=1; $segnum=1; foreach($programs as $prog){?>
				<?php if($segment != $prog['prog']->segment){?>
					<tr style="background-color:#F7F2E0; font-size:16px"><td colspan=6>
						<?php echo $segnum.'. ';?><a href="<?php echo base_url()?>initiative/list_initiative/<?php echo $prog['prog']->segment?>"><?php echo $prog['prog']->segment?></a>
					</td></tr>
				<?php $segment=$prog['prog']->segment; $segnum++;}?>
				
				<tr id="prog_<?php echo $prog['prog']->id?>">
					<?php 
						if($prog['status']=="Delay"){$clr="danger"; $icn="remove";}
						elseif($prog['status']=="In Progress"){$clr="warning"; $icn="refresh";}
						elseif($prog['status']=="Completed"){$clr="success"; $icn="ok";}
						else{$clr="inverse"; $icn="off";}
					?>
					<td style="width:40px"><center><button class="btn btn-<?php echo $clr?> btn-xs" disabled><span class="glyphicon glyphicon-<?php echo $icn?>"></span></button></center></td>	
					<td style="width:600px"><div style="float:left; width:30px; margin-right:5px;"><?php echo $prog['prog']->code?></div> 
						<div style="float:left; max-width:500px"><?php echo $prog['prog']->title?></div>
						<div style="clear:both"></div>
					</td>
					<td style="width:40px"><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-comment"></span></button></td>
					<td><?php echo $prog['prog']->segment?></td>
					<td colspan=2 style="width:400px">
						<?php if($prog['date']->min_start && $prog['date']->max_end){?>
						<?php
							$stdate = strtotime($prog['date']->min_start);
							$eddate = strtotime($prog['date']->max_end);
							$crdate = strtotime(date('Y-m-d'));
							$pcttgl = ($crdate-$stdate)/($eddate-$stdate)*100;
							if($pcttgl<1){$pcttgl = 0;}
						?>
						<div style="font-size:12px">
							<span><?php echo date("j M y", $stdate);?></span>
							<span style="float:right"><?php echo date("j M y", $eddate);?></span>
							<div class="progress" style="margin-bottom:0">
							  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pcttgl?>%">
								<span><?php echo number_format($pcttgl,1)?>%</span>
							  </div>
							</div>
						</div>
						<?php }?>
					</td>
					<?php if($user['role']=='admin'){?><td style="width:70px">
						<button class="btn btn-warning  btn-xs" onclick="toggle_visibility('edit_int_<?php echo $prog['prog']->id?>');"><span class="glyphicon glyphicon-pencil"></span></button>
						<button class="btn btn-danger btn-xs" onclick="delete_program(<?php echo $prog['prog']->id?>)"><span class="glyphicon glyphicon-trash"></span></button>
					</td><?php }?>
				</tr>
				<?php $i++;}?>
			</tbody>
		</table>
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