<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style="">Wholesale Programs</h2>
	</div>
	<div style="width:75%">
		<div style="margin-bottom:10px; float:right;">
		<a href="<?php echo base_url()?>initiative/input_program" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Program</a>
		</div><div style="clear:both"></div>
		<table class="table table-bordered">
			<thead>
				<tr class="headertab"><th></th><th colspan=2>Programs</th><th>Start Date</th><th>End Date</th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($programs as $prog){?>
				<tr><td>Status</td>
				<td><?php echo $prog->code?> <?php echo $prog->title?></td>
				<td></td>
				</tr>
				<?php $i++;}?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
</div>