<link href="<?php echo base_url();?>assets/css/user.css" rel="stylesheet"/>

<div id="" class="container no_pad">
	<div class="col-md-7">
		<div class="form-signin">
		<h3 class="form-signin-heading">Input Initiative</h3>
		<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative" method ="post" id="formsignup" role="form">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="">Program</label>
				<div class="col-sm-9">
					<select class="form-control" name="program">
						<?php foreach($programs as $prg){?>
						<option value="<?php echo $prg->id?>"><?php echo $prg->title?></option>
						<?php }?>
					</select>
				</div>
			</div>
			 <div class="form-group">
				<label class="col-sm-3 control-label">Initiative</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="title" name="title" placeholder="Initiative">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Id</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="code" id="code" placeholder="Id">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Tier</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="tier" id="tier" placeholder="Tier">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">Start</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="start" name="start" placeholder="mm/dd/YYYY">
					<small style="color:grey">*format: mm/dd/YYYY</small>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3 control-label">End</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="end" name="end" placeholder="mm/dd/YYYY">
					<small style="color:grey">*format: mm/dd/YYYY</small>
				</div>
			</div>
			<hr>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
		</form>
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