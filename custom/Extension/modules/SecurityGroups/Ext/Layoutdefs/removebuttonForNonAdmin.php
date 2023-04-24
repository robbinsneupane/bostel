<?php
global $current_user;
if (!is_admin($current_user)) {
    unset($layout_defs['SecurityGroups']['subpanel_setup']['users']['top_buttons']);
}

