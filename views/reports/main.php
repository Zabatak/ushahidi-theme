<div class="row">
	<div class="span8" id="reports-list">
		
			<h4>
				<?php echo Kohana::lang('ui_main.showing_reports_from', array(date('M d, Y', $oldest_timestamp), date('M d, Y', $latest_timestamp))); ?> 
				<a href="#" class="btn-change-time ic-time"><?php echo Kohana::lang('ui_main.change_date_range'); ?></a>
			</h4>
			
			<div id="tooltip-box">
				<div class="tt-arrow"></div>
				<ul class="inline-links">
					<li>
						<a title="<?php echo Kohana::lang('ui_main.all_time'); ?>" class="btn-date-range active" id="dateRangeAll" href="#">
							<?php echo Kohana::lang('ui_main.all_time')?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.today'); ?>" class="btn-date-range" id="dateRangeToday" href="#">
							<?php echo Kohana::lang('ui_main.today'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_week'); ?>" class="btn-date-range" id="dateRangeWeek" href="#">
							<?php echo Kohana::lang('ui_main.this_week'); ?>
						</a>
					</li>
					<li>
						<a title="<?php echo Kohana::lang('ui_main.this_month'); ?>" class="btn-date-range" id="dateRangeMonth" href="#">
							<?php echo Kohana::lang('ui_main.this_month'); ?>
						</a>
					</li>
				</ul>
				
				<p class="labeled-divider"><span><?php echo Kohana::lang('ui_main.choose_date_range'); ?>:</span></p>
				<?php echo form::open(NULL, array('method' => 'get')); ?>
					<table>
						<tr>
							<td><strong>
								<?php echo Kohana::lang('ui_admin.from')?>:</strong><input id="report_date_from" type="text" style="width:78px" />
							</td>
							<td>
								<strong><?php echo ucfirst(strtolower(Kohana::lang('ui_admin.to'))); ?>:</strong>
								<input id="report_date_to" type="text" style="width:78px" />
							</td>
							<td valign="bottom">
								<a href="#" id="applyDateFilter" class="filter-button" style="position:static;"><?php echo Kohana::lang('ui_main.go')?></a>
							</td>
						</tr>
					</table>
				<?php echo form::close(); ?>
			</div>
		<div style="display:none">
				<?php
					// Filter::report_stats - The block that contains reports list statistics
					Event::run('ushahidi_filter.report_stats', $report_stats);
					echo $report_stats;
				?>
			</div>
			<!-- reports-box -->
				<div id="reports-box">
					<?php echo $report_listing_view; ?>
				</div>
				<!-- end #reports-box -->
	</div>
	<div class="span4" id="filters">
		<h5><?php echo Kohana::lang('ui_main.filter_reports_by'); ?></h5>
		<div class="accordion" id="accordion2">
			<div class="accordion-group">
				<div class="accordion-heading">
					<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'fl-categories');"><i class="icon-remove-circle "></i></a>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#f-category-box">
						<?php echo Kohana::lang('ui_main.category')?>
					</a>
				</div>
				<div id="f-category-box" class="accordion-body collapse in">
					<div class="accordion-inner">
						<ul class="filter-list fl-categories" id="category-filter-list">
							<li>
								<a href="#"><?php
								$all_cat_image = '&nbsp';
								$all_cat_image = '';
								if($default_map_all_icon != NULL) {
									$all_cat_image = html::image(array('src'=>$default_map_all_icon));
								}
								?>
								<span class="item-swatch" style="background-color: #<?php echo Kohana::config('settings.default_map_all'); ?>"><?php echo $all_cat_image ?></span>
								<span class="item-title"><?php echo Kohana::lang('ui_main.all_categories'); ?></span>
								<span class="item-count" id="all_report_count"><?php echo $report_stats->total_reports; ?></span>
							</a>
						</li>
						<?php echo $category_tree_view; ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="accordion-group">
			<div class="accordion-heading">
				<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'f-location-box');"><i class="icon-remove-circle "></i></a>
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#f-location-box">
					<?php echo Kohana::lang('ui_main.location'); ?>
				</a>
			</div>
			<div id="f-location-box" class="accordion-body collapse">
				<div class="accordion-inner f-location-box">
					<?php echo $alert_radius_view; ?>
				</div>
			</div>
		</div>


		<div class="accordion-group">
			<div class="accordion-heading">
				<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'fl-incident-mode');"><i class="icon-remove-circle "></i></a>
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#f-type-box">
					<?php echo Kohana::lang('ui_main.type')?>
				</a>
			</div>
			<div id="f-type-box" class="accordion-body collapse">
				<div class="accordion-inner f-type-box">
					<ul class="filter-list fl-incident-mode">
						<li>
							<a href="#" id="filter_link_mode_1">
								<span class="item-icon ic-webform">&nbsp;</span>
								<span class="item-title"><?php echo Kohana::lang('ui_main.web_form'); ?></span>
							</a>
						</li>

						<?php foreach ($services as $id => $name): ?>
						<?php
						$item_class = "";
						if ($id == 1) $item_class = "ic-sms";
						if ($id == 2) $item_class = "ic-email";
						if ($id == 3) $item_class = "ic-twitter";
						?>
						<li>
							<a href="#" id="filter_link_mode_<?php echo ($id + 1); ?>">
								<span class="item-icon <?php echo $item_class; ?>">&nbsp;</span>
								<span class="item-title"><?php echo $name; ?></span>
							</a>
						</li>
					<?php endforeach; ?>

				</ul>
			</div>
		</div>
	</div>

	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'fl-media');"><i class="icon-remove-circle "></i></a>
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#f-media-box">
				<?php echo Kohana::lang('ui_main.media');?>
			</a>
		</div>
		<div id="f-media-box" class="accordion-body collapse">
			<div class="accordion-inner f-media-box">
				<p><?php echo Kohana::lang('ui_main.filter_reports_contain'); ?>&hellip;</p>
				<ul class="filter-list fl-media">
					<li>
						<a href="#" id="filter_link_media_1">
							<span class="item-icon ic-photos">&nbsp;</span>
							<span class="item-title"><?php echo Kohana::lang('ui_main.photos'); ?></span>
						</a>
					</li>
					<li>
						<a href="#" id="filter_link_media_2">
							<span class="item-icon ic-videos">&nbsp;</span>
							<span class="item-title"><?php echo Kohana::lang('ui_main.video'); ?></span>
						</a>
					</li>
					<li>
						<a href="#" id="filter_link_media_4">
							<span class="item-icon ic-news">&nbsp;</span>
							<span class="item-title"><?php echo Kohana::lang('ui_main.reports_news')?></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'fl-verification');"><i class="icon-remove-circle "></i></a>
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#f-verification-box">
				<?php echo Kohana::lang('ui_main.verification'); ?>
			</a>
		</div>
		<div id="f-verification-box" class="accordion-body collapse">
			<div class="accordion-inner f-verification-box">
				<ul class="filter-list fl-verification">
					<li>
						<a href="#" id="filter_link_verification_1">
							<span class="item-icon ic-verified">&nbsp;</span>
							<span class="item-title"><?php echo Kohana::lang('ui_main.verified'); ?></span>
						</a>
					</li>
					<li>
						<a href="#" id="filter_link_verification_0">
							<span class="item-icon ic-unverified">&nbsp;</span>
							<span class="item-title"><?php echo Kohana::lang('ui_main.unverified'); ?></span>
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>


	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#" title="<?php echo Kohana::lang('ui_main.clear')?>" class="pull-right accordion-toggle mtooltip f-clear reset" onclick="removeParameterKey('c', 'filter-controls1');"><i class="icon-remove-circle "></i></a>
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#filter-controls1">
				<?php echo Kohana::lang('ui_main.custom_fields'); ?>
			</a>
		</div>
		<div id="filter-controls1" class="accordion-body collapse">
			<div class="accordion-inner filter-controls">
				<?php echo $custom_forms_filter; ?>
			</div>
		</div>
	</div>

</div>
<div >
	<p>
		<a href="#" class="small-link-button btn btn-warning btn-small " id="reset_all_filters"><i class="icon-remove-circle icon-white"></i> <?php echo Kohana::lang('ui_main.reset_all_filters'); ?></a> 
		<a href="#" id="applyFilters" class="btn btn-primary btn-small pull-right"><i class="icon-filter icon-white"></i> <?php echo Kohana::lang('ui_main.filter_reports'); ?></a>
	</p>
</div> 

</div>
</div>