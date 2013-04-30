<?php
$field = dvr::field('field1')->rule('checked','fail_message');

$out  = '';
list($result,$errors) = $field->test(array('field1'=>'on'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>''));
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>