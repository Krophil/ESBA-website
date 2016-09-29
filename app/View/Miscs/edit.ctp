<div class="posts form">
	<?= $this->Form->create('Misc'); ?>
	<fieldset>
		<legend>Modification d'une page</legend>
		<?= $this->Form->hidden('type'); ?>
		<div class="form-group">
			<?= $this->Form->label('Misc.content',
					"<h4>Contenu de la page</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->textarea('content', array(
					'class' => 'form-control ckeditor',
					'label' => false,
			)); ?>
		</div>
	</fieldset>
	<?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>