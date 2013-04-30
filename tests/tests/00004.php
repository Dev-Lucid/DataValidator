<?php
$field = dvr::field('field1')->rule('notnumeric','fail_message');

$out  = '';
list($result,$errors) = $field->test(array('field1'=>'a'));
$out .= ($result)?'PASSES':'FAIL';
$out .= "\n";
list($result,$errors) = $field->test(array('field1'=>'0'));
$out .= ($result)?'PASSES':'FAIL';

file_put_contents($output_path,$out);
?>