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
 * Overriden theme boost core renderer.
 *
 * @package    theme_moove
 * @copyright  2017 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_avadinte\output;

use html_writer;
use custom_menu;
use action_menu_filler;
use action_menu_link_secondary;
use stdClass;
use moodle_url;
use action_menu;
use pix_icon;
use theme_config;
use core_text;
use help_icon;
use context_system;
use core_course_list_element;
use context_course;

defined('MOODLE_INTERNAL') || die;
require_once ($CFG->dirroot . "/course/renderer.php");

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_moove
 * @copyright  2017 Willian Mano - http://conecti.me
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

  
    public function topmenu() {
        global $PAGE, $COURSE, $CFG, $DB, $OUTPUT;
        $course = $this->page->course;
        $context = context_course::instance($course->id);
        $courseid = optional_param('course', SITEID, PARAM_INT);
        $courseid = $course->id;
        





        $siteadmintitle = 'site admin';
        $siteadminurl = new moodle_url('/admin/search.php');
        //$hasadminlink = has_capability('moodle/site:configview', $context);
        $hasadminlink = has_capability('moodle/site:configview', \context_system::instance());
        $siteadminisactive =$PAGE->url->compare($siteadminurl, URL_MATCH_BASE);
        $context = $this->page->context;
        $contextid = optional_param('contextid', \context_system::instance()->id, PARAM_INT);


        //Pagina Inicial

        $homepagetitle = 'Página Inicial';
        $homepageurl = new moodle_url('/?redirect=0');
        $homepageisactive =$PAGE->url->compare($homepageurl, URL_MATCH_BASE);

        
        //Disciplinas
        $coursespagetitle='Disciplinas';
        $coursespageurl= new moodle_url('/my/');
        $coursespageisactive = $PAGE->url->compare($coursespageurl, URL_MATCH_BASE);


        //Minhas Notas
        $gradestitle = get_string('gradebooksetup', 'grades');
        $gradesurl = new moodle_url('/grade/edit/tree/index.php', array(
            'id' => $PAGE->course->id
        ));

        $gradebooktitle = get_string('gradebook', 'grades');
        $gradebookurl = new moodle_url('/grade/report/grader/index.php', array(
            'id' => $PAGE->course->id
        ));
        $gradebookisactive =$PAGE->url->compare($gradebookurl, URL_MATCH_BASE);


        //Calendario
         $calendartitle = get_string('calendar', 'calendar');

         $iscoursecalendar = $courseid != SITEID;

        if ($iscoursecalendar) {
            $calendarurl = new moodle_url('/calendar/view.php?view=month', array(
                'course' => $PAGE->course->id
            ));
        } else {
            $calendarurl = new moodle_url('/calendar/view.php?view=month' );
        }


        

        $calendarisactive =$PAGE->url->compare($calendarurl, URL_MATCH_BASE);

        //Central de Atendimentos 
        $attendtitle='Central de Atendimentos';
        $attendurl= new moodle_url('/my');

        //Private File
        $privatefilestitle = 'Arquivos Privados';
        $privatefilesurl = new moodle_url('/user/files.php');
        $privatefilesisactive = $PAGE->url->compare($privatefilesurl, URL_MATCH_BASE);

        //Content bank
        $contentbanktitle = 'Banco de Conteudo';
        $contentbankurl = new \moodle_url('/contentbank/index.php', ['contextid' => $contextid]);
        $contentbankisactive = $PAGE->url->compare($contentbankurl, URL_MATCH_BASE);



  
        
        
        // Send to template.
        $dashmenu = [  'hasadminlink' => $hasadminlink, 'siteadmintitle' => $siteadmintitle, 'siteadminurl' => $siteadminurl, 'siteadminisactive' => $siteadminisactive,
                        'homepagetitle'=>$homepagetitle, 'homepageurl'=>$homepageurl, 'homepageisactive' => $homepageisactive,
                        'coursespagetitle' => $coursespagetitle, 'coursespageurl' => $coursespageurl, 'coursespageisactive' => $coursespageisactive,
                        'gradebooktitle' => $gradebooktitle, 'gradebookurl' => $gradebookurl, 'gradebookisactive' => $gradebookisactive,
                        'calendartitle' => $calendartitle, 'calendarurl' => $calendarurl, 'calendarisactive' => $calendarisactive,
                        'attendtitle' => $attendtitle, 'attendurl' => $attendurl,
                        'privatefilestitle' => $privatefilestitle, 'privatefilesurl' => $privatefilesurl, 'privatefilesisactive' => $privatefilesisactive,
                        'contentbanktitle' => $contentbanktitle, 'contentbankurl' => $contentbankurl, 'contentbankisactive' => $contentbankisactive,



                    ];

      
        return $this->render_from_template('theme_photo/topmenu', $dashmenu);
    }


    public function has_compact_logo() {
        global $OUTPUT;
        $logo = $OUTPUT->get_compact_logo_url();     
        return  !empty($logo);
    }



}


