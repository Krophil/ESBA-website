<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->Html->link(
			'Ajouter une nouvelle actualité <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
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