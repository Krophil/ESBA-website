<div class="posts form">
	<?= $this->Form->create('Misc'); ?>
	<fieldset>
		<legend>Modification d'une page</legend>
		<?= $this->Form->hidden('type'); ?>
		<div class="form-group">
			<?= $this->Form->textarea('content', array('class' => 'ckeditor')); ?>
		</div>
	</fieldset>
	<?= $this->Form->end('Valider'); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>