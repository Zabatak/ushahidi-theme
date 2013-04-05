<div class="row-fluid report-summary">
    <div class="span9 report-summary-main">
        <a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>" class="fonty report-title"> 
            <?php echo html::specialchars($incident_title) ?>
        </a>
        <div>
            <?php echo $incident_description ?>
        </div>
    </div>
    <div class="span3 report-summary-extra">
        <a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>">
            <img  class="img-polaroid" alt="<?php echo htmlentities($incident_title, ENT_QUOTES); ?>" src="<?php echo $incident_thumb; ?>" style="max-width:89px;max-height:59px;" />
        </a>
        <ul class="report-summary-icons inline">
            <li> <i class="icon-calendar mtooltip"  data-placement="bottom" title="<?php echo $incident_date; ?>"></i> </li>
            <li> <i class="icon-comment mtooltip" data-placement="bottom" title="<?php echo $comment_count; ?> <?php echo Kohana::lang('ui_main.comments'); ?> "></i> </li>
            <li><i class="icon-tags mtooltip"  data-placement="bottom" title="<?php echo $category->category_title; ?> <?php echo Kohana::lang('ui_main.category'); ?> "></i> </li>
            <?php if ($incident_verified): ?>
                <li><i class="icon-ok mtooltip" data-placement="bottom" title="<?php echo Kohana::lang('ui_main.verified'); ?> "></i> </li>
                <?php endif ?>
        </ul>

    </div>
</div>

