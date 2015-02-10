<div class="panel panel-primary">
	<div class="panel-heading">Log Activity</div>
	<div class="panel-body" style="padding:0px;">
		<?php foreach($logs as $log){ $datelog = strtotime($log->date); ?>
			<div style="border-bottom:1px solid #eee; padding:5px 0 5px 5px;">
				<div style="color:#337ab7; float:left; width:10%;">
					<center><h4><?php echo segment_abv($log->segment)?></h4></center>
				</div>
				<div style="float:left; width:80%">
					<div style="font-size:11px; color:grey;"><?php echo $log->prog_code." ".$log->prog_tit?></div>
					<div style="font-size:11px; color:grey;"><?php echo $log->init_code." ".$log->init_tit?></div>
					<p><?php echo $log->content?></p>
				</div>
				<div style="color:#bbb; float:left; width:10%;">
					<h3 style="margin-bottom:0px"><center><?php echo date("j", $datelog)?></center></h3><h5 style="margin-top:0px"><center><?php echo date("M", $datelog)?></center></h5>
				</div>
				<div style="clear:both"></div>
			</div>
		<?php }?>
	</div>
</div>