<div class="menus form">
	<?= $this->Form->create('Menu'); ?>
	<fieldset>
		<legend>Ajout d'un menu</legend>
		<div class="form-group">
			<?= $this->Form->label('Menu.title', 'Titre', array('class' => 'control-label')) ?>
			<?= $this->Form->input('title', array('class' => 'form-control', 'label' => '')); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->select('parent_id'); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('level', array('type' => 'number', 'min' => '0', 'max' => '99')); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->select('post_id'); ?>
		</div>
	</fieldset>
	<?= $this->Form->end('Valider'); ?>
</div>