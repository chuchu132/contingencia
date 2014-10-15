
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Editar Barrio'), array('action' => 'edit', $neighborhood['Neighborhood']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Eliminar Barrio'), array('action' => 'delete', $neighborhood['Neighborhood']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $neighborhood['Neighborhood']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Barrios'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nuevo Barrio'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Ciudades'), array('controller' => 'cities', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Ciudad'), array('controller' => 'cities', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Publicaciones'), array('controller' => 'publications', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Publicación'), array('controller' => 'publications', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="neighborhoods view">

			<h2><?php  echo __('Barrio'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($neighborhood['Neighborhood']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($neighborhood['Neighborhood']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($neighborhood['Neighborhood']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated'); ?></strong></td>
		<td>
			<?php echo h($neighborhood['Neighborhood']['updated']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('City'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($neighborhood['City']['name'], array('controller' => 'cities', 'action' => 'view', $neighborhood['City']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->





					
			<div class="related">

				<h3><?php echo __('Barrios con los que limita'); ?></h3>
				
				<?php if (!empty($neighborhood['LimitWith'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Barrio'); ?></th>

									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($neighborhood['LimitWith'] as $neighbor): ?>
		<tr>
			<td><?php echo $neighbor['id']; ?></td>
			<td><?php echo $neighbor['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array( 'action' => 'view', $neighbor['id']), array('class' => 'btn btn-default btn-xs')); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('Nueva Publicación'), array('controller' => 'publications', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->






					
			<div class="related">

				<h3><?php echo __('Publicaciones Relacionadas'); ?></h3>
				
				<?php if (!empty($neighborhood['Publication'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Neighborhood Id'); ?></th>
		<th><?php echo __('Covered Area'); ?></th>
		<th><?php echo __('Total Area'); ?></th>
		<th><?php echo __('Rooms'); ?></th>
		<th><?php echo __('Expenses'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Brand New'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Currency'); ?></th>
		<th><?php echo __('Balcony'); ?></th>
		<th><?php echo __('Bathrooms'); ?></th>
		<th><?php echo __('Dining Room'); ?></th>
		<th><?php echo __('Ensuite Bedroom'); ?></th>
		<th><?php echo __('Storage'); ?></th>
		<th><?php echo __('Garage'); ?></th>
		<th><?php echo __('Studio'); ?></th>
		<th><?php echo __('Kitchen'); ?></th>
		<th><?php echo __('Service Unit'); ?></th>
		<th><?php echo __('Hall'); ?></th>
		<th><?php echo __('Frontgarden'); ?></th>
		<th><?php echo __('Backyard'); ?></th>
		<th><?php echo __('Laundry'); ?></th>
		<th><?php echo __('Lounge'); ?></th>
		<th><?php echo __('Living Room'); ?></th>
		<th><?php echo __('Terrace'); ?></th>
		<th><?php echo __('Mains Water'); ?></th>
		<th><?php echo __('Drains'); ?></th>
		<th><?php echo __('Cable'); ?></th>
		<th><?php echo __('Gas'); ?></th>
		<th><?php echo __('Internet'); ?></th>
		<th><?php echo __('Pavement'); ?></th>
		<th><?php echo __('Publication Date'); ?></th>
		<th><?php echo __('Publcation Type'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Video'); ?></th>
		<th><?php echo __('Images Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Operation Type Id'); ?></th>
		<th><?php echo __('Property Type Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($neighborhood['Publication'] as $publication): ?>
		<tr>
			<td><?php echo $publication['id']; ?></td>
			<td><?php echo $publication['address']; ?></td>
			<td><?php echo $publication['neighborhood_id']; ?></td>
			<td><?php echo $publication['covered_area']; ?></td>
			<td><?php echo $publication['total_area']; ?></td>
			<td><?php echo $publication['rooms']; ?></td>
			<td><?php echo $publication['expenses']; ?></td>
			<td><?php echo $publication['age']; ?></td>
			<td><?php echo $publication['brand_new']; ?></td>
			<td><?php echo $publication['price']; ?></td>
			<td><?php echo $publication['currency']; ?></td>
			<td><?php echo $publication['balcony']; ?></td>
			<td><?php echo $publication['bathrooms']; ?></td>
			<td><?php echo $publication['dining_room']; ?></td>
			<td><?php echo $publication['ensuite_bedroom']; ?></td>
			<td><?php echo $publication['storage']; ?></td>
			<td><?php echo $publication['garage']; ?></td>
			<td><?php echo $publication['studio']; ?></td>
			<td><?php echo $publication['kitchen']; ?></td>
			<td><?php echo $publication['service_unit']; ?></td>
			<td><?php echo $publication['hall']; ?></td>
			<td><?php echo $publication['frontgarden']; ?></td>
			<td><?php echo $publication['backyard']; ?></td>
			<td><?php echo $publication['laundry']; ?></td>
			<td><?php echo $publication['lounge']; ?></td>
			<td><?php echo $publication['living_room']; ?></td>
			<td><?php echo $publication['terrace']; ?></td>
			<td><?php echo $publication['mains_water']; ?></td>
			<td><?php echo $publication['drains']; ?></td>
			<td><?php echo $publication['cable']; ?></td>
			<td><?php echo $publication['gas']; ?></td>
			<td><?php echo $publication['internet']; ?></td>
			<td><?php echo $publication['pavement']; ?></td>
			<td><?php echo $publication['publication_date']; ?></td>
			<td><?php echo $publication['publication_type']; ?></td>
			<td><?php echo $publication['status']; ?></td>
			<td><?php echo $publication['video']; ?></td>
			<td><?php echo $publication['images_url']; ?></td>
			<td><?php echo $publication['created']; ?></td>
			<td><?php echo $publication['updated']; ?></td>
			<td><?php echo $publication['operation_type_id']; ?></td>
			<td><?php echo $publication['property_type_id']; ?></td>
			<td><?php echo $publication['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'publications', 'action' => 'view', $publication['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'publications', 'action' => 'edit', $publication['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'publications', 'action' => 'delete', $publication['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $publication['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('Nueva Publicación'), array('controller' => 'publications', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
