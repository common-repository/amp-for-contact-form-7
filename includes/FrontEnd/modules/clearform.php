<?php
$check_file = WP_PLUGIN_DIR . '/contact-form-7/includes/contact-form.php';

if (file_exists($check_file)) {
    
    $Check_previous_Text = 'on="submit-success:ampform.clear"';
    $file_content = file_get_contents($check_file);
    if (strpos($file_content, $Check_previous_Text)) { 
        $new_form = str_replace($Check_previous_Text, '', $file_content);
        file_put_contents($check_file, $new_form);
    }
    
    $CheckText = "\$atts = apply_filters( 'wpcf7_change_atts', \$atts );";
    $searchfor = "\$html .= sprintf( '<form %s";
    $replacefor = "\$atts = apply_filters( 'wpcf7_change_atts', \$atts );

        \$html .= sprintf( '<form %s";
    $file_content = file_get_contents($check_file);
    if (!strpos($file_content, $CheckText)) { 
        $new_form = str_replace($searchfor, $replacefor, $file_content);
        file_put_contents($check_file, $new_form);
    }
}