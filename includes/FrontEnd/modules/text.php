<?php
add_action('wpcf7_init', 'wpcf7_add_form_tag_text_replace', 10, 0);

function wpcf7_add_form_tag_text_replace()
{
	wpcf7_add_form_tag(
		array('text', 'text*', 'email', 'email*', 'url', 'url*', 'tel', 'tel*'),
		'wpcf7_text_form_tag_handler_replace',
		array('name-attr' => true)
	);
}

function wpcf7_text_form_tag_handler_replace($tag)
{

	if (empty($tag->name)) {
		return '';
	}

	$validation_error = wpcf7_get_validation_error($tag->name);

	$class = wpcf7_form_controls_class($tag->type, 'wpcf7-text');

	if (in_array($tag->basetype, array('email', 'url', 'tel'))) {
		$class .= ' wpcf7-validates-as-' . $tag->basetype;
	}

	if ($validation_error) {
		$class .= ' wpcf7-not-valid';
	}

	$atts = array();

	$atts['size'] = $tag->get_size_option('40');
	$atts['maxlength'] = $tag->get_maxlength_option();
	$atts['minlength'] = $tag->get_minlength_option();

	if (
		$atts['maxlength'] and $atts['minlength']
		and $atts['maxlength'] < $atts['minlength']
	) {
		unset($atts['maxlength'], $atts['minlength']);
	}

	$atts['class'] = $tag->get_class_option($class);
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option('tabindex', 'signed_int', true);

	$atts['autocomplete'] = $tag->get_option(
		'autocomplete',
		'[-0-9a-zA-Z]+',
		true
	);

	if ($tag->has_option('readonly')) {
		$atts['readonly'] = 'readonly';
	}

	if ($tag->is_required()) {
		$atts['required'] = 'true';
	}



	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset($tag->values);

	if (
		$tag->has_option('placeholder')
		or $tag->has_option('watermark')
	) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option($value);

	$value = wpcf7_get_hangover($tag->name, $value);

	$atts['value'] = $value;

	if (wpcf7_support_html5()) {
		$atts['type'] = $tag->basetype;
	} else {
		$atts['type'] = 'text';
	}

	$atts['name'] = $tag->name;

	$atts = wpcf7_format_atts($atts);

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		sanitize_html_class($tag->name),
		$atts,
		$validation_error
	);

	return $html;
}
