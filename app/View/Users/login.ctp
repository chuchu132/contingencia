<?php echo $this->Html->css('slides'); ?>
<?php echo $this->Html->script('jquery.slides.min'); ?>
<?php echo $this->Html->script('login'); ?>
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="well">


<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',  array('url' => array('controller' => 'users', 'action' =>'login'))); ?>
    <fieldset>
        <h2 class="legend"><?php echo __('Usuario registrado'); ?></h2>
       <?php echo $this->Form->input('username', array('class' => 'form-control','placeholder'=>'ejemplo@mail.com')); 
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
</div>

<div class="well"  style="text-align:center;">
	
<h2 class="legend" style="text-align:left;"><?php echo __('QR'); ?></h2>

<?php echo  $this->Html->image('qr.png',array('width'=>'190px'));  ?>
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
		<?php echo $this->Html->link($this->Html->tag('span', null, array('class' => 'glyphicon glyphicon-cloud-download')) . "</span> ".__('Descargar App') ,'https://drive.google.com/file/d/0B5Vp69pKvP2lRGE1U2k5Q0l6dFU/edit?usp=sharing' ,array('class' => "btn btn-lg btn-primary", 'escapeTitle'=>false,'style'=>'margin-top:10px' ) );  ?>
	<br/>
	<br/>
	<br/>
	</div>

</div>
<div class="col-lg-2 col-md-12">
	    <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/ar/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="https://www.paypal.com/en_US/Marketing/i/logo/bnr_international_buyer2_265x70.gif" border="0" alt="International Seller"></a></td></tr></table><!-- PayPal Logo -->
</div>
</div>



