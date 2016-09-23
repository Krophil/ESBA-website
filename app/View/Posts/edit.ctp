<div class="posts form">
    <?= $this->Form->create('Post'); ?>
    <fieldset>
        <legend>Modification d'une page</legend>
        <div class="form-group">
            <?= $this->Form->input('title'); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->textarea('content', array('class' => 'ckeditor')); ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('slug'); ?>
        </div>
    </fieldset>
    <?= $this->Form->end('Valider'); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>