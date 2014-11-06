<hr>
<h3 class="form-signin-heading">Input Initiative</h3>
<form class="form-horizontal" action="<?php echo base_url();?>initiative/submit_initiative" method ="post" id="formsignup" role="form">
	<input type="hidden" value="<?php echo $segment?>" name="segment">
	<div class="col-sm-6">
		<div class="form-group">
			<label class="col-sm-2 control-label" for="">Program</label>
			<div class="col-sm-9">
				<select class="form-control" name="program">
					<?php foreach($programs as $prg){?>
					<option value="<?php echo $prg->id?>"><?php echo $prg->title?></option>
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
			<label class="col-sm-2 control-label">Parent</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="parent" id="parent" placeholder="Parent">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Dependency</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="depen" name="kickoff" placeholder="Kickoff">
			</div>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="depen" name="completion" placeholder="Completion">
			</div>
		</div>
	</div>
	<div class="col-sm-6">
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
	<div class="col-sm-12">
		<div class="form-group">
			<label class="col-sm-1 control-label">Description</label>
			<div class="col-sm-11">
				<textarea type="text" class="form-control" name="description"></textarea>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	<input type="submit" class="btn btn-success" value="Submit">
</form>
<hr>

<script>
	CKEDITOR.replace('description');
</script>