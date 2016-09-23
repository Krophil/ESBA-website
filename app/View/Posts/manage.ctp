<?= $this->Html->link(
	'<span class="glyphicon glyphicon-plus"></span>',
	'/posts/add',
	array('class' => 'btn btn-default btn-xs', 'escape' => false)
); ?>

<?php
foreach($postList as $post):
	?>
	<div class="well admin-btn">
		<?php
		echo $post['Post']['title'];
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-pencil"></span>',
			'/posts/edit/' . $post['Post']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-remove"></span>',
			'/posts/delete/' . $post['Post']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		?>
	</div>
	<?php
endforeach;
?>