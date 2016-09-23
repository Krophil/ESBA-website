<div class="users form">
    <?= $this->Flash->render('auth'); ?>
    <?= $this->Form->create('User'); ?>
    <fieldset>
        <legend>Connexion</legend>
        <div class="form-group">
            <?= $this->Form->input('username'); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password'); ?>
        </div>
    </fieldset>
    <?= $this->Form->end('Se connecter'); ?>
</div>