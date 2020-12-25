<?php
require_once 'vendor/autoload.php';

use Webklex\pChart\pData;
use Webklex\pChart\pDraw;
use Webklex\pChart\pImage;


function generateChart()
{
    try {
        $MyData = new pData();
        $MyData->addPoints(array(150, 220, 300, -250, -420, -200, 300, 200, 100), "Server A");
        $MyData->addPoints(array(140, 240, 340, -300, -320, -300, 200, 100, 50), "Server B");
        $MyData->setAxisName(0, "Hits");

        $MyData->addPoints(array("January", "February", "March", "April", "May", "Juin", "July", "August", "September"), "Months");
        $MyData->setSerieDescription("Months", "Month");
        $MyData->setAbscissa("Months");

        $myPicture = new pImage(800, 300, $MyData);

        $myPicture->drawGradientArea(0, 0, 800, 300, DIRECTION_VERTICAL, array("StartR" => 240, "StartG" => 240, "StartB" => 240, "EndR" => 180, "EndG" => 180, "EndB" => 180, "Alpha" => 100));
        $myPicture->drawGradientArea(0, 0, 800, 300, DIRECTION_HORIZONTAL, array("StartR" => 240, "StartG" => 240, "StartB" => 240, "EndR" => 180, "EndG" => 180, "EndB" => 180, "Alpha" => 20));

        $myPicture->setFontProperties(array("FontName" => "src/font/Open_Sans/OpenSans-Light.ttf", "FontSize" => 6));

        $myPicture->setGraphArea(50, 30, 780, 270);
        $myPicture->drawScale(array("CycleBackground" => TRUE, "DrawSubTicks" => TRUE, "GridR" => 0, "GridG" => 0, "GridB" => 0, "GridAlpha" => 10));

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10));

        $settings = array("Gradient" => TRUE, "DisplayPos" => LABEL_POS_INSIDE, "DisplayValues" => TRUE, "DisplayR" => 255, "DisplayG" => 255, "DisplayB" => 255, "DisplayShadow" => TRUE, "Surrounding" => 30);
        $myPicture->drawBarChart($settings);

        $myPicture->drawLegend(650, 12, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL));

        $myPicture->Render("./output/sample1.png");
    } catch (\Exception $e) {
        // print_r($e);
        // parent::report(curl_error($e));
    }
}

generateChart();