<div class="jumbotron jumbo-title">
	<h1>Gestion des pages diverses</h1>
	
	Ici vous pouvez modifier les différents éléments du site web de l'école de ski du Ballon d'Alsace.
	
	<div class="admin-btn">
		<?= $this->Html->link('Informations', '/divers/edit/info', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Plan d\'accès', '/divers/edit/plan', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Partenaires', '/divers/edit/partenaires', array('class' => 'btn btn-primary btn-lg')) ?>
		<?= $this->Html->link('Contact', '/divers/edit/contact', array('class' => 'btn btn-primary btn-lg')) ?>
	</div>
</div>