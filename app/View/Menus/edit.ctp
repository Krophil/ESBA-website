<?php

$listParents = $this->requestAction('/menus/getParentsList');
$listPosts = $this->requestAction('/menus/getPostsList/' . $this->request->data['Menu']['id']);

?>

<div class="menus form">
	
	<?= $this->Form->create('Menu'); ?>
	<fieldset>
		
		<legend>Modification du menu</legend>
		
		<?= $this->Form->hidden('Menu.id'); ?>
		
		<div class="form-group">
			<?= $this->Form->label('Menu.title',
					"<h4>Titre</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('title', array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		
		<div class="form-group">
			<?= $this->Form->label('Menu.parent_id',
					"<h4>Menu parent</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->select('parent_id', array(0 => 'Pas de menu parent', 'Menus disponibles' => $listParents), array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		
		<div class="form-group">
			<?= $this->Form->label('Menu.level',
					"<h4>Niveau du menu</h4><p>Cette valeur est comprise entre 0 et 99.</p><p>Elle correspond au "
					. "placement des menus les uns par rapport aux autres. Un niveau de menu plus bas signifie que le "
					. "menu sera placé plus à gauche s'il s'agit d'un menu parent ou plus haut s'il s'agit d'un menu "
					. "enfant (ou sous-menu).</p>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('level', array(
					'type' => 'number',
					'min' => '0',
					'max' => '99',
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		
		<div class="form-group">
			<?= $this->Form->label('Menu.post_id',
					"<h4>Page associée</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->select('post_id', array(0 => 'Pas de page associée', 'Pages disponibles' => $listPosts), array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
	
	</fieldset>
	
	<?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>

</div>