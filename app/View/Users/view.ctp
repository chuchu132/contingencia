
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
			<li class="list-group-item active"><?php echo __('Mis Datos'); ?>
			<li class="list-group-item"><?php echo $this->Html->link(__('Editar Mis Datos'), array('action' => 'edit'), array('class' => '')); ?> </li>
			<li class="list-group-item"><?php echo $this->Html->link(__('Volver'), array('controller' => 'publications', 'action' => 'index'), array('class' => '')); ?> </li>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="users view">

			<h2><?php  echo __('Mis Datos'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
					<tr>		<td><strong><?php echo __('Username'); ?></strong></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tel Part'); ?></strong></td>
		<td>
			<?php echo h($user['User']['tel_part']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Mobile'); ?></strong></td>
		<td>
			<?php echo h($user['User']['mobile']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
</tr>				</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

		
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
