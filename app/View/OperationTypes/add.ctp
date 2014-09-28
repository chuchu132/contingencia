
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('Lista de Tipos de Operaciones'), array('action' => 'index')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Publicaciones'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Publicación'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Crear Tipo de Operación'); ?></h2>

		<div class="operationTypes form">
		
			<?php echo $this->Form->create('OperationType', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Enviar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->