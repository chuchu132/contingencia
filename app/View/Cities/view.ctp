
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Editar Ciudad'), array('action' => 'edit', $city['City']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Eliminar Ciudad'), array('action' => 'delete', $city['City']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Ciudades'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Ciudad'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Listado de Barrios'), array('controller' => 'neighborhoods', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('Nuevo Barrio'), array('controller' => 'neighborhoods', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="cities view">

			<h2><?php  echo __('City'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($city['City']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($city['City']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated'); ?></strong></td>
		<td>
			<?php echo h($city['City']['updated']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Neighborhoods'); ?></h3>
				
				<?php if (!empty($city['Neighborhood'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('City Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($city['Neighborhood'] as $neighborhood): ?>
		<tr>
			<td><?php echo $neighborhood['id']; ?></td>
			<td><?php echo $neighborhood['name']; ?></td>
			<td><?php echo $neighborhood['created']; ?></td>
			<td><?php echo $neighborhood['updated']; ?></td>
			<td><?php echo $neighborhood['city_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'neighborhoods', 'action' => 'view', $neighborhood['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'neighborhoods', 'action' => 'edit', $neighborhood['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'neighborhoods', 'action' => 'delete', $neighborhood['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $neighborhood['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('Nuevo Barrio'), array('controller' => 'neighborhoods', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
