<!-- <navbar class="navbar"> -->

<?php

$items = $data;

$page = basename($_SERVER['REQUEST_URI']);
$values = $items['items'];
$navbarClass = $items['config']['navbar-class'];
?>

<nav class='<?=$navbarClass?>' style='background-color: #e3f2fd;'>
    <a class='navbar-brand' href="<?=$this->url('')?>">Anax - ramverk med moduler</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
  <div class='navbar-collapse collapse' id='navbarSupportedContent'>
<!-- <ul class='navbar-nav mr-auto mt-2 mt-lg-0'> -->
    <ul class='navbar-nav mr-auto'>

<?php
foreach ($values as $value) :
    $val = $this->url($value['route']);

    if ($value['route'] == "") {
        $value['route'] = "htdocs";
    }

    if ($page == $value['route']) {
        $select = "selected nav-item active";
    } else {
        $select = "nav-item";
    }
    $text = $value['text'];

?>


    <li class="<?=$select?>">
    <a class="nav-link" href="<?=$val?>"><?=$text?></a></li>

<?php
endforeach;
?>

 </ul></div></nav>
<!-- </navbar> -->

<?php
// $html = "<nav class='$navbarClass' style='background-color: #e3f2fd;'>
// <a class='navbar-brand' href='index'>Anax - ramverk med moduler</a>
// <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse'
// data-target='#navbarsExample09' aria-controls='navbarsExample09'
//  aria-expanded='false' aria-label='Toggle navigation'>
//     <span class='navbar-toggler-icon'></span>
//   </button>
//   <div class='navbar-collapse collapse' id='navbarsExample09'>";
// $html .= "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
//
// foreach ($values as $value) {
//     $route = $value['route'];
//     $text = $value['text'];
//
//
//     $html .= "<li class=\"";
//
//     // if ($value['route'] == "") {
//     //     $value['route'] = "htdocs";
//     // }
//
//     if ($page == $value['route']) {
//         //$html .= "selected";
//         $html .= "nav-item active";
//     } else {
//         $html .= "nav-item";
//     }
//     $html .= "\"><a class='nav-link' href='" . $route . "'>" . $text . "</a></li>";
// }
// $html .= "</ul></div></nav>";
//
// echo $html;
?>
