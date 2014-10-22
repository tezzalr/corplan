<td colspan=8>
	<div>
		<div style="width:100%" id="header_tl">
			<button class="btn btn-default btn-sm" onclick="ipt_tl(<?php echo $ms->id?>)"><span class="glyphicon glyphicon-pencil"></span> Write</button>
			<div id="ipt_tl_<?php echo $ms->id?>" style="margin-top:20px; display:none;">
				<form class="form-horizontal" action="<?php echo base_url()?>milestone/submit_timeline/<?php echo $ms->id?>" method ="post" id="formtimeline_<?php echo $ms->id?>" role="form">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="col-sm-12">
								<textarea type="text" class="form-control" id="timeline_ipt_<?php echo $ms->id?>" name="content"></textarea>
							</div>
						</div>
						<button class="btn btn-success" onclick="submit_timeline(<?php echo $ms->id?>)">Submit</button>
					</div><div style="clear:both"></div>
					
					<hr>
				</form>
			</div>
		</div>
		<div id="content_tl_<?php echo $ms->id?>" style="margin-top:20px">
			<?php echo $cnt;?>
		</div>
	</div>

	<script type="text/javascript">
		CKEDITOR.replace("timeline_ipt_<?php echo $ms->id?>");
		
		function ipt_tl(id){
			toggle_visibility('ipt_tl_'+id);
		}
	</script>
</td>