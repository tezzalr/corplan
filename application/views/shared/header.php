<style>
	.header_top a{
		color:white;
	}
	.header_top a:hover{
		color:white;
	}
</style>
<div style="width:100%; background-color:black; color:white; padding:5px; padding-left:60px; ">
	<div class="header_top" style="float:left; margin-right:20px;"><img src="<?php echo base_url()?>assets/img/general/mandiri.png" style="width:70px"></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>initiative/list_programs">Overview</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>initiative/list_programs">Programs</a></div>
	<div class="header_top" style="float:left; margin-right:20px; padding-top:5px;"><a href="<?php echo base_url()?>initiative/list_initiative">Initiatives</a></div>
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