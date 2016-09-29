<?php

$typeString = '';
switch ($page['Misc']['type']) {
	case 1:
		$typeString = 'Informations';
		break;
	case 2:
		$typeString = 'Plan d\'accès';
		break;
	case 3:
		$typeString = 'Partenaires';
		break;
	case 4:
		$typeString = 'Contact';
		break;
	default:
		throw new NotFoundException('Page invalide');
		break;
}

?>

<div class="content">
	<div class="jumbotron">
		<h1 class="page_title"><?= $typeString ?></h1>
	</div>
	
	<?= $page['Misc']['content'] ?>
	
	<div class=date-update>
		Dernière mise à jour : <?= date("d/m/Y", strtotime($page['Misc']['created'])); ?>
	</div>
</div>