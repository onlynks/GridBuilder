<?php

include ("web/homepage.html");



if(!empty($_POST)){
    include ("src/Calculator.php");
    include ("src/Drawer.php");

    $ray = $_POST["ray"];
    $sideNumber = $_POST["sideNumber"];
    $sliceNumber = $_POST["sliceNumber"];
    $keptArea = $_POST["keptArea"];

    $calculator = new Calculator();
    $points = $calculator->getPolygonsPoints($ray, $sideNumber, $sliceNumber);

    $drawer = new Drawer();
    $image = $drawer->createImage($ray);
    $max = $drawer->getMax($points[0]);
    $drawer->drawPolygon($image, $points, $max);

    imagepng($image, "polygone.png");
}
