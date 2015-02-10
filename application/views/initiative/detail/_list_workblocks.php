<?php foreach($workblocks as $wb){ $crcl = sign_status($wb['wb']->status); ?>
	<div style="border-bottom:1px solid #eee; padding:5px 0 5px 5px;" id="workblock_<?php echo $wb['wb']->id ?>">
		<div style="padding-right: 10px; padding-left:5px;">
			<div style="float:left; width:17%;">
				<div style="font-size:9px; color:#bbb">
					<?php 
						$start = strtotime($wb['wb']->start); $end = strtotime($wb['wb']->end); $now = strtotime(date('Y-m-d')); 
						$pcttgl = ($now-$start)/($end-$start)*100;
						if($pcttgl<0){$pcttgl = 0;}
						if($pcttgl>100){$pcttgl = 100;}
					?> 
					<?php echo date("j M y",$start)." - ".date("j M y",$end)?>
				</div>
				<div id="chart<?php echo $wb['wb']->id?>"></div>
			</div>
			<div style="float:left; width:81%; padding-left:10px;">
				<div style="float:left; width:5%;"><span class="circle <?php echo $crcl?> circle-lg text-left"></span></div>
				<div style="float:left; width:93%;">
					<div style="margin-bottom:5px;"><strong><?php echo $wb['wb']->title?></strong></div>
					<p style="font-size:12px"></p>
					<div class="" style="margin-top:15px;">
						<button onclick="add_remark();" class="btn btn-default  btn-xs" style="height:20px;">
							<span style="font-size:10px">Progres</span>
						</button>
						<button onclick="edit_workblock(<?php echo $wb['wb']->id?>,<?php echo $init_id?>);" class="btn btn-warning  btn-xs" style="height:20px;">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
						<button onclick="delete_workblock(<?php echo $wb['wb']->id?>);" class="btn btn-danger  btn-xs" style="height:20px;">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
					</div>
				</div>
				<div style="clear:both"></div>
			</div><div style="clear:both"></div>
		</div>
		<script>
			var chart = c3.generate({
				bindto: "#chart<?php echo $wb['wb']->id?>",
				data: {
					columns: [
						['data', <?php echo round($pcttgl)?>]
					],
					type: 'gauge',
				},
				gauge: {
			    	label: {
			            format: function(value, ratio) {
			                return (100-value)+' %';
			            },
			            show: false, size:19  // to turn off the min/max labels.
			       },
				},
				color: {
					pattern: ['#fff'], // the three color levels for the percentage values.
					threshold: {
						values: [100]
					}
				},
				size: {
					width: 85,
					height: 50
				}
			});
		</script>
	</div>
<?php }?>