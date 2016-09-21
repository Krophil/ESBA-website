<div class="jumbotron jumbo-title">
	<h1 class="page_title"><?= $post['Post']['title'] ?></h1>
	
	<h3 class="page_update_date">le <?= date("d/m/Y", strtotime($post['Post']['updated'])); ?></h3>
</div>

<?= $post['Post']['content'] ?>
