<div class="users form">
<?= $this->Form->create('User'); ?>
    <fieldset>
        <legend>Ajout d'un administrateur</legend>
		<div class="form-group">
			<?= $this->Form->input('username'); ?>
		</div>
		<div class="form-group">
			<?= $this->Form->input('password'); ?>
		</div>
    </fieldset>
<?= $this->Form->end('Valider'); ?>
</div>