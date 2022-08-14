<?php

//ページングclassなし
function paring($totalRows_news, $linkUrl){
  if (isset($_GET['p'])) {
    $next_page = $_GET['p'] + 1;
    $previous_page = $_GET['p'] - 1;
  } else {
    $_GET['p'] = 1;
    $next_page = 1;
  }

  $maxRows_news = 10;
  $last_page = ceil($totalRows_news / $maxRows_news);
  $second_to_last_page = $last_page - 1;
  $third_to_last_page = $last_page - 2;

  switch ($_GET['p']) {
    case 1:
      $page = $_GET['p'];
      break;
    case 2:
      $page = $_GET['p'] - 1;
      break;
    case $last_page:
      $page = $_GET['p'] - 4;
      break;
    case $second_to_last_page:
      $page = $_GET['p'] - 3;
      break;
    default:
      $page = $_GET['p'] - 2;
      break;
  }

  echo '
  <nav>
    <ul>
      <li>
        <a href="'.$linkUrl.'?p='.$previous_page.'""><span>«</span></a>
      </li>';
  if($_GET['p'] > 3){
    echo '
    <li><a href="'.$linkUrl.'?p=1">1</a></li>';
  }
  for ($i = 1; $i <= 5; $i++) {
    if($_GET['p'] == $page){
      echo '<li class="active"><a href="'.$linkUrl.'?p='.$page.'">'.$page.'</a></li>';
    } else {
      echo '<li><a href="'.$linkUrl.'?p='.$page.'">'.$page.'</a></li>';
    }
    $page++;
  }
  if($_GET['p'] < $third_to_last_page){
    echo '
    <li>
        <a href="#">...</a>
      </li>
      <li>
        <a href="'.$linkUrl.'?p='.$last_page.'">'.$last_page.'</a>
    </li>';
  }
  echo '
      <li>
        <a href="'.$linkUrl.'?p='.$next_page.'"">
          <span>»</span>
        </a>
      </li>
    </ul>
  </nav>';
}

//ページングbootstrap3
function paringB3($totalRows_news, $linkUrl){
  if (isset($_GET['p'])) {
    $next_page = $_GET['p'] + 1;
    $previous_page = $_GET['p'] - 1;
  } else {
    $_GET['p'] = 1;
    $next_page = 1;
  }

  $maxRows_news = 10;
  $last_page = ceil($totalRows_news / $maxRows_news);
  $second_to_last_page = $last_page - 1;
  $third_to_last_page = $last_page - 2;
  if($_GET['p'] == 1){
    $page = $_GET['p'];
  } else if($_GET['p'] == 2){
    $page = $_GET['p'] - 1;
  } else if($_GET['p'] == $last_page){
    $page = $_GET['p'] - 4;
  } else if($_GET['p'] == $second_to_last_page){
    $page = $_GET['p'] - 3;
  } else {
    $page = $_GET['p'] - 2;
  }
  echo '
  <nav aria-label="...">
    <ul class="pagination">
      <li class="disabled">
        <a href="'.$linkUrl.'?p='.$previous_page.'" aria-label="Previous"><span aria-hidden="true">«</span></a>
      </li>';
  if($_GET['p'] > 3){
    echo '
    <li><a href="'.$linkUrl.'?p=1">1</a></li>';
  }
  for ($i = 1; $i <= 5; $i++) {
    if($_GET['p'] == $page){
      echo '<li class="active"><a href="'.$linkUrl.'?p='.$page.'">'.$page.'</a></li>';
    } else {
      echo '<li><a href="'.$linkUrl.'?p='.$page.'">'.$page.'</a></li>';
    }
    $page++;
  }
  if($_GET['p'] < $third_to_last_page){
    echo '
    <li>
        <a href="#">...</a>
      </li>
      <li>
        <a href="'.$linkUrl.'?p='.$last_page.'">'.$last_page.'</a>
    </li>';
  }
  echo '
      <li>
        <a href="'.$linkUrl.'?p='.$next_page.'" aria-label="Next">
          <span aria-hidden="true">»</span>
        </a>
      </li>
    </ul>
  </nav>';
}