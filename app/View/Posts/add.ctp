<div class="posts form">
    <?= $this->Form->create('Post'); ?>
    <fieldset>
        <legend>Ajout d'une page</legend>
        <div class="form-group">
            <?= $this->Form->label('Post.title',
                    "<h4>Titre</h4>",
                    array('class' => 'control-label')
            ) ?>
            <?= $this->Form->input('title', array(
                    'class' => 'form-control',
                    'label' => false,
            )); ?>
        </div>
        <div class="form-group">
			<?= $this->Form->label('Post.content',
					"<h4>Contenu de la page</h4>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('content', array(
					'class' => 'form-control ckeditor',
					'label' => false,
			)); ?>
        </div>
        <div class="form-group">
			<?= $this->Form->label('Post.slug',
					"<h4>Slug</h4><p>Le slug correspond à la partie raccourcie de l'URL qui permet d'identifier de manière unique une page web. Il doit représenter le plus fidèlement possible le contenu de la page et si possible être unique. Il est recommandé d'utiliser le titre de la page sans les déterminants, les prépositions etc., et en remplacant les espaces par des tirets.</p><p>De plus, le slug ne peut contenir que des lettres en minuscule, des chiffres et des tirets. Un bon exemple de slug pour la page \"Ski de fond\" de la section \"Enfants\" serait \"ski-fond-enfants\".</p>",
					array('class' => 'control-label')
			) ?>
			<?= $this->Form->input('slug', array(
					'class' => 'form-control',
					'label' => false,
			)); ?>
        </div>
    </fieldset>
    <?= $this->Form->end(array('label' => 'Valider', 'class' => 'btn btn-primary')); ?>
</div>

<?php $this->addScript($this->Html->script('ckeditor/ckeditor')); ?>