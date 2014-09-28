
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
				<li class="list-group-item"><?php echo $this->Html->link(__('Mis Publicaciones'), array('action' => 'index'), array('class' => '')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('Nueva Publicación'), array('action' => 'choose'), array('class' => '')); ?> </li>
				<li class="list-group-item active"><?php echo __('Detalle de la Publicación'); ?>	
				<li class="list-group-item"><?php echo $this->Html->link(__('Editar Publicación'), array('action' => 'edit',$publication['Publication']['id']), array('class' => '')); ?> </li>
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="publications view">

			<h2><?php  echo __('Publicación'); ?></h2>
			<b>Imágenes:</b>
			<div class="well" style="text-align:center">
			<?php  $images = json_decode($publication['Publication']['images_url']);
				if(!empty($images)){
					foreach ($images as $image){
						echo $this->Html->image($this->webroot.$image,array('width'=>'320px','style'=>'    border-color: #e91e63;
    border-radius: 5px;
    border-style: solid;
    border-width: 3px;
    margin: 10px;
    vertical-align: middle;'));
					}
				}
			?>
			
			
			
			</div>
			<b>Video:</b>
			<div class="well" style="text-align:center">
			<?php  if(!empty($publication['Publication']['video']) && strlen($publication['Publication']['video']) >11){ ?>
			
			<object width="420" height="315" data="//www.youtube.com/embed/<?php echo substr($publication['Publication']['video'], strlen($publication['Publication']['video'])-11,11);?>"></object>
			<?php 					
				}
			?>
			
			
			
			</div>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
					<tr>		<td><strong><?php echo __('Operation Type'); ?></strong></td>
		<td>
			<?php echo h($publication['OperationType']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Property Type'); ?></strong></td>
		<td>
			<?php echo h($publication['PropertyType']['name']); ?>
			&nbsp;
		</td>
</tr>
<?php if($publication['Publication']['operation_type_id'] == "4" ){ ?>
<tr>		
<td><strong><?php echo __('Disponibile'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['availability']); ?>
			&nbsp;
		</td>
</tr>
<?php }?>
<tr>		<td><strong><?php echo __('Ubicación'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['street']).' '.h($publication['Publication']['st_number']).', '.h($publication['Neighborhood']['name']); ?>
			&nbsp;
		</td>

		</tr>
		<tr>		<td><strong><?php echo __('Price'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['price']).' '.h($publication['Publication']['currency']); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Covered Area'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['covered_area']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Total Area'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['total_area']); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Expenses'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['expenses']); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Age'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['age']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Brand New'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['brand_new']); ?>
			&nbsp;
		</td>
</tr>

<?php if($publication['Publication']['property_type_id'] < "8"){?>

<tr>		<td><strong><?php echo __('Rooms'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['rooms']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Balcony'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['balcony']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bathrooms'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['bathrooms']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Dining Room'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['dining_room']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ensuite Bedroom'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['ensuite_bedroom']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Storage'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['storage']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Garage'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['garage']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Studio'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['studio']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Kitchen'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['kitchen']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Service Unit'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['service_unit']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Hall'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['hall']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Frontgarden'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['frontgarden']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Backyard'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['backyard']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Laundry'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['laundry']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Lounge'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['lounge']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Living Room'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['living_room']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Terrace'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['terrace']); ?>
			&nbsp;
		</td>
</tr>
<?php }?>
<tr>		<td><strong><?php echo __('Mains Water'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['mains_water']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Drains'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['drains']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cable'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['cable']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Gas'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['gas']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Internet'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['internet']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pavement'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['pavement']); ?>
			&nbsp;
		</td>
</tr>

<tr>		<td><strong><?php echo __('Publcation Type'); ?></strong></td>
		<td>
				<?php echo h($type[$publication['Publication']['publication_type']]); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Publication Date'); ?></strong></td>
		<td>
			<?php echo h(date('d-m-Y',strtotime($publication['Publication']['publication_date']))); ?>
		
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('End Date'); ?></strong></td>
		<td>
			<?php echo h(date('d-m-Y',strtotime($publication['Publication']['end_date']))); ?>
			&nbsp;
		</td>
</tr>
<tr>		<td><strong><?php echo __('Status'); ?></strong></td>
		<td>
			<div style="width: 100px;text-align:center;" class="btn-xs btn-<?php
			$class = array(PUBLICADA=>'success',PAUSADO=>'warning',FINALIZADA=>'danger');
			if(key_exists($publication['Publication']['status'], $class)){
				echo $class[$publication['Publication']['status']];		
			}
		?>"> 
		<?php echo h($status_list[$publication['Publication']['status']]); ?>&nbsp;</div>
		</td>
</tr>	


<tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($publication['Publication']['description']); ?>
			&nbsp;
		</td>
</tr>
</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
