<!DOCTYPE html>
<html lang='fr'>
<head>
	<?= $this->Html->charset(); ?>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<title><?= $this->fetch('title'); ?></title>
	
	<?php
		echo $this->Html->meta('icon', 'favicon.ico');
		
		echo $this->Html->css(array(
				'bootstrap.min',
				'style',
		));
	?>
	
	<?= $scripts_for_layout ?>
	
	<!--[if lt IE 9]>
	<?= $this->Html->script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') ?>
	<?= $this->Html->script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') ?>
	?>
	<![endif]-->
</head>

<body>
<div class="container">
	<div class="jumbotron" id="header">
		<?= $this->Html->image('header.png', array(
				'alt'	=> 'École de Ski du Ballon d\'Alsace',
		)); ?>
	</div>
	
	<?= $this->element('navbar') ?>
	
	<div class="row">
		<div class="col-md-3 col-md-push-9">
			<?= $this->element('sidebar') ?>
		</div>
		
		<div class="col-md-9 col-md-pull-3">
			
			<?= $this->fetch('content'); ?>
			
		</div>
	</div>
	
	<div id="footer">
		<?= $this->element('footer') ?>
	</div>
	
</div>

<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min') ?>

</body>
</html>