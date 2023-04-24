<?php

require_once 'mobileDashboard.php';
$mobileDashboard = new MobileDashboard();
global $current_user;
include_once('modules/ACLRoles/ACLRole.php');
$aclRole = new ACLRole();
$roles = $aclRole->getUserRoleNames($current_user->id);

$tracker = BeanFactory::getBean('Trackers');
$history = $tracker->get_recently_viewed($current_user->id);
$recentRecords = $this->processRecentRecords($history);
// echo "<pre>"; print_r($recentRecords); die;
$dashletsArray = [];
if (in_array('Bostel Clients', $roles)) {
} else {
    // $dashletsArray = $mobileDashboard->getDashBoardData();
}
?>


<div class="man" style="min-height: 370px;">
    <?php foreach ($dashletsArray as $key => $value) {
        if ($value['module'] != 'SugarFeed') {    ?>

            <div class="accordian-block">
                <div class="listbtn">
                    <?php echo $value['title']; ?>
                    <div class="ac-title" data-in="#<?php echo $key; ?>">
                        <div class="suitepicon suitepicon-action-below"></div>

                    </div>
                    <!-- <span class="rigth_icon"><i class="fa fa-cog" aria-hidden="true"></i></span> -->
                </div>
                <div class="accordian-para acc-show" id="<?php echo $key; ?>">
                    <ul class="boxs">
                        <?php if ($value['module'] != 'tac_inbound_message') { ?>
                            <a href="index.php?module=<?php echo $value['module'] ?>&action=EditView">
                                <li>
                                    <i class="suitepicon suitepicon-action-add" aria-hidden="true"></i>
                                    <p>Add new</p>
                                </li>
                            </a>
                        <?php } ?>
                        <a href="index.php?module=<?php echo $value['module'] ?>&action=index">
                            <li>
                                <i class="suitepicon suitepicon-action-list-maps" aria-hidden="true"></i>
                                <p>View list</p>
                            </li>
                        </a>
                        <div class="cls"></div>
                    </ul>
                </div>
            </div>
    <?php }
    } ?>
    <!-- <div class="accordian-block">
        <div onclick="javascript:void(window.location.href = 'index.php?module=Home&action=mobile')" class="listbtn"> Home</div>
    </div> -->

    <!-- Recently Viewed Items -->
    <div id="recentlyViewedHome" class="recentlyViewedHome">

        <h2 class="recent_h3"><?php echo $app_strings['RECENTLY_VIEWED']; ?></h2>
        <?php if (!(is_array($recentRecords)) || !(count($recentRecords) > 0)) { ?>
            <h4 class="recent_h3"><?php echo $app_strings['NO_RECENTLY_VIEWED']; ?></h4>
        <?php } else { ?>
            <div class="ul-div">
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach ($recentRecords as $key => $item) {
                        if ($key > 9) {
                            break;
                        }
                        if ($item['module_name'] != 'Emails' && $item['module_name'] != 'InboundEmail' && $item['module_name'] != 'EmailAddresses') { ?>
                            <!--Check to ensure that recently viewed emails or email addresses are not displayed in the recently viewed panel.-->
                            <div class="recently_viewed_link_container_sidebar">
                                <li class="recentlinks" role="presentation">
                                    <a title="<?php echo $item['module_name'] ?>" accessKey="<?php echo $key ?>" href="index.php?module=<?php echo $item['module_name'] ?>&action=DetailView&record=<?php echo $item['item_id'] ?>" class="recent-links-detail">
                                        <?php $icon = str_replace('_', '-', (strtolower($item['module_name']) == 'employees' ? 'users' : strtolower($item['module_name'])))?>
                                        <span class="suitepicon suitepicon-module-<?php echo $icon ?>"></span>
                                        <span class="item-summary"><?php echo $item['item_summary'] ?></span>
                                    </a>
                                    <a href="index.php?module=<?php echo $item['module_name'] ?>&action=EditView&record=<?php echo $item['item_id'] ?>" class="recent-links-edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                </li>
                            </div>
                    <?php }
                    } ?>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function reset_acc() {
        $('.ac-title').removeClass('acc-active');
        $('.accordian-para').slideUp();
        $('.suitepicon-action-below').removeClass('cross-icon');
    }
    $('.ac-title').click(function(e) {
        e.preventDefault();
        if ($(this).hasClass('acc-active')) {
            reset_acc();
        } else {
            reset_acc();
            var getID = $(this).attr('data-in');
            $(getID).slideDown();
            $(this).addClass('acc-active');
            $(this).find('.suitepicon-action-below').addClass('cross-icon');
        }
    });
</script>