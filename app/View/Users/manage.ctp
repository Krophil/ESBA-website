<?= $this->Html->link(
	'<span class="glyphicon glyphicon-plus"></span>',
	'/users/add',
	array('class' => 'btn btn-default btn-xs', 'escape' => false)
); ?>

<?php
foreach($userList as $user):
?>
	<div class="well admin-btn">
		<?php
		echo $user['User']['username'];
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-pencil"></span>',
			'/admin/edit/' . $user['User']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-remove"></span>',
			'/admin/delete/' . $user['User']['id'],
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		);
		?>
	</div>
<?php
endforeach;
?>