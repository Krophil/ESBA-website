<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->Html->link(
			'Ajouter un nouvel administrateur <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
			'/users/add',
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		); ?>
	</div>
</div>

<?php
foreach($userList as $user):
?>
<div class="panel panel-default">
	<div class="panel-body admin-btn">
		<h4>
			<?= $user['User']['username'] ?>
		
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
				'/admin/edit/' . $user['User']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
			
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
				'/admin/delete/' . $user['User']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
		</h4>
	</div>
</div>
<?php
endforeach;
?>