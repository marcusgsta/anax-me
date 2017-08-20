<?php
// navbar for bootstrap
require_once 'navbar1-array.php';

// print_r($navbar['config']);
// print_r($navbar['items']);
$page = basename($_SERVER['REQUEST_URI']);

$values = $navbar['items'];
$navbarClass = $navbar['config']['navbar-class'];


$html = "<nav class='$navbarClass' style='background-color: #e3f2fd;'>
<a class='navbar-brand' href='#''>Anax - ramverk med moduler</a>
<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse'
data-target='#navbarsExample09' aria-controls='navbarsExample09'
 aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>
  <div class='navbar-collapse collapse' id='navbarsExample09'>
<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
";
foreach ($values as $key => $value) {
    // echo $key . " is " . $value['text'] . $value['route'];
    $route = $value['route'];
    $text = $value['text'];
    $url = $app->url->create($route);

    $html .= "<li class=\"";

    if ($value['route'] == "") {
        $value['route'] = "htdocs";
    }

    if ($page == $value['route']) {
        //$html .= "selected";
        $html .= "nav-item active";
    } else {
        $html .= "nav-item";
    }
    // ($page == $url) ? "selected" : "";
    $html .= "\"><a class='nav-link' href='" . $url . "'>" . $text . "</a></li>";
}
$html .= "</ul></div></navbar>";




echo $html;
