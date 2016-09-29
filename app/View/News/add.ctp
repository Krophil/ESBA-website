<div class="news form">
	<?= $this->Form->create('News'); ?>
	<fieldset>
		<legend>Ajout d'une actualité</legend>
		<div class="form-group">
			<?= $this->Form->label('News.title',
					"<h4>Titre</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('title', array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->label('News.content',
					"<h4>Contenu de l'actualité</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('content', array(
					'class' => 'form-control ckeditor',
					'label' => false,
			)); ?>
		</div>
	</fieldset>
	<?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>