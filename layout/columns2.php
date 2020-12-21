<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A two column layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
user_preference_allow_ajax_update('sidepre-open', PARAM_ALPHA);

require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
    $headernavopen = true;
    $draweropenright = (get_user_preferences('sidepre-open', 'true') == 'true');
} else {
    $headernavopen = false;
    $navdraweropen = false;
    $draweropenright = false;
}


$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}
$sitename = format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]);
if ($PAGE->course->id > 1){
    $extraclasses[] = 'has-drawer';
    $sname = array('1' => $SITE->shortname, '2' => $PAGE->category->name, '3' => $PAGE->course->shortname);
    if($PAGE->theme->settings->sitetitle){

        $sitename = format_string($sname[$PAGE->theme->settings->sitetitle], true, ['context' => context_course::instance(SITEID), "escape" => false]);

    }
    

} else {
    $extraclasses[] = 'no-has-drawer';
}
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$blockshtmlheader = $OUTPUT->blocks('header');
$hasheaderblockregion = true;
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;
if ($draweropenright && $hasblocks) {
    $extraclasses[] = 'drawer-open-right';
}

$templatecontext = [
    'sitename' => $sitename,
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'draweropenright' => $draweropenright,
    'headerblocks' => $blockshtmlheader,
    'hasheaderblockregion' => $hasheaderblockregion,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'headernavopen' => true,
    'hasdrawer' =>  $PAGE->course->id >1 ? true: false,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu)
];

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();
echo $OUTPUT->render_from_template('theme_avadinte/columns2', $templatecontext);

