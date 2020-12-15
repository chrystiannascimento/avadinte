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
* Heading and course images settings page file.
*
* @packagetheme_fordson
* @copyright  2016 Chris Kenniburg
* @creditstheme_fordson - MoodleHQ
* @licensehttp://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/

defined('MOODLE_INTERNAL') || die();

$page = new admin_settingpage('theme_avadinte_banner', get_string('bannersettings', 'theme_avadinte'));
// Content Info
$name = 'theme_avadinte/textcontentinfo';
$heading = get_string('textcontentinfo', 'theme_avadinte');
$information = get_string('textcontentinfodesc', 'theme_avadinte');
$setting = new admin_setting_heading($name, $heading, $information);
$page->add($setting);


// Show hide user enrollment toggle.
$name = 'theme_avadinte/bannerenable';
$title = get_string('bannerenable', 'theme_avadinte');
$description = get_string('bannerenable_desc', 'theme_avadinte');
$default = 0;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default);
$page->add($setting);

// Banner title
$name = 'theme_avadinte/bannertitle';
$title = get_string('bannertitle', 'theme_avadinte');
$description = get_string('bannertitle_desc', 'theme_avadinte');
$default = 'Aviso';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$page->add($setting);
$settings->hide_if('theme_avadinte/bannertitle',
        'theme_avadinte/bannerenable', 'notchecked');

//Banner content
// Perpetual information banner content.
$name = 'theme_avadinte/bannercontent';
$title = get_string('bannercontent', 'theme_avadinte');
$description = get_string('bannercontent_desc', 'theme_avadinte');
$setting = new admin_setting_confightmleditor($name, $title, $description, '');
$page->add($setting);
$settings->hide_if('theme_avadinte/bannercontent',
        'theme_avadinte/bannerenable', 'notchecked');

// Select pages on which the perpetual information banner should be shown.
/*
$name = 'theme_avadinte/bannershowonpages';
$title = get_string('bannershowonpages', 'theme_avadinte', null, true);
$description = get_string('bannershowonpages_desc', 'theme_avadinte', null, true);
$bannershowonpagesoptions = [
        // Don't use string lazy loading (= false) because the string will be directly used and would produce a
        // PHP warning otherwise.
        'mydashboard' => get_string('myhome', 'core', null, false),
        'course' => get_string('course', 'core', null, false),
];
$setting = new admin_setting_configmultiselect($name, $title, $description,
        array($bannershowonpagesoptions['mydashboard']), $bannershowonpagesoptions);
$page->add($setting);
$settings->hide_if('theme_avadinte/bannershowonpages',
        'theme_avadinte/bannerenable', 'notchecked');
*/

// Perpetual information banner dismissible.
$name = 'theme_avadinte/bannerdismiss';
$title = get_string('bannerdismiss', 'theme_avadinte', null, true);
$description = get_string('bannerdismiss_desc', 'theme_avadinte', null, true);
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
$settings->hide_if('theme_avadinte/bannerdismiss',
        'theme_avadinte/bannerenable', 'notchecked');

// Perpetual information banner show confirmation dialogue when dismissing.
$name = 'theme_avadinte/bannerconfirm';
$title = get_string('bannerconfirm', 'theme_avadinte', null, true);
$description = get_string('bannerconfirm_desc', 'theme_avadinte', null, true);
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$page->add($setting);
$settings->hide_if('theme_avadinte/bannerconfirm',
        'theme_avadinte/bannerenable', 'notchecked');
$settings->hide_if('theme_avadinte/bannerconfirm',
        'theme_avadinte/bannerdismiss', 'notchecked');

 // Reset the user preference for all users.
 $name = 'theme_avadinte/bannerresetvisibility';
 $title = get_string('bannerresetvisibility', 'theme_avadinte', null, true);
 $description = get_string('bannerresetvisibility_desc', 'theme_avadinte', null, true);
 $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
 $setting->set_updatedcallback('theme_avadinte_infobanner_reset_visibility');
 $page->add($setting);
 $settings->hide_if('theme_avadinte/bannerresetvisibility',
         'theme_avadinte/bannerenable', 'notchecked');
 $settings->hide_if('theme_avadinte/bannerresetvisibility',
         'theme_avadinte/bannerdismiss', 'notchecked');

 
// Must add the page after definiting all the settings!
$settings->add($page);
