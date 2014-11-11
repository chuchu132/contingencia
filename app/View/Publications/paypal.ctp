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

		<h2><?php echo __('Pago de publicacion'); ?></h2>

        <div class="col-lg-6 col-md-6 col-sx-12">
            <label for="paypal">PayPal</label>
            </div>
        <div class="col-lg-6 col-md-6 col-sx-12">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="item_number" value="<?php echo $order['id']; ?>">
                <input type="hidden" name="return" value="<?php echo $order['return']; ?>">
                <input type="hidden" name="cancel_return" value="<?php echo $order['cancel']; ?>">
                <input type="hidden" name="item_name" value="<?php echo $order['description']; ?>">
                <input type="hidden" name="business" value="andres.garcia@inakanetworks.com">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="amount_x" value="1">
                <input type="hidden" name="notify_url" value="http://mileem-fiuba.herokuapp.com/paypal_ipn/process">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="amount" value="<?php echo $order['amount']; ?>">
            <input type="hidden" name="hosted_button_id" value="GUFBS37YSNYSC">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>




<div class="pull-right">
					<div class="submit"><a class="btn btn-large btn-primary" href="/publications">Saltar pago</a></div>
									</div>
	</div>
	<!-- /#page-content .col-sm-9 -->

</div>
<!-- /#page-container .row-fluid -->
