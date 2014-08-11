<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    8/11/14 1:41 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */
?>
<dl>
	<?php
	// Iterate through the fields and display them.
	foreach ($this->form->getFieldset() as $field):
		// If the field is hidden, only use the input.
		if ($field->hidden):
			echo $field->input;
		else:
			?>
			<dt>
				<?php echo $field->label; ?>
			</dt>
			<dd<?php echo ($field->type == 'Editor' || $field->type == 'Textarea') ? ' style="clear: both; margin: 0;"' : '' ?>>
				<?php echo $field->input ?>
			</dd>
		<?php
		endif;
	endforeach;
	?>
</dl>