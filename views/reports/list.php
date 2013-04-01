<?php
/**
 * View file for updating the reports display
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team - http://www.ushahidi.com
 * @package    Ushahidi - http://source.ushahididev.com
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */
?> 
<!-- Top reportbox section-->

<div class="row report-list-bar" >
    <div class="span3">
        <ul class="nav nav-pills report-list-toggle ">
            <li class="active"><a href="#rb_list-view" class="list"><i class="icon-list"></i> <?php echo Kohana::lang('ui_main.list'); ?></a></li>
            <li><a href="#rb_map-view" class="map"><i class="icon-globe"></i> <?php echo Kohana::lang('ui_main.map'); ?></a></li>
        </ul>
    </div>
    <div class="pull-right pagination-right span5 link-toggle report-list-toggle">
        <?php echo $pagination; ?>
    </div>
</div>
<hr />


<?php //echo $stats_breadcrumb; ?>


<!-- /Top reportbox section-->

<!-- Report listing -->
<div class="r_cat_tooltip"><a href="#" class="r-3"></a></div>
<div class="rb_list-and-map-box">
    <div id="rb_list-view">
        <?php
        foreach ($incidents as $incident) {
            $incident_id = $incident->incident_id;
            $incident_title = strip_tags($incident->incident_title);
            $incident_description = strip_tags($incident->incident_description);
            $incident_url = Incident_Model::get_url($incident_id);
            //$incident_category = $incident->incident_category;
            // Trim to 150 characters without cutting words
            // XXX: Perhaps delcare 150 as constant

            $incident_description = text::limit_chars(strip_tags($incident_description), 240, "...", true);
            $incident_date = date('H:i M d, Y', strtotime($incident->incident_date));
            $incident_shortdate = date('M d, Y', strtotime($incident->incident_date));
            //$incident_time = date('H:i', strtotime($incident->incident_date));
            $location_id = $incident->location_id;
            $location_name = $incident->location_name;
            $incident_verified = $incident->incident_verified;

            if ($incident_verified) {
                $incident_verified = '<span class="r_verified">' . Kohana::lang('ui_main.verified') . '</span>';
                $incident_verified_class = "verified";
            } else {
                $incident_verified = '<span class="r_unverified">' . Kohana::lang('ui_main.unverified') . '</span>';
                $incident_verified_class = "unverified";
            }

            $comment_count = ORM::Factory('comment')->where('incident_id', $incident_id)->count_all();
            $category = ORM::Factory('category')->join('incident_category', 'category_id', 'category.id')
                    ->where('incident_id', $incident_id)
                    ->where('category_visible', 1)
                    ->find();

            $incident_thumb = url::file_loc('img') . "media/img/report-thumb-default.jpg";
            $media = ORM::Factory('media')->where('incident_id', $incident_id)->find_all();
            if ($media->count()) {
                foreach ($media as $photo) {
                    if ($photo->media_thumb) { // Get the first thumb
                        $incident_thumb = url::convert_uploaded_to_abs($photo->media_thumb);
                        break;
                    }
                }
            }
            ?>
            <?php
            echo View::factory('reports/report-summary', array(
                'incident_id' => $incident_id,
                //'incident_location' => $incident_location,
                'incident_title' => $incident_title,
                'incident_thumb' => $incident_thumb,
                'incident_date' => $incident_date,
                'comment_count' => $comment_count,
                'incident_url' => $incident_url,
                'incident_description' => $incident_description,
                'category' => $category,
                'incident_verified' => $incident->incident_verified,
                    )
            )->render();
            ?>  


        <?php } ?>
    </div>
    <div id="rb_map-view" style="display:none; width: 590px; height: 384px; border:1px solid #CCCCCC; margin: 3px auto;">
    </div>
</div>
<!-- /Report listing -->

<!-- Bottom paginator -->
<div class="row report-list-bar" >
    <div class="span2">
        <ul class="nav nav-pills report-list-toggle ">
            <li class="active"><a href="#rb_list-view" class="list"><i class="icon-list"></i> <?php echo Kohana::lang('ui_main.list'); ?></a></li>
            <li><a href="#rb_map-view" class="map"><i class="icon-globe"></i> <?php echo Kohana::lang('ui_main.map'); ?></a></li>
        </ul>
    </div>
    <div class="pull-right pagination-right span6 link-toggle report-list-toggle">
        <?php echo $pagination; ?>
    </div>

</div>
<!-- /Bottom paginator -->
