<div class="panel panel-default">
	<div class="panel-body">
		<?= $this->Html->link(
			'<h4>Ajouter un nouveau menu <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></h4>',
			'/menus/add',
			array('class' => 'btn btn-default btn-xs', 'escape' => false)
		); ?>
	</div>
</div>

<?php
$menuList = $this->requestAction('/menus/getMenuList');
foreach($menuList as $menu):
?>
<div class="panel panel-default">
	<div class="panel-body admin-btn">
		<h4>
			<?= $menu['Menu']['title'] ?>
			
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
				'/menus/edit/' . $menu['Menu']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
			
			<?= $this->Html->link(
				'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
				'/menus/delete/' . $menu['Menu']['id'],
				array('class' => 'btn btn-default btn-xs', 'escape' => false)
			); ?>
		</h4>
		
		<?php if($menu['Menu']['post_id'] == 0): ?>
		
		<div class="panel panel-default">
			<div class="panel-body admin-btn">
		
				<?php
				$subMenuList = $this->requestAction('/menus/getSubMenuList/' . $menu['Menu']['id']);
				foreach($subMenuList as $subMenu):
				?>
					
				<h4>
					<?= $subMenu['Menu']['title'] ?>
					
					<?= $this->Html->link(
						'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
						'/menus/edit/' . $subMenu['Menu']['id'],
						array('class' => 'btn btn-default btn-xs', 'escape' => false)
					); ?>
					
					<?= $this->Html->link(
						'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
						'/menus/delete/' . $subMenu['Menu']['id'],
						array('class' => 'btn btn-default btn-xs', 'escape' => false)
					); ?>
				</h4>
			
				<?php endforeach; ?>
			
			</div>
		</div>
	
		<?php endif; ?>
		
	</div>
</div>
<?php endforeach; ?>