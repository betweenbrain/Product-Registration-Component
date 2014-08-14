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
		<div class="row-fluid">
			<?php foreach ($this->form->getFieldset() as $field) : ?>
				<?php // If the field is hidden, only use the input.
				if ($field->hidden)
				{
					echo $field->input;
				}
				else
				{
					?>
					<div class="span3">
						<?php echo $field->label; ?>
						<?php echo $field->input; ?>
					</div>
				<?php } ?>
			<?php endforeach ?>
		</div>
		<input type="submit">
		<input type="hidden" name="option" value="com_registration" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
<?php echo JHtml::_('form.token'); ?>
<?php if ($this->items) : ?>
	<h2>Showing <?php echo $this->startDate?> - <?php echo $this->endDate?></h2>
	<form action="index.php" method="post" name="adminForm">
		<input type="submit" value="Generate CSV">
		<input type="hidden" name="option" value="com_registration" />
		<input type="hidden" name="format" value="csv" />
	</form>
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

