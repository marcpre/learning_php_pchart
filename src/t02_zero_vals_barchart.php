<?php
require_once 'vendor/autoload.php';

use Webklex\pChart\pData;
use Webklex\pChart\pDraw;
use Webklex\pChart\pImage;

function generateChart()
{
    try {
        $buyArr = array(99826.0, 0, 0, 0, 0, 0, 0, 0, 0);
        $sellArr = array(0, 5496.0, 20482.0, 208473.0, 24534.0, 334928.0, 62347.0, 84284.0, 25161.0);
        $trxDateArr = array("2020-11-20", "2020-10-08", "2020-10-07", "2020-10-02", "2020-10-01", "2020-10-01", "2020-10-01", "2020-10-01", "2020-10-01");

        $MyData = new pData();
        $MyData->addPoints($buyArr, "Buy");
        $MyData->addPoints($sellArr, "Sell");
        $MyData->setAxisName(0, "Buy/Sell Transactions");

        $MyData->addPoints($trxDateArr, "Date");
        $MyData->setSerieDescription("Date", "Date");
        $MyData->setAbscissa("Date");

        $myPicture = new pImage(800, 350, $MyData);

        $myPicture->drawGradientArea(0, 0, 800, 350, DIRECTION_VERTICAL, array("StartR" => 211, "StartG" => 211, "StartB" => 211, "EndR" => 211, "EndG" => 211, "EndB" => 211, "Alpha" => 100));

        $myPicture->setFontProperties(array("FontName" => "src/font/Open_Sans/OpenSans-Light.ttf", "FontSize" => 10));
        $TextSettings = array("R" => 0, "G" => 0, "B" => 0, "FontSize" => 15, "FontName" => "src/font/Open_Sans/OpenSans-Bold.ttf", "Align" => TEXT_ALIGN_BOTTOMMIDDLE);

        $myPicture->setGraphArea(50, 30, 780, 270);
        $myPicture->drawScale(array("CycleBackground" => TRUE, "DrawSubTicks" => TRUE, "GridR" => 0, "GridG" => 0, "GridB" => 0, "GridAlpha" => 10));

        $myPicture->setShadow(TRUE, array("X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10));

        $settings = array("Gradient" => TRUE, "DisplayPos" => LABEL_POS_INSIDE, "DisplayValues" => TRUE, "DisplayR" => 0, "DisplayG" => 0, "DisplayB" => 0, "DisplayShadow" => TRUE, "Surrounding" => 30);
        $myPicture->drawBarChart($settings);

        $myPicture->drawLegend(50, 310, array("Style" => LEGEND_NOBORDER, "Mode" => LEGEND_HORIZONTAL));

        $myPicture->Render("./output/drawbarchart4.png");
    } catch (\Exception $e) {
        print_r($e);
        // parent::report(curl_error($e));
    }
}

generateChart();