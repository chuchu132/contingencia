<?php echo $this->Html->css('slides'); ?>
<?php echo $this->Html->script('jquery.slides.min'); ?>
<?php echo $this->Html->script('login'); ?>
<div class="row">
<div class="users form col-lg-4 col-md-6">
<div class="well">


<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',  array('url' => array('controller' => 'users', 'action' =>'login'))); ?>
    <fieldset>
        <h2 class="legend"><?php echo __('Usuario registrado'); ?></h2>
        <?php echo $this->Form->input('username', array('class' => 'form-control','label' => __('Email')));
        	  echo $this->Form->input('password', array('class' => 'form-control','label' => __('Password')));?>
       <br/>

        <?php	  echo $this->Form->submit(__('Ingresar'),array('class' => 'btn btn-lg btn-primary'));
    ?>
    </fieldset>
<?php echo $this->Form->end(); ?>

</div>
<div class="well">
	
<h2 class="legend"><?php echo __('Nuevo usuario'); ?></h2>

<?php echo $this->Html->link(__('Registrarse'), array('controller' => 'users', 'action' => 'add'), array('class' => "btn btn-lg btn-primary") )  ?>
<br/>
<br/>
<br/>
</div>
	
</div>
<div class="col-lg-5 col-md-6">
	
	<div class="well">
		<div id="slides" style="display:none">
		<?php 
		echo $this->Html->image('screenshoot1.png',array('width'=>'320px'));
		echo $this->Html->image('screenshoot2.png',array('width'=>'320px'));
		echo $this->Html->image('screenshoot3.png',array('width'=>'320px'));
		
		?>
		</div>
		<?php echo $this->Html->link($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-cloud-download')) . "</span> ".__('Descargar App') ,array() ,array('class' => "btn btn-lg btn-primary", 'escapeTitle'=>false,'style'=>'margin-top:10px' ) );  ?>
	</div>

</div>
</div>

