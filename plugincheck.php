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

        
        $folder     = $this->element['folder'];
        $element    = $this->element['element'];

        if(!empty($folder) && !empty($element) ){
            $enabled = JPluginHelper :: isEnabled  ($folder, $element);
            if($enabled){
                return '<span class="label label-success">'.$folder. ' plugin "'.$element.'" is enabled</span>';
            }
            else{
                return '<span class="label label-warning">'.$folder. ' plugin "'.$element.'" is not enabled</span>';
            }
        }
        else{
            return '<span class="label label-info">Field is not configured correctly!</span>';
        }

    }
}