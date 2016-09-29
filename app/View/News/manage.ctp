<div class="jumbotron jumbo-title">
	<h1>Gestion des actualités</h1>
	
	Ici vous pouvez ajouter, modifier ou supprimer les actualités de la page d'accueil.
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->Html->link(
				'<h5>Ajouter une nouvelle actualité <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></h5>',
			'/news/add',
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		); ?>
	</div>
</div>

<?php
foreach($newsList as $news):
	?>
<div class="panel panel-default">
	<div class="panel-body admin-btn">
		<h4>
			<?= $news['News']['title'] ?>
		
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
				'/news/edit/' . $news['News']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
			
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
				'/news/delete/' . $news['News']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
		</h4>
		
		<p>Créé le <?= date("d/m/Y", strtotime($news['News']['created'])); ?></p>
	</div>
</div>
	<?php
endforeach;
?>
<div class="pages">
    <ul class="pagination pagination-mini">
        <?php
            echo $this->Paginator->prev(__('<'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	        echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li'));
	        echo $this->Paginator->next('>', array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	    ?>
    </ul>
</div>