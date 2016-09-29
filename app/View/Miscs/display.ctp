<?php

$typeString = '';
$urlString = '';
switch ($page['Misc']['type']) {
	case 1:
		$typeString = 'Informations';
		$urlString = 'info';
		break;
	case 2:
		$typeString = 'Plan d\'accès';
		$urlString = 'plan';
		break;
	case 3:
		$typeString = 'Partenaires';
		$urlString = 'partenaires';
		break;
	case 4:
		$typeString = 'Contact';
		$urlString = 'contact';
		break;
	default:
		throw new NotFoundException('Page invalide');
		break;
}

?>

<div class="content">
	<?php
	if($this->Session->read('Auth.User.id'))
		echo $this->Html->link(
			'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
			'/divers/edit/' . $urlString,
			array('class' => 'btn btn-warning', 'escape' => false)
		);
	?>
	<div class="jumbotron">
		<h1 class="page_title"><?= $typeString ?></h1>
	</div>
	
	<?= $page['Misc']['content'] ?>
	
	<div class=date-update>
		Dernière mise à jour : <?= date("d/m/Y", strtotime($page['Misc']['created'])); ?>
	</div>
</div>