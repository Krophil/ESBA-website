<div class="users form">
    <?= $this->Flash->render('auth'); ?>
    <?= $this->Form->create('User'); ?>
    <fieldset>
        <legend>Connexion</legend>
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
    </fieldset>
    <?= $this->Form->end(array('label' => 'Se connecter', 'class' => 'btn btn-primary')); ?>
</div>