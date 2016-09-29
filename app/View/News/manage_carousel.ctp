<div class="jumbotron jumbo-title">
	<h1>Gestion du diaporama</h1>
	
	Ici vous pouvez ajouter ou supprimer des images du diaporama de la page d'accueil.
</div>

<div class="panel panel-default">
	<div class="panel-body news form">
		<?= $this->Form->create('News', array('type' => 'file')); ?>
		<fieldset>
			<legend>Ajout d'une image</legend>
			<div class="form-group">
				<?= $this->Form->label('News.image_file',
						"<h4>Image à mettre en ligne</h4><p>Résolution recommandée : 600px de largeur et 400px de hauteur</p><p>Extension de l'image : .jpg, .jpeg ou .png</p>",
						array('class' => 'control-label')
				) ?>
				<?= $this->Form->input('image_file', array(
						'class' => 'form-control upload-bar',
						'type'	=> 'file',
						'label' => false,
				)); ?>
			</div>
		</fieldset>
		<?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>
	</div>
</div>

<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

$directory = new Folder(WWW_ROOT . 'img/jcarousel');
$files = $directory->find('.*');

foreach($files as $image):
	?>
<div class="panel panel-default">
	<div class="panel-body admin-btn">
		<?= $this->Html->image('jcarousel/' . $image, array(
				'alt'		=> $image,
				'width'		=> 150,
				'height'	=> 100,
		)); ?>
		
		<?= $this->Html->link(
				'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
				'/news/delete_img/' . $image,
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
		); ?>
	</div>
</div>
	<?php
endforeach;
?>