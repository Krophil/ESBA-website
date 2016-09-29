<div class="content">
	<?php
	if($this->Session->read('Auth.User.id'))
		echo $this->Html->link(
				'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
				'/posts/edit/' . $post['Post']['id'],
				array('class' => 'btn btn-warning', 'escape' => false)
		);
	?>
	
	<div class="jumbotron">
		<h1 class="page_title"><?= $post['Post']['title'] ?></h1>
	</div>
	<?= $post['Post']['content'] ?>

	<div class=date-update>
		Dernière mise à jour : <?= date("d/m/Y", strtotime($post['Post']['updated'])); ?>
	</div>
</div>