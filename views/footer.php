			
		<!-- / main body -->

	

<!-- footer -->
<div id="footer">
	<div id="underfooter"></div>
 		<!-- footer credits -->
		<div class="footer-credits">
			Powered by the &nbsp;
			<a href="http://www.ushahidi.com/">
				<img id="ushahidi-logo" src="http://ushahidi.com/assets/images/ushahidi-logo_smaller.png" alt="Ushahidi" style="vertical-align:middle" />
			</a>
			&nbsp; Platform
		</div>
		<!-- / footer credits -->

		<!-- footer menu -->
		<div class="footermenu">
			<ul class="clearingfix">
				<li>
					<a class="item1" href="<?php echo url::site(); ?>">
						<?php echo Kohana::lang('ui_main.home'); ?>
					</a>
				</li>

				<?php if (Kohana::config('settings.allow_reports')): ?>
				<li>
					<a href="<?php echo url::site()."reports/submit"; ?>">
						<?php echo Kohana::lang('ui_main.submit'); ?>
					</a>
				</li>
				<?php endif; ?>
				
				<?php if (Kohana::config('settings.allow_alerts')): ?>
					<li>
						<a href="<?php echo url::site()."alerts"; ?>">
							<?php echo Kohana::lang('ui_main.alerts'); ?></a>
					</li>
				<?php endif; ?>

				<?php if (Kohana::config('settings.site_contact_page')): ?>
				<li>
					<a href="<?php echo url::site()."contact"; ?>">
						<?php echo Kohana::lang('ui_main.contact'); ?>
					</a>
				</li>
				<?php endif; ?>

				<?php
				// Action::nav_main_bottom - Add items to the bottom links
				Event::run('ushahidi_action.nav_main_bottom');
				?>
			</ul>

			<?php if ($site_copyright_statement != ''): ?>
      		<p><?php echo $site_copyright_statement; ?></p>
	      	<?php endif; ?>
	      	
		<!-- / footer menu -->
 	</div>
 </div>


	
	<!-- / footer -->

	<?php
	echo $footer_block;
	// Action::main_footer - Add items before the </body> tag
	Event::run('ushahidi_action.main_footer');
	?>
</body>
</html>
