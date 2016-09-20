<div class="row">
	<div class="col-md-12 hidden-xs">

		<div class="wrapper">
			<div class="jcarousel-wrapper">
				<div class="jcarousel">
					<ul>
						<?php
						
						App::uses('Folder', 'Utility');
						App::uses('File', 'Utility');
						
						$directory = new Folder(WWW_ROOT . 'img/jcarousel');
						$files = $directory->find('.*');
						
						foreach($files as $image):
							
						?>
							
							<li>
								<?= $this->Html->image('jcarousel/' . $image, array(
										'alt'		=> 'École de Ski du Ballon d\'Alsace',
										'width'		=> 600,
										'height'	=> 400,
								)); ?>
							</li>
						
						<?php endforeach; ?>
					</ul>
				</div>
				
				<p class="photo-credits">
					Photos by <a href="http://www.mw-fotografie.de">Marc Wiegelmann</a>
				</p>
				
				<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
				<a href="#" class="jcarousel-control-next">&rsaquo;</a>
				
				<p class="jcarousel-pagination">
				
				</p>
			</div>
		</div>
		
	</div>
</div>

<?php foreach($lastNews as $news): ?>
	
<div class="news panel panel-default">
	<div class="panel-heading">
		<?= $news['News']['title'] ?> | le <?= date("d/m/Y", strtotime($news['News']['created'])); ?>
	</div>
	
	<div class="panel-body">
		<?= $news['News']['content'] ?>
	</div>
</div>

<?php endforeach; ?>

<?php $this->addScript($this->Html->css('jcarousel.basic')); ?>
<?php $this->addScript($this->Html->script('jquery')); ?>
<?php $this->addScript($this->Html->script('jcarousel/jquery.jcarousel.min')); ?>
<?php $this->addScript($this->Html->script('jcarousel.basic')); ?>
