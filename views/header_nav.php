<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo url::site();?>"><?php echo $site_name; ?></a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <?php
				// Action::header_nav - Add items to header nav area
          Event::run('ushahidi_action.header_nav');
          ?>
        </ul>
        <?php Event::run('ushahidi_action.header_nav_bar'); ?>
        <ul class="nav pull-right">
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php if($loggedin_user != FALSE) : ?>
              <?php echo htmlentities($loggedin_user->username, ENT_QUOTES, "UTF-8"); ?>
              <img alt="<?php echo htmlentities($loggedin_user->username, ENT_QUOTES, "UTF-8"); ?>" src="<?php echo htmlentities(members::gravatar($loggedin_user->email, 20), ENT_QUOTES); ?>" width="20" />
            <?php else: ?>
            <?php echo Kohana::lang('ui_main.login'); ?>
          <?php endif ?>

          <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <!-- dropdown menu -->
            <?php if($loggedin_user != FALSE) : ?>
            <?php if($loggedin_role != "") :?>
            <li>
             <a href="<?php echo url::site().$loggedin_role;?>/profile">
              <?php echo Kohana::lang('ui_main.manage_your_account'); ?>
            </a>
          </li>
          <li>
           <a href="<?php echo url::site().$loggedin_role;?>">
            <?php echo Kohana::lang('ui_main.your_dashboard'); ?>
          </a>
        </li>
      <?php endif ?>
      <li>
       <a href="<?php echo url::site();?>profile/user/<?php echo $loggedin_user->username; ?>">
        <?php echo Kohana::lang('ui_main.view_public_profile'); ?>
      </a>
    </li>
    <li class="divider"></li>
    <li>
     <a href="<?php echo url::site();?>logout">
      <em><?php echo Kohana::lang('ui_admin.logout');?></em>
    </a>
  </li>
<?php else: ?>

  <!-- login form -->
  <li>
    <fieldset class="dropdown-login-form">
      <?php echo form::open('login/', array('id' => 'userpass_form')); ?>
      <input type="hidden" name="action" value="signin" />

      <input type="text" name="username" placeholder="<?php echo Kohana::lang('ui_main.email');?>" id="username" />
      <input name="password" type="password"  placeholder="<?php echo Kohana::lang('ui_main.password');?>" id="password"  />
      <input type="submit" name="submit" class="btn" value="<?php echo Kohana::lang('ui_main.login'); ?>" />
    </fieldset>
  </li>
  <?php echo form::close(); ?>

  <li class="divider"></li>
  <li><a href="<?php echo url::site()."login/?newaccount";?>"><?php echo Kohana::lang('ui_main.login_signup_click'); ?></a></li>
  <li><a href="<?php echo url::site()."login/?forgot";?>" id="header_nav_forgot" ><?php echo Kohana::lang('ui_main.forgot_password');?></a></li>


  <!-- /login form -->

<?php endif ?>
<!--/ dropdown menu -->
</ul>


</li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>
</div>