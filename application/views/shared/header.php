<style>
	.header_top a{
		color:white;
	}
	.header_top a:hover{
		color:white;
	}
	.aprv-alert{
		background-color:#f2dede;
		padding:5px
	}
	.aprv-alert span{
		color:#a94442
	}
	.lala{
		font-size:11px
	}
</style>
<div style="width:100%; background-color:black; color:white; padding:5px; padding-left:60px; ">
	<div class="header_top" style="float:left; margin-right:20px;"><img src="<?php echo base_url()?>assets/img/general/mandiri.png" style="width:70px"></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>general/overview">Overview</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>initiative/list_programs">Programs</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>initiative/list_initiative">Initiatives</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail">Log</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail">PIC</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail">MoM</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail">FAQ</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail">Print</a></div>
	<div class="header_top" style="float:right; margin-right:20px; padding-top:5px;"><?php echo date("d/M/y", strtotime(date('Y-m-d')));?></div>
	<div class="header_top" style="float:right; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>user/logout">Logout</a></div>
	<div class="header_top" style="float:right; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>workblock/detail"><?php echo $user['name']?></a></div>
	<?php if($user['role']=='admin'){?>
		<div class="header_top" style="float:right; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>user/">User</a></div>
	<?php }?>
	<div style="clear:both"></div>
</div>
<?php if($pending){?>
<div class="alert aprv-alert" role="alert" onclick="toggle_visibility('aprv-contentss');">
	<span class="alert-link" disabled>Anda memiliki <?php echo count($pending)?> pending approval milestone</span>
	<div id="aprv-contentss" style="display:none; padding-left:20px; margin-top:10px;">
		<table>
		<?php foreach ($pending as $pend){?>
			<tr><td>
				<div style="margin-bottom:20px">
					<div class="lala"><?php echo $pend->code.". ".$pend->initiative?></div>				
					<div class="lala"><?php echo $pend->workblock?></div>
					<div style="font-size:13;">
						<a href="<?php echo base_url()."workblock/detail_workblock/".$pend->workblock_id."/".$pend->milestone_id?>" style="color:#a94442"><?php echo $pend->milestone?></a>
					</div>
				</div>
			</td></tr>
		<?php }?>
		</table>
	</div>
</div>
<?php }?>

<script>
</script>