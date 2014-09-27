<?php echo $this->Html->script('publicaciones'); ?>
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">

		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('Mis Publicaciones'), array('action' => 'index')); ?></li>
				<li class="list-group-item active"><?php echo __('Nueva Publicación'); ?>
				
				
				<li class="list-group-item"><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'users','action' => 'logout'), array('class' => '')); ?></li>
			</ul>
			<!-- /.list-group -->

		</div>
		<!-- /.actions -->

	</div>
	<!-- /#sidebar .col-sm-3 -->

	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Elige el Tipo de Publicación'); ?></h2>


		<div class="row">
			<div class="col-lg-4 col-md-4 col-sx-12">
				<div class="well">
					<h3>
						<?php echo __('Gratuita'); ?>
						</h3>
						<ul class="package-feature">
					      <li>3 imágenes</li>
					      <li>Ubicación</li>
					      <li>Descripción</li>
					      <li>Estadísticas de visitas</li>
					      <li></span>Sin videos</li>
					      <li></span>Sin prioridad en la búsqueda</li>
					      <li></span>Sin destaque</li>
					      <li>Duración 30 días</li>
  						</ul>
						
					<?php echo $this -> Html -> link(__('Continuar'), array('controller' => 'publications', 'action' => 'add/'.GRATIS), array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sx-12">
				<div class="well">
					<h3>
						<?php echo __('Básica'); ?>
						</h3>
						<h4>$50.0 x publicación</h4>
						<ul class="package-feature">
					      <li>5 imágenes</li>
					      <li>Ubicación</li>
					      <li>Descripción</li>
					      <li>Estadísticas de visitas</li>
					      <li></span>1 video</li>
					      <li></span>Con prioridad en la búsqueda</li>
					      <li></span>Sin destaque</li>
					      <li>Duración 90 días</li>
  						</ul>
<?php echo $this -> Html -> link(__('Continuar'), array('controller' => 'publications', 'action' => 'add/'.BASICA), array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sx-12">
				<div class="well">
					<h3>
						<?php echo __('Premium'); ?>
						</h3>
						<h4>$99.0 x publicación</h4>
						<ul class="package-feature">
					      <li>5 imágenes</li>
					      <li>Ubicación</li>
					      <li>Descripción</li>
					      <li>Estadísticas de visitas</li>
					      <li></span>1 video</li>
					      <li></span>Con prioridad en la búsqueda</li>
					      <li></span>Con destaque</li>
					      <li>Duración 365 días</li>
  						</ul>
<?php echo $this -> Html -> link(__('Continuar'), array('controller' => 'publications', 'action' => 'add/'.PREMIUM), array('class' => 'btn btn-sm btn-primary')); ?>
				</div>
			</div>
		</div>
	</div>