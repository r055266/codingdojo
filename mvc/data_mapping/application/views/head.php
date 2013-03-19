<?php 
	echo doctype('html5');
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php
		echo meta($meta);
		echo '<title>'.$title.'</title>';
		echo link_tag(asset_url('css/bootstrap-responsive.css'));
		echo link_tag(asset_url('css/bootstrap.css'));
		echo link_tag(asset_url('css/style.css'));
		
		if(isset($links))
		{
			foreach($links as $link)
			{
				echo link_tag($link);
			}
		}
		?>
		<script type="text/javascript" src="<?php echo asset_url('js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-alert.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-button.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-carousel.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-collapse.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-modal.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-popover.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-scrollspy.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-tab.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-tooltip.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-transition.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap-typeahead.js'); ?>"></script>
		<?php
		if(isset($scripts))
		{
			foreach($scripts as $script)
			{
				echo '<script type="text/javascript" src="'.$script.'"></script>';
			}
		}
		if(isset($javascript))
		{
		?>
			<script type="text/javascript">
			$(function(){
				<?php
					echo $javascript;
				?>
			})
			</script>
		<?php
		}
	?>	
</head>
	<body>