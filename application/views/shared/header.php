<style>
	.header_top a{
		color:white;
	}
	.header_top a:hover{
		color:white;
	}
</style>
<div style="width:100%; background-color:black; color:white; padding:5px; padding-left:60px; ">
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>initiative/list_programs">Programs</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>initiative/list_initiative">Initiatives</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><a href="<?php echo base_url()?>workblock/detail">Workblocks</a></div>
	<div class="header_top" style="float:left; margin-right:20px;"><?php echo date("d/M/y", strtotime(date('Y-m-d')));?></div>
	<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>user/logout">Logout</a></div>
	<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>workblock/detail"><?php echo $user['name']?></a></div>
	<?php if($user['role']=='admin'){?>
		<div class="header_top" style="float:right; margin-right:20px;"><a href="<?php echo base_url()?>user/">User</a></div>
	<?php }?>
	<div style="clear:both"></div>
</div>