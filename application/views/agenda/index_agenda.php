<?php
	$sumdate = date("t", mktime(0,0,0, date("m"), 1, date("Y")));
	$day = date("N", mktime(0,0,0, date("m"), 1, date("Y"))); $firstday = true;
?>
<div id="" class="container no_pad">
	<div style="padding:12px">
		<a href="<?php echo base_url()?>agenda/input_agenda" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-plus"></span> Agenda</a>
	</div>
	<div>
		<div id="agendatable" style="width:100%;">
			<div>
				<div>
					<div class="as headeras">Senin</div>
					<div class="as headeras">Selasa</div>
					<div class="as headeras">Rabu</div>
					<div class="as headeras">Kamis</div>
					<div class="as headeras">Jumat</div>
					<div class="as headeras">Sabtu</div>
					<div class="as headeras">Minggu</div>
				</div>
				<?php 
					$i=1; 
					while($i<=$sumdate){
						echo "<div>";
						for($diw=1;$diw<=7;$diw++){
							if($i<=31){
								if($firstday && ($day != $diw)){?>
									<div class="as"></div>
								<?php }else{?>
									<div class="as">
										<div><hr style="margin-bottom:5px;"><div style="float:right; top:2px;"><?php echo $i;?></div></div><div style="clear:both"></div>
										<div id="agendaisi">
											<div>
												<?php 
													foreach ($agendas[$i] as $agd){?>
													<div style="margin-bottom:5px;">
														<div style="float:right; color:grey"><?php echo date("g A", strtotime($agd->start));?></div>
														<div style="float:left; width:79%"><a href="#" onclick="show_detail(<?php echo $agd->id?>)"><?php echo $agd->title;?></a></div>
														<div style="clear:both"></div>
													</div>
												<?php }?>
											</div>
											<div style="clear:both"></div>
										</div>
									</div>
									<?php 
									$i++; $firstday=false;
								}
							}
						}
						echo "<div style='clear:both'></div></div>";
				}?>
			</div>
		</div>
	</div>
</div>

<script>
    function edit_wb(id){
    	toggle_visibility('edit_wb_'+id);
    	//toggle_visibility('ms_wb_'+id);
    }
    function show_milestone(id){
    	$('.milestone_toshow').animate({'opacity':'toggle'});
    }
	function delete_workblock(id, event){
		bootbox.confirm("Apa anda yakin?", function(confirmed) {
			if(confirmed===true){
				$.ajax({
					url: config.base+"workblock/delete_workblock",
					data: {id: id},
					dataType: 'json',
					type: "POST",
					success: function (resp) {
						if(resp.status == 1){
							$('#wbdtl_'+id).animate({'opacity':'toggle'});
							if($('.ms_wb_'+id).length > 0){$('.ms_wb_'+id).animate({'opacity':'toggle'});}
							succeedMessage('Workblock berhasil dihapus');
						}
					}
				});
			}
		});
	}
	function show_detail(id){
		$.ajax({
			type: "GET",
			url: config.base+"agenda/get_detail",
			data: {id: id},
			dataType: 'json',
			cache: false,
			success: function(resp){
				if(resp.status==1){
					bootbox.dialog({
						title: resp.title,
						message: resp.message
					});
				}else{}
			}
		});
	}
</script>
<style>
	#agendatable th{
		text-align:center;
		width:14%;
	}
	#agendaisi{
		font-size:11px;
	}
	.as{
		float:left;
		width:14%;
		padding:5px;
	}
	.headeras{
		text-align:center;
		font-weight:bold;
	}
</style>