<?= $this->Html->link('Ajouter un nouvel administrateur', '/admin/add', array('class' => 'btn btn-primary btn-sm')) ?>

<?php
foreach($userList as $user) {
	echo $user['User']['username'];
	$this->Html->link('Modifier', '/admin/edit/' . $user['User']['id'], array('class' => 'btn btn-primary btn-sm'));
	$this->Html->link('Supprimer', '/admin/add/' . $user['User']['id'], array('class' => 'btn btn-primary btn-sm'));
}
?>