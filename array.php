<?php
// dev: http://dev.example.com, prod: http://example.com, dev: http://dev.example2.com, prod: http://example2.com で配列を作成する
$arr = array(
  'dev' => array(
    'http://dev.example.com',
    'http://dev.example2.com'
  ),
  'prod' => array(
    'http://example.com',
    'http://example2.com'
  )
);

// $arrayを配列で返す
function get_array($array) {
  return $array;
}

get_array($arr);