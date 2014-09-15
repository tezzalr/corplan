<div id="" class="container no_pad">
	<div class="no_pad" style="margin-bottom: 50px;">
		<h2 style="">Wholesale Programs</h2>
	</div>
	<div>
		<div style="margin-bottom:10px">
		<a href="<?php echo base_url()?>initiative/input_program" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Program</a>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr><th>#</th><th>Programs</th><th>ID</th></tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($programs as $prog){?>
				<tr><td><?php echo $i?></td><td><?php echo $prog->title?></td><td><?php echo $prog->code?></td></tr>
				<?php $i++;}?>
			</tbody>
		</table>
	</div><div style="clear:both"></div><br>
</div>