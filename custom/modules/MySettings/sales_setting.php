<?php
global $app_list_strings;
// echo "<pre>"; print_r($app_list_strings); die;
$settingModule = [
    'AOS_Product_Categories',
    'AOS_Products',
    'AOS_PDF_Templates',
    'ru_Contact_Categories',
]
?>
<div class="man" style="min-height: 300px;">
    <!-- Recently Viewed Items -->
    <div id="sales_setting" class="recentlyViewedHome">

        <h2 class="recent_h3"><?php echo $app_list_strings['moduleList']['MySettings'] ?></h2>

        <div class="ul-div">
            <ul class="nav nav-pills nav-stacked">
                <?php foreach ($settingModule as $item) { ?>
                    <div class="recently_viewed_link_container_sidebar">
                        <li class="recentlinks" role="presentation">
                            <a title="<?php echo $item ?>" accessKey href="index.php?module=<?php echo $item ?>&action=index" class="recent-links-detail">
                                <?php $icon = str_replace('_', '-', (strtolower($item) == 'employees' ? 'users' : strtolower($item))) ?>
                                <span class="suitepicon suitepicon-module-<?php echo $icon ?>"></span>
                                <span class="item-summary"><?php echo $app_list_strings['moduleList'][$item] ?></span>
                            </a>
                        </li>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>