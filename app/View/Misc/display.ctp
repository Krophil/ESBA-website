<?php

$typeString = '';
switch ($page['Misc']['type']) {
	case MiscType::INFO:
		$typeString = 'Informations';
		break;
	case MiscType::PLAN:
		$typeString = 'Plan d\'accès';
		break;
	case MiscType::PARTENAIRES:
		$typeString = 'Partenaires';
		break;
	case MiscType::CONTACT:
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
	
	<?= $post['Misc']['content'] ?>
	
	<div class=date-update>
		Dernière mise à jour : <?= date("d/m/Y", strtotime($post['Post']['created'])); ?>
	</div>
</div>