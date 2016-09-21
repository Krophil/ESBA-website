<div class="row">
	
	<div class="col-md-12">
		<div class="alert alert-dismissible alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $this->element('warning-sidebar') ?>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="well">
			<div class="btn-group-vertical btn-block">
				<?= $this->Html->link(
						'Informations',
						'/divers/info',
						array(
								'class'	=> 'btn btn-default',
						)
				) ?>
				<?= $this->Html->link(
						'Plan d\'accès',
						'/divers/plan',
						array(
								'class'	=> 'btn btn-default',
						)
				) ?>
				<?= $this->Html->link(
						'Partenaires',
						'/divers/partenaires',
						array(
								'class'	=> 'btn btn-default',
						)
				) ?>
				<?= $this->Html->link(
						'Contact',
						'/divers/contact',
						array(
								'class'	=> 'btn btn-default',
						)
				) ?>
			</div>
			<div class="btn-group-vertical btn-block">
				<?= $this->Html->link(
						'Espace Administrateur',
						'/admin/index',
						array(
								'class'	=> 'btn btn-default',
						)
				) ?>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="meteo">
			<?= $this->Html->script('http://www.meteofrance.com/mf3-rpc-portlet/rest/vignettepartenaire/683070/type/VILLE_FRANCE/size/PORTRAIT_VIGNETTE') ?>
		</div>
	</div>

</div>