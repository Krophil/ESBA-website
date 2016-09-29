<div class="users form">
	<?= $this->Form->create('User'); ?>
	<fieldset>
		<legend>Modification d'un administrateur</legend>
		<div class="form-group">
			<?= $this->Form->label('User.username',
					"<h4>Nom d'utilisateur</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('username', array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->label('User.password',
					"<h4>Mot de passe</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('password', array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->label('User.password',
					"<h4>Confirmation du mot de passe</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('password_confirm', array(
					'class' => 'form-control',
					'type'	=> 'password',
					'label' => false,
			)); ?>
		</div>
	</fieldset>
	<?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>
</div>