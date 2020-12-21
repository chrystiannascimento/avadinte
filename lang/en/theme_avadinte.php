<?php

/**
 * Language file.
 *
 * @package   theme_avadinte
 * @copyright 2020 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */ 

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// The name of the second tab in the theme settings.
$string['advancedsettings'] = 'Advanced settings';
// The backgrounds tab name.
$string['backgrounds'] = 'Backgrounds';
// The brand colour setting.
$string['brandcolor'] = 'Brand colour';
// The brand colour setting description.
$string['brandcolor_desc'] = 'The accent colour.';
// A description shown in the admin theme selector.
$string['choosereadme'] = 'Theme avadinte is a child theme of Boost. It adds the ability to upload background avadintes.';
// Name of the settings pages.
$string['configtitle'] = 'avadinte settings';
// Background image for dashboard page.
$string['dashboardbackgroundimage'] = 'Dashboard page background image';
// Background image for dashboard page.
$string['dashboardbackgroundimage_desc'] = 'An image that will be stretched to fill the background of the dashboard page.';
// Background image for default page.
$string['defaultbackgroundimage'] = 'Default page background image';
// Background image for default page.
$string['defaultbackgroundimage_desc'] = 'An image that will be stretched to fill the background of all pages without a more specific background image.';
// Background image for front page.
$string['frontpagebackgroundimage'] = 'Front page background image';
// Background image for front page.
$string['frontpagebackgroundimage_desc'] = 'An image that will be stretched to fill the background of the front page.';
// Name of the first settings tab.
$string['generalsettings'] = 'General settings';
// Background image for incourse page.
$string['incoursebackgroundimage'] = 'Course page background image';
// Background image for incourse page.
$string['incoursebackgroundimage_desc'] = 'An image that will be stretched to fill the background of course pages.';
// Background image for login page.
$string['loginbackgroundimage'] = 'Login page background image';
// Background image for login page.
$string['loginbackgroundimage_desc'] = 'An image that will be stretched to fill the background of the login page.';
// The name of our plugin.
$string['pluginname'] = 'AVA DINTE';
// Preset files setting.
$string['presetfiles'] = 'Additional theme preset files';
// Preset files help text.
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href=https://docs.moodle.org/dev/Boost_Presets>Boost presets</a> for information on creating and sharing your own preset files, and see the <a href=http://moodle.net/boost>Presets repository</a> for presets that others have shared.';
// Preset setting.
$string['preset'] = 'Theme preset';
// Preset help text.
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
// Raw SCSS setting.
$string['rawscss'] = 'Raw SCSS';
// Raw SCSS setting help text.
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
// Raw initial SCSS setting.
$string['rawscsspre'] = 'Raw initial SCSS';
// Raw initial SCSS setting help text.
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
// We need to include a lang string for each block region.
$string['region-side-pre'] = 'Right';
$string['region-header'] = 'Header';
$string['homepagetitle'] ='Home page';
$string['coursespagetitle'] ='Courses';
$string['frontpage'] ='Home';
$string['mycoursespagetitle'] ='My courses';
$string['calendar'] = 'Calendar';
$string['attendtitle'] ='Call Center';
$string['privatefilestitle'] = 'Private files';
$string['contentbanktitle'] = 'Content bank';
$string['siteadmintitle'] = 'Site administration';
$string['region-frontpage'] = 'Frontpage';

// Theme settings.
$string['themesettingstitle'] = 'Accessibility settings';
$string['themesettingsfonttype'] = 'Font type';
$string['themesettingsdefaultfont'] = 'Default font';
$string['themesettingsdyslexicfont'] = 'Dyslexic font';
$string['themesettingsenableaccessibilitytoolbar'] = 'Enable accessibility toolbar';
$string['themesettinggsavedsuccessfully'] = 'Accessibility settings saved successfully';

// Accessibility features.
$string['accessibilityfontsize'] = 'Font size';
$string['accessibilitydecreasefont'] = 'Decrease font size';
$string['accessibilityresetfont'] = 'Reset font size';
$string['accessibilityincreasefont'] = 'Increase font size';
$string['accessibilitysitecolor'] = 'Site color';
$string['accessibilityresetsitecolor'] = 'Reset site color';
$string['accessibilitysitecolor2'] = 'Low contrast 1';
$string['accessibilitysitecolor3'] = 'Low contrast 2';
$string['accessibilitysitecolor4'] = 'High contrast';

// Data privacy.
$string['privacy:metadata:preference:accessibilitystyles_fontsizeclass'] = 'The user\'s preference for font size.';
$string['privacy:metadata:preference:accessibilitystyles_sitecolorclass'] = 'The user\'s preference for site color.';
$string['privacy:metadata:preference:themeavadintesettings_fonttype'] = 'The user\'s preference for font type.';
$string['privacy:metadata:preference:themeavadintesettings_enableaccessibilitytoolbar'] = 'The user\'s preference for enable the accessibility toolbar.';

$string['privacy:accessibilitystyles_fontsizeclass'] = 'The current preference for the font size is: {$a}.';
$string['privacy:accessibilitystyles_sitecolorclass'] = 'The current preference for the site color is: {$a}.';
$string['privacy:themeavadintesettings_fonttype'] = 'The current preference for the font type is: {$a}.';
$string['privacy:themeavadintesettings_enableaccessibilitytoolbar'] = 'The current preference for enable accessibility toolbar is to show it.';

$string['login'] = 'Already have an account?';

$string['board'] = 'Board';

//Settings
//colour_settings
$string['colours_settings'] = 'Colours';
$string['colours_headingsub'] = 'Colour Settings';
$string['colours_desc'] = 'Colour choosers will allow you to customize the look and feel of the main elements on the page.  If you are using a Preset other than the default, you will need to remove any custom colors below for best results as these will over-ride the Preset with undesireable results.  Generally, the Preset will have default colors that you will want to see before customizing them here.';

$string['brandColour'] = 'Brand Colour';
$string['brandColour_desc'] = 'Your main brand colour';
$string['brandprimary'] = 'Brand Primary';
$string['brandprimary_desc'] = 'Your main brand colour';
$string['brandsuccess'] = 'Brand Success';
$string['brandsuccess_desc'] = 'Brand colour for succesful alerts, postive panels, buttons, etc';
$string['brandinfo'] = 'Brand info';
$string['brandinfo_desc'] = 'Brand colour information alerts and panels, etc';
$string['brandwarning'] = 'Brand Warning';
$string['brandwarning_desc'] = 'Brand colour for warning alerts and panels, etc';
$string['branddanger'] = 'Brand Danger';
$string['branddanger_desc'] = 'Brand colour for danger alerts and panels, etc';
$string['breadcrumbbkg'] = 'Breadcrumb Background Colour';
$string['breadcrumbbkg_desc'] = 'Breadcrumb background colour.';
$string['drawerbkg'] = 'Side Drawer Background Colour';
$string['drawerbkg_desc'] = 'Side Drawer background colour for the menu on the left side of the page.';
$string['cardbkg'] = 'Content Background Colour';
$string['cardbkg_desc'] = 'Content background colour for course content and blocks.';
$string['bodybackground'] = 'Body Background Colour';
$string['bodybackground_desc'] = 'The main colour to use for the background.';
$string['footerbkg'] = 'Footer Background Colour';
$string['footerbkg_desc'] = 'Footer background colour for the bottom of the page.';
$string['topnavbarbg'] = 'Top Navigation Navbar Default';
$string['topnavbarbg_desc'] = 'Content background colour for the top navigation bar.';
$string['linkcolor'] = 'Link colour';
$string['linkcolor_desc'] = 'Link color';


    
$string['maincolors'] = 'Main colors';
$string['maincolors_desc']= 'Main colors description';
$string['maincontentbackground'] = 'Main content background';
$string['maincontentbackground_desc'] = 'Set the background colour for main content area';
$string['linkhovercolor'] = 'Cor do link ao passar o mouse';
$string['linkhovercolor_desc'] = 'Cor do link quando o ponteiro do mouse estiver sobre o link';
$string['selectiontextcolor'] = 'Cor do texto selecionado';
$string['selectiontextcolor_desc'] = 'Definir a cor do texto quando um texto for selecionado na tela.';
$string['selectiontextbgcolor']= 'Cor de fundo do texto selecionado';
$string['selectiontextbgcolor_desc']= 'Definir a cor de fundo do texto quando um texto for selecionado na tela.';
$string['topnavbarcolors'] = 'Cores da barra de navegação superior';
$string['topnavbarcolors_desc'] = 'define as cores da barra de navegação superior.';
$string['topnavbartextcolor'] = 'Cor de texto e link da barra de navegação superior';
$string['topnavbartextcolor_desc'] ='Definir a cor do texto e link da barra de navegação superior.';

$string['breadcrumbcolors'] = 'Cores da trilha de navegação';
$string['breadcrumbcolors_desc']='Cores da trilha de navegação descrição';
$string['breadcrumbtextcolor'] = 'Cor do texto da trilha de navegação';
$string['breadcrumbtextcolor_desc'] = 'Definir a cor do texto da trilha de navegação';

$string['breadcrumbbgcolor'] = 'Cor do fundo da trilha de navegação';
$string['breadcrumbbgcolor_desc'] = 'Definir a cor do fundo da trilha de navegação';

$string['footercolors'] = 'Cores do rodapé';
$string['footercolors_desc'] = 'Cores do rodapé descrição';

$string['footertextcolor'] = 'Cor do texto do rodapé';
$string['footertextcolor_desc'] = 'Definir a cor do texto do rodapé';
$string['footerlinkcolor'] = 'Cor do link do rodapé';
$string['footerlinkcolor_desc'] = 'Definir a cor do link do rodapé';

$string['footerbgcolor'] = 'Cor do fundo do rodapé';
$string['footerbgcolor_desc'] = 'Definir a cor do fundo do rodapé';

$string['forumcolors'] = 'Forum';
$string['forumcolors_desc'] = 'Cores do forum';
$string['forumheadingbgcolor'] = 'Cor do fundo do titulo do forum';
$string['forumheadingbgcolor_desc'] = 'definir a cor do fundo do título do forum' ;
$string['forumbodybgcolor'] = 'Cor do fundo do corpo da postagem do forum' ;
$string['forumbodybgcolor_desc'] = 'definir a cor do fundo do corpo da postagem do forum' ;

$string['ativityboxcolors'] = 'Cor do a caixa de introdução da atividade';
$string['ativityboxcolors_desc'] = 'definir a cor da caixa de introdução da atividade' ;
$string['ativityboxbgcolor'] = 'Cor de fundo da caixa de introdução da atividade';
$string['ativityboxbgcolor_desc'] = 'definir a cor de fundo da caixa de itrodução da atividade';

//general_settings
$string['general_headingsub'] = 'General Settings';
$string['general_desc'] = 'Preset files are used to change the appearance of the theme. It is possible to send your own preset file to overwrite the default.';

// Content settings.
$string['contentsettings'] = 'Content areas';
$string['coursetileinfo'] = 'Course Display Options';
$string['coursetileinfodesc'] = 'These settings allow you to customize how courses will be displayed on the frontpage as well as course categories.';
$string['textcontentinfo'] = 'Custom Content';
$string['textcontentinfodesc'] = 'Use the textboxes below to add a customized information for users.';
$string['generalcontentinfo'] = 'General Content Display Settings';
$string['generalcontentinfodesc'] = 'The options below help you customize the way content is displayed and turn on additional features for Fordson.';
$string['enrollcoursecard'] = 'Access';
$string['layoutinfo'] = 'Layout Settings';
$string['layoutinfodesc'] = 'Control page layout by chooseing a design.';

$string['fptextbox'] = 'Homepage Textbox Authenticated User';
$string['fptextbox_desc'] = 'This textbox appears on the homepage once a user authenticates. It is ideal for putting a welcome message and providing instructions for the learner.';

//Banner
$string['bannersettings'] = 'Banner';
$string['bannerenable'] = 'Enable Banner';
$string['bannercontent'] = 'Conteudo do banner';
$string['bannercontent_desc'] = 'Conteudo do banner';
$string['bannershowonpages'] = 'Mostra na pagina';
$string['bannershowonpages_desc'] = 'Mostrar na página';
$string['bannerdismiss'] = 'Banner dispensavel';
$string['bannerdismiss_desc']= 'Banner dispensavel';
$string['bannerconfirm'] = 'Confirmar quando fechar Banner';
$string['bannerconfirm_desc'] = 'Confirmar quando fechar banner';
$string['bannerresetvisibility'] = 'Resetar visibilidade';
$string['bannerresetvisibility_desc'] = 'Resetar a visibilidade';
$string['resetperpetualinfobannersuccess'] = 'Visibilidade resetada com sucesso';
$string['resetperpetualinfobannervisibilityerror'] = 'Erro ao resetar a visibilidade';

$string['bannerenable_desc'] = 'These settings allow you to customize banner to be displayed on the frontpage.';
$string['bannertextbox'] = 'Banner Textbox';
$string['bannertextbox_desc'] = 'Banner textbox description';
$string['bannertitle'] = 'Banner Title';
$string['bannertitle_desc'] = 'Enter a title for the banner.';

//Course Settings
$string['course_settings'] = 'Course settings';
$string['course_desc'] =' def...';
$string['course_headingsub'] = 'Course settings';
$string['sitetitle'] = 'Site title';
$string['sitetitle_desc'] = 'Site title description';
$string['default'] = 'Default';
$string['category'] = 'Category';
$string['course'] = 'Course';

$string['presetadjustmentsettings'] = 'Preset Adjustments';

//Footer Settings
// Footer
$string['footerheading'] = 'Footer';
$string['organization'] = 'Organization Name';
$string['organizationdesc'] = 'Organization name to appear in the footer.';
$string['website'] = 'Organization Website';
$string['websitedesc'] = 'Website address to appear in footer for organization.';
$string['phone'] = 'Organization Phone';
$string['phone1'] = 'Phone 1';
$string['phone2'] = 'Phone 2';
$string['phone3'] = 'Phone 3';
$string['phone4'] = 'Phone 4';
$string['phone5'] = 'Phone 5';
$string['phone6'] = 'Phone 6';
$string['phone7'] = 'Phone 7';

$string['phonedesc'] = 'Phone number to appear in footer.';
$string['mail'] = 'Organization Email';
$string['maildesc'] = 'Email address for organization that appears in footer.';
$string['footerheadingsub'] = 'Customize the footer of the homepage';
$string['footerdesc'] = 'The items below allow you provide branding to the theme footer.';
$string['footerheadingsocial'] ='Social Icons';
$string['socialnetworks'] = 'Social Networks';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook page. (i.e http://www.facebook.com/)';
$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your Twitter feed. (i.e http://www.twitter.com/)';
$string['linkedin'] = 'LinkedIn URL';
$string['linkedindesc'] = 'Enter the URL of your LinkedIn profile. (i.e http://www.linkedin.com/)';
$string['youtube'] = 'YouTube URL';
$string['youtubedesc'] = 'Enter the URL of your YouTube channel. (i.e http://www.youtube.com/)';
$string['tumblr'] = 'Tumblr URL';
$string['skype'] = 'Skype Account';
$string['skypedesc'] = 'Enter the Skype username of your organisations Skype account';
$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram page. (i.e http://instagram.com/)';
$string['website'] = 'Website URL';
$string['websitedesc'] = 'Enter the URL of your own website. (i.e http://dearbornschools.org)';
$string['sociallink'] = 'Custom Social Link';
$string['sociallinkdesc'] = 'Enter the URL of your your custom social media link. (i.e http://dearbornschools.org)';
$string['sociallinkicon'] = 'Link Icon';
$string['sociallinkicondesc'] = 'Enter the fontawesome name of the icon for your link<br />A full list of FontAwesome icons can be found at https://fontawesome.com/v4.7.0/icons/';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Footnote content editor for main footer';
$string['contacts'] = 'Contacts';
$string['contactsdesc'] = 'Contacts content from site';
$string['blog'] = 'Blog URL';
$string['blogdesc'] = 'Enter the URL of your institution blog. (i.e http://dearbornschools.org)';

// Buttons *********************************************************.
$string['buttonsettings'] = 'Buttons';
$string['buttonsettingsheading'] = 'Customize the buttons of this theme.';
$string['buttondesc'] = 'Alter the appearance of buttons used in this theme.';

$string['buttonradius'] = 'Set Button Radius';
$string['buttonradiusdesc'] = 'Higher radius = curved buttons, lower radius = square buttons';

$string['buttoncolor'] = 'Button colour';
$string['buttoncolordesc'] = 'The colour of the main buttons used throughout the site.';

$string['buttonhovercolor'] = 'Button colour (When hovering)';
$string['buttonhovercolordesc'] = 'The colour that the button changes to when hovering over the button.';

$string['buttontextcolor'] = 'Button text colour';
$string['buttontextcolordesc'] = 'The colour of text used on buttons';

$string['buttoncolorscnd'] = 'Secondary Button colour';
$string['buttoncolordescscnd'] = 'The colour of the secondary buttons used throughout the site.';

$string['buttonhovercolorscnd'] = 'Secondary Button colour (When hovering)';
$string['buttonhovercolordescscnd'] = 'The colour that the secondary button changes to when hovering over the button.';

$string['buttontextcolorscnd'] = 'Secondary Button text colour';
$string['buttontextcolordescscnd'] = 'The colour of text used on secondary buttons.';

$string['buttoncolorcancel'] = 'Cancel Button colour';
$string['buttoncolordesccancel'] = 'Background colour for Cancel button.<br />Type transparent in the box for transparency.';

$string['buttonhovercolorcancel'] = 'Cancel Button colour (When hovering)';
$string['buttonhovercolordesccancel'] = 'The colour that the cancel button changes to when hovering over the button. <br />Type transparent in the box for transparency.';

$string['buttontextcolorcancel'] = 'Cancel Button text colour';
$string['buttontextcolordesccancel'] = 'The colour of text used on cancel buttons.';

$string['editfont'] = 'Editing and Customize this page button font colour';
$string['editfontdesc'] = 'Set the Editing and Customize this page button font colour';

$string['editverticalpadding'] = 'Set vertical padding of editing buttons';
$string['edithorizontalpadding'] = 'Set Horizontal padding of editing buttons';

$string['buttondropshadow'] = 'Drop shadow decoration on bottom of button';
$string['buttondropshadowdesc'] = 'Show a drop shadow (shading) on bottom of button.';

$string['buttons_settings'] = 'Buttons settings';
$string['buttons_headingsub'] = 'Buttons';
$string['buttons_desc'] = 'Página para definir as configurações dos botões';

//Top navbar settings
$string['topnavbar_settings'] = 'Top navbar';
$string['topnavbar_headingsub'] = 'Top navbar settings';
$string['topnavbar_desc'] = 'desc...';
$string['tnbnavbar'] = 'Navbar';
$string['tnbnavbar_desc'] = 'Navbar desc';
$string['topnavbarsticky'] = 'Fixa apenas a barra de navegação';
$string['topnavbarsticky_desc'] = 'Fixa apena a barra de navegação, tendo mais area para o conteudo';
$string['enablehome'] = 'Página inicial';
$string['enablehome_desc'] = 'Mostra um link para a página inicial';
$string['enablemyhome'] = 'Minhas disciplinas';
$string['enablemyhome_desc'] = 'Mostra um link para a minhas disciplinas';
$string['enablecalendar'] = 'Calendar';
$string['enablecalendar_desc'] ='Mostra um link para o calendario';
$string['enablecourses'] = 'Cursos';
$string['enablecourses_desc'] = 'Mostra um link para a página de  cursos';
$string['enablecallcenter'] ='Central de atendimento';
$string['enablecallcenter_desc'] = 'Define link para a central de atendimento. Se Vazio será desabilitado';

//Drawer settings right and left
$string['drawer_settings'] = 'Drawer';
$string['drawer_headingsub'] = 'Drawer settings';
$string['drawer_desc'] = 'Drawer settings ...';
$string['leftdrawer'] = 'Left drawer';
$string['leftdrawer_desc']  = 'Left drawer settings';
$string['shownavclosed'] = 'Nav Drawer Closed by Default';
$string['shownavclosed_desc'] = 'Show the navigation drawer collapsed for all users by default on each page.';
$string['leftdrawersize'] = 'Left drawer size';
$string['leftdrawersize_desc'] = 'Left drawer size';
$string['drawercolor'] = 'Drawer text color';
$string['drawercolor_desc'] = 'Drawer text color';
$string['drawerhover'] = 'Drawer hover color';
$string['drawerhover_desc'] = 'Drawer hover color ';
$string['drawerhoverbg'] = 'Drawer hover bg color';
$string['drawerhoverbg_desc'] = 'Drawer hover bg color ';
$string['draweractivel1'] = 'Drawer active level 1';
$string['draweractivel1_desc'] = 'Drawer active level 1';
$string['draweractivel2'] = 'Drawer active level 2';
$string['draweractivel2_desc'] = 'Drawer active level 2';
$string['drawerdimmed'] = 'Drawer dimmed color';
$string['drawerdimmed_desc'] = 'Drawer dimmed  color';
$string['drawerdimmedbg'] = 'Drawer dimmed bg color';
$string['drawerdimmedbg_desc'] = 'Drawer dimmed bg color';

//Header
$string['header_settings'] = 'Header';
$string['header_headingsub'] = 'Header  settings';
$string['header_desc'] = 'Header settings...';
$string['showcourseheader'] = 'Show course header';
$string['showcourseheader_desc'] = 'Show course header desc';
$string['breadcrumb'] = 'Breadcrumb';
$string['breadcrumb_desc'] = 'Breadcrumb ...';
$string['breadcrumbhome']= 'Breadcrumb Home';
$string['breadcrumbhome_desc'] = 'Breadcrumb home desc';
$string['breadcrumbhome_text'] = 'Text';
$string['breadcrumbhome_icon'] = 'Icon';
$string['breadcrumbseparator'] = 'Breadcrumb separator';
$string['breadcrumbseparator_desc'] = 'Breadcrumb separator desc';
 



