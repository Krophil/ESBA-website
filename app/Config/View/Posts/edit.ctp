<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
    <fieldset>
        <legend><?php echo __('Modifier une page'); ?></legend>
        <?php
		echo $this->Form->input('title');
        echo $this->Form->textarea('content', array('class'=>'ckeditor'));
		echo $this->Form->input('slug');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Envoyer')); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>