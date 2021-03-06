<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo html::specialchars($page_title.$site_name); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">



  <?php if (!Kohana::config('settings.enable_timeline')) { ?>
  <style type="text/css">
  #graph{display:none;}
  #map{height:480px;}
  </style>
  <?php } ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php echo $header_block; ?>
  <?php
// Action::header_scripts - Additional Inline Scripts from Plugins
  Event::run('ushahidi_action.header_scripts');
  ?>


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->


</head>



<?php
// Add a class to the body tag according to the page URI

// we're on the home page
if (count($uri_segments) == 0)
{
  $body_class = "page-main";
}
// 1st tier pages
elseif (count($uri_segments) == 1)
{
  $body_class = "page-".$uri_segments[0];
}
// 2nd tier pages... ie "/reports/submit"
elseif (count($uri_segments) >= 2)
{
  $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
}
?>

<body id="page" class="<?php echo $body_class; ?>">

  <?php echo $header_nav; ?>

<div id="container" class="container">
  <div id="header">
    <div class="row">
      <div class="span6">

        <!-- logo -->
        <?php if ($banner == NULL): ?>
        <div id="logo">
          <h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
          <span><?php echo $site_tagline; ?></span>
        </div>
      <?php else: ?>
      <a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
    <?php endif; ?>
    <!-- / logo -->
  </div>
  <div class="span6">
    <div class="row">
      <div class="span3">
        <!-- languages -->
        <?php echo $languages;?>
        <!-- / languages -->
      </div>

        <!-- searchform -->
        <?php //echo $search; ?>
        <div class="span3">
            <!-- search form -->
            <?php echo form::open("search", array('method' => 'get', 'id' => 'search', 'class'=>'')) ?>

            <div class="input-append">
              <input type="text" name="k" value="" class="span2" placeholder="<?php echo Kohana::lang('ui_main.search')?>"/>
              <input class="btn" type="submit" value="<?php echo Kohana::lang('ui_main.search')?>"/>
            </div>
            <?php echo form::close(); ?>
            <!--/ search form -->
          </div>
      </div>

      <div class="row">
        <div class="span6">
        <!-- submit incident -->
        <?php echo $submit_btn; ?>
        <!-- / submit incident -->
        </div>
      </div>

    </div>
  </div>
</div>
<!--/ containter -->




<!-- / header -->
<!-- / header item for plugins -->
<?php
// Action::header_item - Additional items to be added by plugins
Event::run('ushahidi_action.header_item');
?>

<!-- mainmenu -->
<div class="navbar" >
  <div class="navbar-inner">
    <div class="container" style="width: auto; padding: 0 20px;">

      <ul class="nav">
        <?php nav::main_tabs($this_page); ?>
        <?php if ($allow_feed == 1) { ?>
        <li> <a href="<?php echo url::site(); ?>feed/"><img alt="<?php echo htmlentities(Kohana::lang('ui_main.rss'), ENT_QUOTES); ?>" src="<?php echo url::file_loc('img'); ?>media/img/icon-feed.png"  /></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</div>

<!--/ mainmenu -->

<!-- main body -->


