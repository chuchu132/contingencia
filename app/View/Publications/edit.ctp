
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
		<li class="list-group-item"><?php echo $this->Html->link(__('Mis Publicaciones'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Publicación'), array('action' => 'choose'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Detalle de la Publicación'), array('action' => 'view', $this->data['Publication']['id']), array('class' => '')); ?> </li>
			<li class="list-group-item active"><?php echo __('Editar Publicación'); ?>	
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Editar Publicación'); ?></h2>

		<div class="publications form">
		
			<?php echo $this->Form->create('Publication', array('role' => 'form')); ?>

				<fieldset>
		
				<div class="well">
					<div class="form-group row">
						<div class="col-lg-8 col-md-8 col-sx-12">
					<?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
					</div>
						<div class="col-lg-4 col-md-4 col-sx-12">
							<?php echo $this->Form->input('currency', array('class' => 'form-control','options'=>$currency_types)); ?>
				</div>
					</div>
				</div>

					<?php echo $this->Form->submit('Enviar', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->