<?php 
echo $this->Html->css('daterangepicker');
echo $this->Html->script('publicaciones');
echo $this->Html->script('moment.min');
echo $this->Html->script('jquery.daterangepicker');
echo $this->Html->script('usig.min');

?>
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

		<h2><?php echo __('Crear Publicación'); ?></h2>

		<div class="publications form">
		
		
			<?php echo $this->Form->create('Publication',array('novalidate' => true,
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error','after')
    ),'role' => 'form', 'type' => 'file' )); ?>

				<fieldset>
				<div class="form-group row">
					<div class="col-lg-6 col-md-6 col-sx-12">
						<?php echo $this->Form->input('operation_type_id', array('class' => 'form-control')); ?>
						</div>
					<div class="col-lg-6 col-md-6 col-sx-12">
						<?php echo $this->Form->input('property_type_id', array('class' => 'form-control')); ?>
				</div>
				</div>
				<div class="well" id="tiempo" style="display:none;">
					<h3>
						<?php echo __('Disponibilidad'); ?>
						</h3>
						<div class="form-group row">
					<div class="col-lg-8 col-md-8 col-sx-12">
					<?php echo $this->Form->input('availability', array('class' => 'form-control','label'=>false, 'readonly'=>"readonly",'style'=>'cursor:pointer;')); ?>
					</div>
					</div>
				</div>
				
				<div class="well">
					<h3>
						<?php echo __('Multimedia'); ?>
						</h3>
					<div class="form-group row">
					<?php if($type == PREMIUM){?>
						<div class="col-lg-4 col-md-4 col-sx-12">
						<?php echo $this -> Form -> label('video', __('Link de Youtube')); ?>
						</div>
						<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('video', array('class' => 'form-control','label' => false)); ?>
						</div>
					<?php }?>
						<div class="col-lg-12 col-md-12 col-sx-12">
						<?php echo $this->Form->input('imagen_1', array('type' => 'file')); ?>
				</div>
						<div class="col-lg-12 col-md-12 col-sx-12">
						<?php echo $this->Form->input('imagen_2', array('type' => 'file')); ?>
				
							</div>
								<div class="col-lg-12 col-md-12 col-sx-12">
									<?php echo $this->Form->input('imagen_3', array('type' => 'file')); ?>
				
							</div>
							<?php if($type == BASICA || $type == PREMIUM){?>
							<div class="col-lg-12 col-md-12 col-sx-12">
							<?php echo $this->Form->input('imagen_4', array('type' => 'file')); ?>
				
							</div>
								<div class="col-lg-12 col-md-12 col-sx-12">
									<?php echo $this->Form->input('imagen_5', array('type' => 'file')); ?>
				
							</div>
							<?php }?>
							</div>
				</div>
				
				<div class="well">
					<h3>
						<?php echo __('Ubicación y Precio'); ?>
						</h3>
					<div class="form-group row">
						<div class="col-lg-8 col-md-8 col-sx-12">
					<?php echo $this->Form->input('street', array('class' => 'form-control')); ?>
			</div>
						<div class="col-lg-4 col-md-4 col-sx-12">
						<?php echo $this->Form->input('st_number', array('class' => 'form-control')); ?>
				</div>
						<div class="col-lg-8 col-md-8 col-sx-12">
						<?php echo $this->Form->input('neighborhood_id', array('class' => 'form-control')); ?>
				
							</div>
						<div class="col-lg-8 col-md-8 col-sx-0"></div>
						<div class="col-lg-8 col-md-8 col-sx-12">
					<?php echo $this->Form->input('price', array('class' => 'form-control')); ?>
			</div>
						<div class="col-lg-4 col-md-4 col-sx-12">
							<?php echo $this->Form->input('currency', array('class' => 'form-control','options'=>$currency_types)); ?>
				</div>
					</div>
				</div>


		<div class="well">
				<div class="form-group row">
					<h3><?php echo __('Datos Generales de la Propiedad'); ?></h3>
						<div class="col-lg-6 col-md-6 col-sx-12">
						<?php echo $this->Form->input('covered_area', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
						<?php echo $this->Form->input('total_area', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
						<?php echo $this->Form->input('expenses', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-2 col-md-2 col-sx-12">
							<?php echo $this->Form->input('age', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-4 col-md-4 col-sx-12">
						<?php echo $this->Form->input('brand_new', array('class' => 'form-control')); ?>
						</div>
						
				</div>
			</div>
				
				<div class="type12" style="visibility: none;">
				<div class="well">
					<div class="form-group row">
					<h3><?php echo __('Cuéntanos algo más sobre tu propiedad'); ?></h3>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('rooms', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('bathrooms', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
								<?php echo $this->Form->input('balcony', array('class' => 'form-control')); ?>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('dining_room', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('kitchen', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('ensuite_bedroom', array('class' => 'form-control')); ?>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('studio', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('garage', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('storage', array('class' => 'form-control')); ?>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('living_room', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('lounge', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('terrace', array('class' => 'form-control')); ?>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('service_unit', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('laundry', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('hall', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('frontgarden', array('class' => 'form-control')); ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sx-12">
							<?php echo $this->Form->input('backyard', array('class' => 'form-control')); ?>
						</div>
					</div>
				</div>
				</div>
				<div class="well">
					<div class="form-group row">
						<h3><?php echo __('Qué servicios tiene?'); ?></h3>
						<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('mains_water', array('class' => 'form-control')); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('drains', array('class' => 'form-control')); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('cable', array('class' => 'form-control')); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('gas', array('class' => 'form-control')); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('internet', array('class' => 'form-control')); ?>
							</div>
							<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('pavement', array('class' => 'form-control')); ?>
							</div>
					</div>
				</div>
				
				<div class="well">
					<div class="form-group row">
						<h3><?php echo __('Espacio para texto libre'); ?></h3>
						<p><i>Ten en cuenta que este campo es solo descriptivo y no será utilizado en las búsquedas.</i></p>
						<div class="col-lg-8 col-md-8 col-sx-12">
							<?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
						</div>
					</div>
				</div>

				<?php echo $this->Form->hidden('publication_type', array('class' => 'form-control', 'value'=>$type)); ?>
				<div class="pull-right">
					<?php echo $this->Form->submit('Enviar', array('class' => 'btn btn-large btn-primary')); ?>
				</div>
				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div>
		<!-- /.form -->

	</div>
	<!-- /#page-content .col-sm-9 -->

</div>
<!-- /#page-container .row-fluid -->