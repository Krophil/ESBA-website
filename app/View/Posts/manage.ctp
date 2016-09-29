<div class="jumbotron jumbo-title">
	<h1>Gestion des pages</h1>
	
	Ici vous pouvez ajouter, modifier ou supprimer les différentes pages du site.
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->Html->link(
				'<h5>Ajouter une nouvelle page <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></h5>',
			'/posts/add',
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		); ?>
	</div>
</div>

<?php
foreach($postList as $post):
	?>
<div class="panel panel-default">
	<div class="panel-body admin-btn">
		<h4>
			<?= $post['Post']['title'] ?>
		
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
				'/posts/edit/' . $post['Post']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
			
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
				'/posts/delete/' . $post['Post']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
		</h4>
		
		<p>Mis à jour le <?= date("d/m/Y", strtotime($post['Post']['updated'])); ?></p>
	</div>
</div>
	<?php
endforeach;
?>