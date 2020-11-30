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
 * avadinte backgrounds callbacks.
 *
 * @package    theme_avadintes
 * @copyright  2016 Damyon Wiese
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_avadinte_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them. 
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');

    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_avadinte', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_avadinte and not theme_boost (see the line above).
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }

    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.
    $pre = file_get_contents($CFG->dirroot . '/theme/avadinte/scss/pre.scss');
    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.
    $post = file_get_contents($CFG->dirroot . '/theme/avadinte/scss/post.scss');

    // avadinte scss.
    $avadintevariables = file_get_contents($CFG->dirroot . '/theme/avadinte/scss/avadinte/_variables.scss');
    $avadinte = file_get_contents($CFG->dirroot . '/theme/avadinte/scss/avadinte.scss');
     // Combine them together.
     //return $pre .   "\n" . $avadintevariables . "\n" . $scss . "\n" . $avadinte  . "\n" . $post;


    // Combine them together.
    return $pre . "\n" . $avadintevariables . "\n" .  $scss . "\n" . $avadinte  . "\n" . $post;
}
 
function theme_avadinte_get_pre_scss($theme) {
    global $CFG, $PAGE;

    $prescss = '';

    $configurable = [
    // Config key => variableName,
    'brandprimary' => ['primary'],
    'brandsuccess' => ['success'],
    'brandinfo' => ['info'],
    'brandwarning' => ['warning'],
    'branddanger' => ['danger'],
    'bodybackground' => ['body-bg'],
    'linkcolor' => ['link-color'],
    'linkhovercolor' => ['link-hover-color'],
    'breadcrumbtextcolor' => ['breadcrumb-text-color'],
    'breadcrumbbgcolor' => ['breadcrumb-bg'],
    'footertextcolor' => ['footer-text-color'],
    'footerbgcolor' => ['footer-bg'],
    'footerlinkcolor' => ['footer-link-color'],
    'forumheadingbgcolor' => ['forumheading-bg'],
    'forumbodybgcolor' => ['forumbody-bg'],
    'ativityboxbgcolor' => ['introbox-bg'],
    'breadcrumbbkg' => ['breadcrumb-bg'],
    'cardbkg' => ['card-bg'],
    //drawer
    'drawerbkg' => ['navdrawer-bg'],
    'drawercolor' => ['navdrawer-color'],
    'drawerhover' => ['navdrawer-hover'],
    'drawerhoverbg' => ['navdrawer-hover-bg'],
    'draweractivel1' => ['navdrawer-activel1'],
    'draweractivel2' => ['navdrawer-activel2'],
    'drawerdimmed' => ['navdrawerdimmed'],
    'drawerdimmedbg' => ['navdrawerdimmed-bg'],
    
    'fploginform' => ['fploginform'],
    'headerimagepadding' => ['headerimagepadding'],
    'markettextbg' => ['markettextbg'],
    'iconwidth' => ['fpicon-width'],
    'courseboxheight' => ['courseboxheight'],
    'learningcontentpadding' => ['learningcontentpadding'],
    'blockwidthfordson' => ['blockwidthfordson'],
    'slideshowheight' => ['slideshowheight'],
    'activityiconsize' => ['activityiconsize'],
    'gutterwidth' => ['gutterwidth'], 
    'topnavbarbg' => ['topnavbar-bg'],
    'topnavbarteacherbg' => ['teachernavbarcolor'],
    'slideshowspacer' => ['slideshowspacer'],
    //buttons
    'buttonradius' => 'btna-border-radius',
    'buttoncolor' => 'btn-prm-bg',
    'buttonhovercolor' => 'btn-prm-hover-color',
    'buttontextcolor' => 'btn-prm-color',
    'buttoncolorscnd' => 'btn-snd-bg',
    'buttonhovercolorscnd' => 'btn-snd-hover-color',
    'buttontextcolorscnd' => 'btn-snd-color',
    
    ];

    // Add settings variables.
    foreach ($configurable as $configkey => $targets) {
        $value = $theme->settings->{$configkey};
        if (empty($value)) {
            continue;
        }
        array_map(function ($target) use (&$prescss, $value) {
            $prescss .= '$' . $target . ': ' . $value . ";\n";
        }
        , (array)$targets);
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $prescss .= $theme->settings->scsspre;
    }



    return $prescss;
}





/**
 * Copy the updated theme image to the correct location in dataroot for the image to be served
 * by /theme/image.php. Also clear theme caches.
 *
 * @param $settingname
 */
function theme_avadinte_update_settings_images($settingname) {
    global $CFG;

    // The setting name that was updated comes as a string like 's_theme_avadinte_loginbackgroundimage'.
    // We split it on '_' characters.
    $parts = explode('_', $settingname);
    // And get the last one to get the setting name..
    $settingname = end($parts);

    // Admin settings are stored in system context.
    $syscontext = context_system::instance();
    // This is the component name the setting is stored in.
    $component = 'theme_avadinte';


    // This is the value of the admin setting which is the filename of the uploaded file.
    $filename = get_config($component, $settingname);
    // We extract the file extension because we want to preserve it.
    $extension = substr($filename, strrpos($filename, '.') + 1);

    // This is the path in the moodle internal file system.
    $fullpath = "/{$syscontext->id}/{$component}/{$settingname}/0{$filename}";

    // This location matches the searched for location in theme_config::resolve_image_location.
    $pathname = $CFG->dataroot . '/pix_plugins/theme/avadinte/' . $settingname . '.' . $extension;

    // This pattern matches any previous files with maybe different file extensions.
    $pathpattern = $CFG->dataroot . '/pix_plugins/theme/avadinte/' . $settingname . '.*';

    // Make sure this dir exists.
    @mkdir($CFG->dataroot . '/pix_plugins/theme/avadinte/', $CFG->directorypermissions, true);

    // Delete any existing files for this setting.
    foreach (glob($pathpattern) as $filename) {
        @unlink($filename);
    }

    // Get an instance of the moodle file storage.
    $fs = get_file_storage();
    // This is an efficient way to get a file if we know the exact path.
    if ($file = $fs->get_file_by_hash(sha1($fullpath))) {
        // We got the stored file - copy it to dataroot.
        $file->copy_content_to($pathname);
    }

    // Reset theme caches.
    theme_reset_all_caches();
}












