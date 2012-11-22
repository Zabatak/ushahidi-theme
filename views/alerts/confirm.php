<div >
	<div>
		
		<!-- start block -->
		<div>
			<h3><?php echo Kohana::lang('ui_main.alerts_get') ?></h3>
			
			<?php if(1 or $show_mobile == TRUE): ?>
			<!-- Mobile Alert -->
			<div class="well">
				<fieldset>
					<legend>Mobile Alerts</legend>
				<?php if ($alert_mobile): ?>
					<h3><?php echo Kohana::lang('alerts.mobile_ok_head') ?> </h3>
				<?php endif; ?>
				<div>
					<?php if ($alert_mobile): ?>
						<?php Kohana::lang('alerts.mobile_alert_request_created')?>
						<u><strong> <?php $alert_mobile ?></strong></u>
							<?php echo Kohana::lang('alerts.verify_code'); ?>
					<?php endif ?>
					<div>
						<div>
							<label><strong><?php echo Kohana::lang('alerts.mobile_code'); ?></strong></label>
						</div>
						<?php print form::open('/alerts/verify'); ?>
						<label>Verification Code:</label> <?php echo form::input('alert_code', '', ' class="text"') ?>
						<label>Mobile Phone:</label> <?php echo form::input('alert_mobile', $alert_mobile, ' class="text"')?>
						<br />
						<?php print form::submit('button', 'Confirm My Alert Request', ' class="btn btn-success"'); ?>
						<?php print form::close();?>
					</div>
				</div>
				</fieldset>
			</div>
			<!-- / Mobile Alert -->
			<?php endif; ?>
			
			<!-- Email Alert -->
			<div class="well">
				<fieldset>
					<legend>Email Alerts</legend>
				<?php if ($alert_email): ?>
					<div class="alert alert-success"> <?php echo Kohana::lang('alerts.email_ok_head') ?></div>
				<?php endif ?>
				
				<div>
					<?php if ($alert_email) : ?>
					<div class="alert alert-info"> 
						<?php echo Kohana::lang('alerts.email_alert_request_created') ?>
						<u><strong> <?php echo  $alert_email ?></strong></u>
							<?php echo Kohana::lang('alerts.verify_code') ?>
						</div>
					<?php endif ?>

					<div >
						<label><strong><?php echo Kohana::lang('alerts.email_code'); ?></strong></label>
						<?php print form::open('/alerts/verify'); ?>
						<label>Verification Code:</label> <?php echo form::input('alert_code', '', ' class="text"') ?>
						<label>Email Address:</label> <?php echo form::input('alert_email', $alert_email, ' class="text"')?>
						<br />
						<?php print form::submit('button', 'Confirm My Alert Request', ' class="btn btn-success"');?>
						<?php print form::close();
						?>
					</div>
				</div>
				</fieldset>
			</div>
			<!-- / Email Alert -->
			
			
			
		</div>
		<!-- end block -->
	</div>
</div>
