<div class="content">
	<div class="jumbotron">
		<h1 class="page_title"><?= $post['Post']['title'] ?></h1>
	</div>
	<?= $post['Post']['content'] ?>

	<div class=date-update>
		Dernière mise à jour : <?= date("d/m/Y", strtotime($post['Post']['updated'])); ?>
	</div>
</div>