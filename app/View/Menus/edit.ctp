<div class="menus form">
	<?= $this->Form->create('Menu'); ?>
	<fieldset>
		<legend>Modification d'un menu</legend>
		<div class="form-group">
			<?= $this->Form->input('title'); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('parent_id', array('type' => 'number')); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('level', array('type' => 'number', 'min' => '0', 'max' => '99')); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('post_id', array('type' => 'number')); ?>
		</div>
	</fieldset>
	<?= $this->Form->end('Valider'); ?>
</div>