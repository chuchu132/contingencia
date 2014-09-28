
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
			<li class="list-group-item"><?php echo $this->Html->link(__('Mis Datos'), array('action' => 'view'), array('class' => '')); ?> </li>
				<li class="list-group-item active"><?php echo __('Editar Mis Datos'); ?>
				<li class="list-group-item"><?php echo $this->Html->link(__('Volver '), array('controller' => 'publications', 'action' => 'index')); ?> </li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Editar Mis Datos'); ?></h2>

		<div class="users form">
		
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<fieldset>

						<?php echo $this->Form->hidden('id', array('class' => 'form-control')); ?>
					<div class="form-group">
						<?php echo $this->Form->input('tel_part', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('mobile', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Enviar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->