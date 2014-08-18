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
<form action="<?php echo $this->menu->link ?>" method="post" name="adminForm">
	<?php foreach ($this->form->getFieldset() as $field): ?>
		<div class="row-fluid">
			<?php if ($field->hidden):
				echo $field->input;
			else:
				?>
				<?php echo $field->label; ?>
				<?php echo $field->input ?>
			<?php
			endif; ?>
		</div>
	<?php endforeach; ?>
	<input type="submit">
	<input type="hidden" name="option" value="com_registration" />
	<input type="hidden" name="task" value="registration.save" />
	<?php echo JHtml::_('form.token'); ?>
</form>