<?php
$this->set('pageTitle', __('Products', true));
echo $form->create(); ?>
<table>
<?php
$th = array(
	__d('fieldnames', 'Product Id', true),
	__d('fieldnames', 'Product Provider', true),
	__d('fieldnames', 'Product Category', true),
	__d('fieldnames', 'Product Name', true),
	__d('fieldnames', 'Product Price', true),
	__d('fieldnames', 'Product Commission', true),
);
echo $html->tableHeaders($th);
foreach ($data as $i => $row) {
	if (!is_array($row) || !isset($row['Product'])) {
		continue;
	}
	extract($row);
	$tr = array(
		array(
			$Product['id'] . $form->input($i . '.Product.id', array('type' => 'hidden')),
			$form->input($i . '.Product.provider_id', array('div' => false, 'label' => false, 'empty' => true)),
			$form->input($i . '.Product.category_id', array('div' => false, 'label' => false, 'empty' => true)),
			$form->input($i . '.Product.name', array('div' => false, 'label' => false)),
			$form->input($i . '.Product.price', array('div' => false, 'label' => false)),
			$form->input($i . '.Product.commission', array('div' => false, 'label' => false)),
		),
	);
	$class = $i%2?'even':'odd';
	if ($this->action === 'admin_multi_add') {
		$class .= ' clone';
	}
	echo $html->tableCells($tr, compact('class'), compact('class'));
}
?>
</table>
<?php
echo $form->end(__('Submit', true));