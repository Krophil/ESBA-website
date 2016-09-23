<div class="jumbotron jumbo-title">
	<h1>Espace administrateur</h1>
	
	Ici vous pouvez modifier les différents éléments du site web de l'école de ski du Ballon d'Alsace.
	
	<div class="admin-btn">
		<?= $this->Html->link('Actualités', '/news/manage', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Pages', '/posts/manage', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Menus', '/menus/manage', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Pages diverses', '/divers/manage', array('class' => 'btn btn-primary btn-lg')) ?>
	</div>
	
	<div class="admin-btn">
		<?= $this->Html->link('Gestion de la liste des administrateurs', '/admin/manage', array('class' => 'btn btn-primary btn-lg')) ?>
	</div>
</div>