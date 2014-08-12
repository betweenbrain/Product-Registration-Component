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
	<form action="index.php" method="post" name="adminForm">
		<?php
		// Iterate through the fields and display them.
		foreach ($this->form->getFieldset() as $field)
		{
			// If the field is hidden, only use the input.
			if ($field->hidden)
			{
				echo $field->input;
			}
			else
			{
				echo $field->label;
				echo $field->input;
			}
		}
		?>
		<input type="submit">
		<input type="hidden" name="option" value="com_registration" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
<?php if ($this->items) : ?>
	<table class="table table-striped">
		<tbody>
		<thead>
		<?php foreach ($this->columns as $column) : ?>
			<th><?php echo $column ?></th>
		<?php endforeach ?>
		</thead>
		<?php foreach ($this->items as $item) : ?>
			<tr>
				<?php foreach ($item as $key => $value) : ?>
					<td>
						<?php echo $value ?>
					</td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif;

