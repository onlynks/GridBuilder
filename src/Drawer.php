<?php

class Drawer
{
    public function createImage($size)
    {
        $image = imagecreatetruecolor($size*2, $size*2);
        $color = imagecolorallocate($image, 200, 200, 200);
        imagefill($image, 0, 0, $color);

        return $image;
    }

    public function drawPolygon($image, $polygonArray, $max)
    {
        $color = imagecolorallocate($image, 0, 0, 0);

        foreach ($polygonArray as $pointsArray){

            $points = [];
            foreach ($pointsArray as $point){

                $points[] = $point+$max;
            }
            imagepolygon($image, $points, count($points)/2, $color);
        }

        for($i = 0; $i<count($polygonArray[0]); $i+=2){
            imageline($image, $polygonArray[0][$i]+$max, $polygonArray[0][$i+1]+$max, end($polygonArray)[$i]+$max, end($polygonArray)[$i+1]+$max, $color);
        }

        return $image;
    }

    public function getMax($points)
    {
        return max($points);
    }
}