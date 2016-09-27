<!DOCTYPE html>
<html lang='fr'>
<head>
	<?= $this->Html->charset(); ?>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<title>École de Ski du Ballon d'Alsace</title>
	
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
	<div id="header" class="hidden-xs">
		<?= $this->Html->link(
			$this->Html->image('header.png', array(
				'alt'	=> 'École de Ski du Ballon d\'Alsace',
			)),
			'/',
			array('escape' => false)
		) ?>
	</div>
	
	<div class="row">
		<div class="col-md-9">
			<?= $this->element('navbar') ?>
			
			<?= $this->Flash->render() ?>
			<?= $this->Flash->render('form') ?>
			
			<div class="col-main">
				<?= $this->fetch('content'); ?>
			</div>
		
		</div>
		
		<div class="col-md-3">
			<?= $this->element('sidebar') ?>
		</div>
	</div>
	
	<div class="row">
		<?= $this->element('footer') ?>
	</div>
	
</div>

<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') ?>
<?= $this->Html->script('bootstrap.min') ?>

</body>
</html>