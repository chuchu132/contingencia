
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item active"><?php echo __('Mis Publicaciones'); ?>
				<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Publicacion'), array('action' => 'choose'), array('class' => '')); ?></li>
			    <li class="list-group-item"><?php echo $this->Html->link(__('Mis Datos'), array('controller'=>'users','action' => 'view'), array('class' => '')); ?></li>
				<li class="list-group-item"><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'users','action' => 'logout'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="publications index">
		
			<h2><?php echo __('Mis Publicaciones'); ?></h2>
			
			<div class="form panel panel-default">
						<div class="panel-heading">
						<?php echo __('Filtrar por estado'); ?>
						</div>
						<?php echo $this -> Form -> create('Publication', array('inputDefaults' => array('label' => false), 'role' => 'form', 'action'=>'index')); ?>

						<div class="panel-body row">
							<fieldset>
							
								<div class="col-lg-4 col-md-4 col-sm-2 col-sx-2 ">



								<?php echo $this -> Form -> input('status', array('options' => $status_list,'value'=>$status_filter ,'empty' => false, 'class' => 'form-control input-medium')); ?>
									<!-- .form-group -->

								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-sx-3">
								<?php echo $this -> Form -> submit(__('Filtrar'), array('class' => 'btn btn-primary')); ?>
								<?php echo $this -> Form -> end(); ?>
								</div>
							</fieldset>
						</div>
					</div>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped index-table-bordered">
					<thead>
						<tr>
						<th><?php echo $this->Paginator->sort('operation_type_id'); ?></th>
						<th><?php echo $this->Paginator->sort('property_type_id'); ?></th>
							<th><?php echo $this->Paginator->sort('street'); ?></th>
							<th><?php echo $this->Paginator->sort('st_number'); ?></th>
							<th><?php echo $this->Paginator->sort('neighborhood_id'); ?></th>
							<th><?php echo $this->Paginator->sort('status'); ?></th>
							<th><?php echo $this->Paginator->sort('publication_date'); ?></th>
							<th><?php echo $this->Paginator->sort('end_date'); ?></th>
							<th><?php echo $this->Paginator->sort('publication_type'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($publications as $publication): ?>
	<tr>
		<td><?php echo h($publication['OperationType']['name']); ?>&nbsp;</td>
		<td><?php echo h($publication['PropertyType']['name']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['street']); ?>&nbsp;</td>
		<td><?php echo h($publication['Publication']['st_number']); ?>&nbsp;</td>
		<td><?php echo h($publication['Neighborhood']['name']);?>&nbsp;</td>
		<td><div class="btn-xs mileem-btn-<?php
			$class = array(PUBLICADA=>'success',PAUSADO=>'warning',FINALIZADA=>'danger');
			if(key_exists($publication['Publication']['status'], $class)){
				echo $class[$publication['Publication']['status']];		
			}
		?>"> 
		<?php echo h($status_list[$publication['Publication']['status']]); ?>&nbsp;</div></td>
		<td><?php echo h( date('d-m-Y',strtotime($publication['Publication']['publication_date']))); ?>&nbsp;</td>
		<td><?php echo h( date('d-m-Y',strtotime($publication['Publication']['end_date']))); ?>&nbsp;</td>
		<td><?php echo h($type[$publication['Publication']['publication_type']]); ?>&nbsp;</td>
	
		<td class="actions">
			<?php echo $this->Html->link($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-info-sign')), array('action' => 'view', $publication['Publication']['id']), array('class' => 'btn btn-info btn-xs','escapeTitle' => false, 'title'=>__('Ver Publicación'))); ?>
			<?php // echo $this->Html->link(__('Editar'), array('action' => 'edit', $publication['Publication']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php  if( $publication['Publication']['status'] == PUBLICADA){
					echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-pause')), array('action' => 'pause', $publication['Publication']['id']), array('class' => 'btn btn-warning btn-xs','escapeTitle' => false, 'title'=>__('Pausar Publicación')), __('Estas seguro de pausar esta publicación?'));
				}else if($publication['Publication']['status'] == PAUSADO  ){
					echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-play')), array('action' => 'play', $publication['Publication']['id']), array('class' => 'btn btn-success btn-xs','escapeTitle' => false, 'title'=>__('Reanudar Publicación')), __('Estas seguro de reanudar esta publicación?'));
				} 
				if( $publication['Publication']['status'] != FINALIZADA) {
					echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-stop')), array('action' => 'end', $publication['Publication']['id']), array('class' => 'btn btn-danger btn-xs','escapeTitle' => false, 'title'=>__('Finalizar Publicación')), __('Estas seguro de finalizar esta publicación?'));
				}
			?>
			<?php echo $this->Form->postLink($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-trash')), array('action' => 'delete', $publication['Publication']['id']), array('class' => 'btn btn-danger btn-xs','escapeTitle' => false ),__('Estas seguro de eliminar esta publicación?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->