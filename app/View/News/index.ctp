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
				
				<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
				<a href="#" class="jcarousel-control-next">&rsaquo;</a>
				
				<p class="jcarousel-pagination">
				
				</p>
			</div>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-md-12">

		<?php foreach($lastNews as $news): ?>
			
		<div class="news panel panel-primary">
			<div class="panel-heading">
				<?php
				if($this->Session->read('Auth.User.id'))
					echo $this->Html->link(
							'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
							'/news/edit/' . $news['News']['id'],
							array('class' => 'btn btn-warning', 'escape' => false)
					);
				?>
				<?= $news['News']['title'] ?> | le <?= date("d/m/Y", strtotime($news['News']['created'])); ?>
			</div>
			
			<div class="panel-body">
				<?= $news['News']['content'] ?>
			</div>
		</div>
		
		<?php endforeach; ?>
	</div>
	<div class="pages">
	    <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>

<?php $this->addScript($this->Html->css('jcarousel.basic')); ?>
<?php $this->addScript($this->Html->script('jquery')); ?>
<?php $this->addScript($this->Html->script('jcarousel/jquery.jcarousel.min')); ?>
<?php $this->addScript($this->Html->script('jcarousel.basic')); ?>
