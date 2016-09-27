<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			
			<?php
			$menuList = $this->requestAction('/menus/getMenuList');
			
			foreach($menuList as $menu):
				if($menu['Menu']['post_id'] == 0):
			?>
			
			<li class="dropdown">
				<a class = 'dropdown-toggle' data-toggle = 'dropdown' role = 'button' aria-haspopup = 'true' aria-expanded = 'false'>
					<?= $menu['Menu']['title'] ?> <span class='caret'></span>
				</a>

				<ul class="dropdown-menu">
					
					<?php
					$subMenuList = $this->requestAction('/menus/getSubMenuList/' . $menu['Menu']['id']);
					
					foreach($subMenuList as $subMenu):
					?>
							
					<li>
						<?= $this->Html->link(
								$subMenu['Menu']['title'],
								'/posts/display/' . $subMenu['Post']['id'] . '/' . $subMenu['Post']['slug']
						) ?>
					</li>
						
					<?php endforeach; ?>
					
				</ul>
					
				<?php else:	?>
						
				<li>
					<?= $this->Html->link(
							$menu['Menu']['title'],
							'/posts/display/' . $menu['Post']['id'] . '/' . $menu['Post']['slug']
					) ?>
				</li>
				
					
			<?php
				endif;
			endforeach;
			?>
		
		</ul>
	</div>
</nav>