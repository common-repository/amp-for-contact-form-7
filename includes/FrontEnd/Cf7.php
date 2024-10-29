<?php

/**
 * The FrontEnd Manage Module of the plugin.
 * 
 *
 * @package    AMP for Contact Form 7
 * @subpackage AMP for Contact Form 7/Frontend
 * @author     Roni
 */

// Set Namespace.
namespace ESOFT\AMPCF7\INCLUDES\FrontEnd;

class Cf7
{
    private $formcount = 0;   

    public function __construct()
    {        
        $this->load_module();
        $this->load_filter();
    }

    /**
     * All Filter
     */

    function load_filter()
    {
        add_filter('wpcf7_form_novalidate', [$this, 'ampcf7_novalidate'], 9, 0);
        add_filter('wpcf7_form_id_attr', [$this, 'ampcf7_id_attr'], 9, 1);
        add_filter('wpcf7_change_atts', [$this, 'ampcf7_formclear'], 9, 1);
        add_filter('wpcf7_form_elements', [$this, 'ampcf7_form_html'], 9, 1);   
    }

    /**
     * All Module
     */

    function load_module()
    {
        require_once 'modules/date.php';
        require_once 'modules/file.php';
        require_once 'modules/number.php';
        require_once 'modules/quiz.php';
        require_once 'modules/select.php';
        require_once 'modules/text.php';
        require_once 'modules/textarea.php';
        require_once 'modules/checkbox.php';
        require_once 'modules/clearform.php';
    }   


    /**
     * Check Validate Inective
     */

    function ampcf7_novalidate()
    {
        return false;
    }

    /**
     * Add Form ID
     */

    function ampcf7_formclear($pretag)
    {
        $pretag .= 'on="submit-success:ampform_'.$this->formcount.'.clear"';
        return $pretag;
    }

    /**
     * Add Form Clear
     */

    function ampcf7_id_attr($preid)
    {
        $preid .= 'ampform_'.$this->formcount;
        return $preid;
    }

    /**
     * Add Success Massage in Form
     */

    function ampcf7_form_html($prehtml)
    {        
        $this->formcount++;

        $ampcf7_sucmessage = 'Success! Thanks for Your Request.';
        $ampcf7_errormessage = 'Error! Please Try Again.';

        $prehtml .= '<div class="ampcf7-successes-massage">' . $ampcf7_sucmessage . '</div>';
        $prehtml .= '<div class="ampcf7-error-massage">' . $ampcf7_errormessage . '</div>';
        return $prehtml;
    }
}
