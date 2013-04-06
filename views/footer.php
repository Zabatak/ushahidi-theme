			
<!-- / main body -->


<hr  class="header"/>

<!-- footer -->
<div id="footer">

    <div class="row">
        <!-- footer credits -->
        <div class="footer-credits span4">
            <p>
            Powered by the &nbsp;
            <a href="http://www.ushahidi.com/" target="_blank">
                <img id="ushahidi-logo" src="http://ushahidi.com/assets/images/ushahidi-logo_smaller.png" alt="Ushahidi" style="vertical-align:middle" />
            </a>
            &nbsp; Platform
            </p>
            <p>
                <a href="http://arabhosters.com" target="_blank">
                <img id=""  src="http://zabatak.com/media/img/zabatak/arabhostes.gif" alt="Arab Hosters" style="vertical-align:middle" />
            </a>
             Hosted and Secured by &nbsp;
            
            &nbsp; 
            </p>
        </div>
        
        
       
       
        <!-- / footer credits -->


        <div class="span6">
            <div>

                <a href="http://youthaward.org" target="_blank"><img src="http://zabatak.com/media/img/zabatak/wsya2011.gif" width="70"  alt="WYSA 2011 Award for Zabatak.com"/></a>
                <a href="http://www.africanleadershipacademy.org/news/anzisha-prize-finalists-announced"><img src="http://zabatak.com/media/img/zabatak/anzisha.gif"   alt="Anzisha Finalist 2011"/><a/>
                    <a href="http://tahrir2.com" target="_blank"><img src="http://zabatak.com/media/img/zabatak/tahrir2.gif" width="70"  alt="Tahrir2"/></a>

            </div>


        </div>

        <!-- footer menu -->
        <div class=" span2">
            <ul class="unstyled">
                <li>
                    <a class="item1" href="<?php echo url::site(); ?>">
                        <?php echo Kohana::lang('ui_main.home'); ?>
                    </a>
                </li>

                <?php if (Kohana::config('settings.allow_reports')): ?>
                    <li>
                        <a href="<?php echo url::site() . "reports/submit"; ?>">
                            <?php echo Kohana::lang('ui_main.submit'); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (Kohana::config('settings.allow_alerts')): ?>
                    <li>
                        <a href="<?php echo url::site() . "alerts"; ?>">
                            <?php echo Kohana::lang('ui_main.alerts'); ?></a>
                    </li>
                <?php endif; ?>

                <?php if (Kohana::config('settings.site_contact_page')): ?>
                    <li>
                        <a href="<?php echo url::site() . "contact"; ?>">
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



</div>
<!-- / footer -->

<?php
echo $footer_block;
// Action::main_footer - Add items before the </body> tag
Event::run('ushahidi_action.main_footer');
?>
</body>
</html>
