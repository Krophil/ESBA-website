<?= $this->Html->link(
	'<span class="glyphicon glyphicon-plus"></span>',
	'/news/add',
	array('class' => 'btn btn-default btn-xs', 'escape' => false)
); ?>

<?php
foreach($newsList as $news):
	?>
	<div class="well admin-btn">
		<?php
		echo $news['News']['title'];
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-pencil"></span>',
			'/news/edit/' . $news['News']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-remove"></span>',
			'/news/delete/' . $news['News']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		?>
	</div>
	<?php
endforeach;
?>