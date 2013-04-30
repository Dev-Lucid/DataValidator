<?php
$ruleset = dvr::ruleset(
	dvr::field('field1')->rule('equals','fail_message','must_equal_value'),
	dvr::field('field2')->rule('minlength','fail_message',5),
	dvr::field('field3')->rule('maxlength','fail_message',4),
	dvr::field('field4')->rule('checked','fail_message')
);

$out  = '';
$out .= $ruleset->js('testformname');

file_put_contents($output_path,$out);
?>