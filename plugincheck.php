<?php
/**
 * plugincheck.php  Custom form field to check if any plugin is enabled or not
 *
 * @package   plugincheck
 * @author    Codeboxr ( http://codeboxr.com )
 * @copyright Copyright (C) 2011-2014 http://codeboxr.com. All rights reserved.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @ help: https://github.com/manchumahara/plugincheck
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
/**
 * Form Field class for the Joomla Framework.
 *
 */
class JFormFieldPlugincheck extends JFormField {

    protected $type = 'plugincheck';

    /**
     */
    protected function getInput() {


        if(version_compare(JVERSION,'3.0.0','le')):
            $doc = JFactory::getDocument();
            $extracss = '
                .label25{
                    -webkit-border-radius: 3px;	-moz-border-radius: 3px;	border-radius: 3px;
                    display: inline-block;
                    padding: 2px 4px;
                    font-size: 10.998px;
                    font-weight: bold;
                    line-height: 14px;
                    color: #fff;
                    vertical-align: baseline;
                    white-space: nowrap;
                    text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
                    background-color: #999;
                }
                .label-success{ background-color: #468847; }
                .label-warning{ background-color: #468847; }
                .label-info{ background-color: #468847; }
            ';
            $doc->addStyleDeclaration($extracss);
         endif;

        $folder     = $this->element['folder'];
        $element    = $this->element['element'];

        if(!empty($folder) && !empty($element) ){
            $enabled = JPluginHelper :: isEnabled  ($folder, $element);
            if($enabled){
                return '<span class="label label25 label-success">'.$folder. ' plugin "'.$element.'" is enabled</span>';
            }
            else{
                return '<span class="label label25 label-warning">'.$folder. ' plugin "'.$element.'" is not enabled</span>';
            }
        }
        else{
            return '<span class="label label25 label-info">Field is not configured correctly!</span>';
        }

    }
}