<?php
require_once 'vendor/autoload.php';

use Webklex\pChart\pData;
use Webklex\pChart\pDraw;
use Webklex\pChart\pImage;

$MyData = new pData();
$MyData->addPoints(array(150,220,300,-250,-420,-200,300,200,100),"Server A");
$MyData->addPoints(array(-1400,240,340,-300,-320,-300,200,100,50),"Server B");
$MyData->setAxisName(0,"Hits");

$MyData->addPoints(array("January","February","March","April","May","June","July","August","September"),"Months");
$MyData->setSerieDescription("Months","Month");
$MyData->setAbscissa("Months");

$myPicture = new pImage(800,350,$MyData);
$myPicture = new pImage(800,350,$MyData);

// $myPicture->drawGradientArea(0,0,800,350,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>240,"EndG"=>240,"EndB"=>240,"Alpha"=>20));
// $myPicture->drawGradientArea(0,0,800,350,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
// $myPicture->drawGradientArea(0,0,800,350,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
$myPicture->drawGradientArea(0,0,800,350,DIRECTION_VERTICAL,array("StartR"=>211,"StartG"=>211,"StartB"=>211,"EndR"=>211,"EndG"=>211,"EndB"=>211,"Alpha"=>100));
// $myPicture->drawGradientArea(0,0,800,350,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>240,"EndG"=>240,"EndB"=>240,"Alpha"=>20));

$myPicture->setFontProperties(array("FontName"=>"src/font/Open_Sans/OpenSans-Light.ttf","FontSize"=>10));
// $myPicture->drawText(35,25,"Insider Transactions for John Smith",array("R"=>255,"G"=>255,"B"=>255));
$TextSettings = array("R"=>0,"G"=>0,"B"=>0,"FontSize"=>15,"FontName"=>"src/font/Open_Sans/OpenSans-Bold.ttf","Align"=>TEXT_ALIGN_BOTTOMMIDDLE);
$myPicture->drawText(235,25,"Insider Transactions for John Smith",$TextSettings);

// add watermark
$myPicture->drawFromPNG(600,300,"src/watermark/next-return_logo_black-155x31.png");

// add link
$TextSettings1 = array("R"=>0,"G"=>0,"B"=>0,"FontSize"=>8,"FontName"=>"src/font/Open_Sans/OpenSans-Italic.ttf","Align"=>TEXT_ALIGN_BOTTOMMIDDLE);
$myPicture->drawText(110,260,"www.nextreturn.com",$TextSettings1);

$myPicture->setGraphArea(50,30,780,270);
$myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10));

$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

$settings = array("Gradient"=>TRUE, "DisplayPos"=>LABEL_POS_INSIDE, "DisplayValues"=>TRUE, "DisplayR"=>0, "DisplayG"=>0, "DisplayB"=>0, "DisplayShadow"=>TRUE, "Surrounding"=>30);
$myPicture->drawBarChart($settings);

$myPicture->drawLegend(50,310,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

$myPicture->Render("./output/drawbarchart3.png");