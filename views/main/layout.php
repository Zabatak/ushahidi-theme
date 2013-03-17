<!-- main body -->

<div class="row" style="position: relative">
	<div class="span12">
		<?php if ($site_message != ''): ?>
		<div class="alert alert-success">
			<?php echo $site_message; ?>
		</div>
		<?php endif; ?>

	<div style="height:0px">

		<!-- categories -->
		<div class="btn-group " id="category-btn">
			<a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
				<?php echo Kohana::lang('ui_main.filter_reports_by'); ?>
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" id="category_switch" >

				<?php
				// Action::main_sidebar_pre_filters - Add Items to the Entry Page before filters
				Event::run('ushahidi_action.main_sidebar_pre_filters');
				?>
				<?php
				$color_css = 'class="swatch" style="background-color:#'.$default_map_all.'"';
				$all_cat_image = '';
				if ($default_map_all_icon != NULL)
				{
					$all_cat_image = html::image(array(
						'src'=>$default_map_all_icon,
						'style'=>'float:left;padding-right:5px;'
						));
					$color_css = '';
				}
				?>
				<li>
					<a class="active" id="cat_0" href="#">
						<span <?php echo $color_css; ?>><?php echo $all_cat_image; ?></span>
						<span class="category-title"><?php echo Kohana::lang('ui_main.all_categories');?></span>
					</a>
				</li>
				<?php
				foreach ($categories as $category => $category_info):
				
					$category_title = htmlentities($category_info[0], ENT_QUOTES, "UTF-8");
					$category_color = $category_info[1];
					$category_image = ($category_info[2] != NULL)
					? url::convert_uploaded_to_abs($category_info[2])
					: NULL;
					$category_description = htmlentities(Category_Lang_Model::category_description($category), ENT_QUOTES, "UTF-8");

					$color_css = 'class="swatch" style="background-color:#'.$category_color.'"';
					if ($category_info[2] != NULL)
					{
						$category_image = html::image(array(
							'src'=>$category_image,
							'style'=>'float:left;padding-right:5px;'
							));
						$color_css = '';
					}
                                        $hasSubMenu = sizeof($category_info[3]) != 0;
                                        ?>
                                    <li class="<?=$hasSubMenu?'dropdown-submenu':''?>">
					<a href="#" id="cat_<?=$category?>" title="<?=$category_description?>">
                                		<span <?=$color_css?>><?=$category_image?></span>
                                        	<span class="category-title"><?=$category_title?></span>
					</a>
                                        <?php if ($hasSubMenu): ?>
                                        <ul class="dropdown-menu">
                                                 <?php    
						foreach ($category_info[3] as $child => $child_info):
						
							$child_title = htmlentities($child_info[0], ENT_QUOTES, "UTF-8");
							$child_color = $child_info[1];
							$child_image = ($child_info[2] != NULL)
							? url::convert_uploaded_to_abs($child_info[2])
							: NULL;
							$child_description = htmlentities(Category_Lang_Model::category_description($child), ENT_QUOTES, "UTF-8");

							$color_css = 'class="swatch" style="background-color:#'.$child_color.'"';
							if ($child_info[2] != NULL)
							{
								$child_image = html::image(array(
									'src' => $child_image,
									'style' => 'float:left;padding-right:5px;'
									));

								$color_css = '';
							}
                                                        ?>
							<li>
							<a href="#" id="cat_ <?= $child ?>" title="<?=$child_description?>">
							<span <?=$color_css?>><?=$child_image?></span>
							<span class="category-title"><?=$child_title?></span>
							</a>
							</li>
						<?php endforeach; ?>
                                                
						</ul>
                                                <?php endif ?>
                                    </li>
				<?php endforeach; ?>

			</ul>
		</div>
		<!--/ categories -->


		<!-- additional content -->
		<?php if (Kohana::config('settings.allow_reports')): ?>
		<div class="btn-group" id="howtoreport-btn">
			<a class="btn dropdown-toggle btn btn-warning" data-toggle="dropdown" href="#">
				<?php echo Kohana::lang('ui_main.how_to_report'); ?>
				<span class="caret"></span>
			</a>
			<ul class="additional-content dropdown-menu" >

				<!-- Phone -->
			<?php if ( ! empty($phone_array)): ?>
				<li class="disabled"><a><?php echo Kohana::lang('ui_main.report_option_1'); ?></a></li>
				<?php foreach ($phone_array as $phone): ?>
					<li><?php echo $phone; ?></li>
				<?php endforeach; ?>
				<li class="divider"></li>
			<?php endif; ?>

			<!-- External Apps -->
			<?php if (count($external_apps) > 0): ?>
				<li class="disabled"> 
					<a><?php echo Kohana::lang('ui_main.report_option_external_apps'); ?>:</a>
				</li>
				<?php foreach ($external_apps as $app): ?>
					<li><a href="<?php echo $app->url; ?>"><?php echo $app->name; ?></a></li>
				<?php endforeach; ?>
				<li class="divider"></li>
			<?php endif; ?>

				<!-- Email -->
				<?php if ( ! empty($report_email)): ?>
					<li class="disabled"><a><?php echo Kohana::lang('ui_main.report_option_2'); ?>:</a></li>
                                        <li><a href="mailto:<?php echo $report_email?>"><?php echo $report_email?></a></li>
				<li class="divider"></li>
				<?php endif; ?>

				<!-- Twitter -->
				<?php if ( ! empty($twitter_hashtag_array)): ?>
					<li class="disabled"><a><?php echo Kohana::lang('ui_main.report_option_3'); ?>:</a>
						<?php foreach ($twitter_hashtag_array as $twitter_hashtag): ?>
						<li>#<?php echo $twitter_hashtag; ?></li>
						<?php if ($twitter_hashtag != end($twitter_hashtag_array)): ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<li class="divider"></li>
				<?php endif; ?>

				<!-- Web Form -->
				<li>
					<a href="<?php echo url::site().'reports/submit/'; ?>">
						<?php echo Kohana::lang('ui_main.report_option_4'); ?>
					</a>
				</li>

			</ul>
		</div>

		<!-- Checkins -->
			<?php if (Kohana::config('settings.checkins')): ?>
			<br/>
			<div class="additional-content">
				<h5><?php echo Kohana::lang('ui_admin.checkins'); ?></h5>
				<div id="cilist"></div>
			</div>
			<?php endif; ?>
			<!-- /Checkins -->
			
			<?php
			// Action::main_sidebar - Add Items to the Entry Page Sidebar
			Event::run('ushahidi_action.main_sidebar');
			?>

<!-- filters -->
<div class="filters clearfix">
	<div>
		<!--strong><?php echo Kohana::lang('ui_main.filters'); ?></strong-->
		<div class="btn-group btn-group-vertical">
			<a id="media_0" class=" btn active  href="#" title="<?php echo Kohana::lang('ui_main.all'); ?>"><i class="icon-asterisk"></i></a>
			<a id="media_4" href="#" class="btn" title="<?php echo Kohana::lang('ui_main.news'); ?>"><i class="icon-bullhorn"></i></a>
			<a id="media_1" href="#" class="btn" title="<?php echo Kohana::lang('ui_main.pictures'); ?>"><i class="icon-picture"></i></a>
			<a id="media_2" href="#" class="btn" title="<?php echo Kohana::lang('ui_main.video'); ?>"><i class="icon-film"></i></a>
		</div>
            
	</div>


	<?php
					// Action::main_filters - Add items to the main_filters
	Event::run('ushahidi_action.map_main_filters');
	?>
</div>
<!-- / filters -->

<div class="btn-group btn-group-vertical" id="resize-map">
                <a id="bigmap" class=" btn  href="#" title="big map"><i class="icon-resize-full"></i></a>
                <a id="smallmap" class=" btn active  href="#" title="small map"><i class="icon-resize-small"></i></a>
            </div>

	</div>

<!-- / additional content -->



<?php endif; ?>
<div id="content">
<?php
		// Map and Timeline Blocks
echo $div_map;
		
?>
<div style="display:none"><?php echo $div_timeline; ?></div>
</div>
</div>
</div>



<!-- content -->
<div class="content-container well">

	<!-- content blocks -->
	<div class="content-blocks clearingfix">
		<ul class="content-column">
			<?php blocks::render(); ?>
		</ul>
	</div>
	<!-- /content blocks -->

</div>
<!-- content -->

