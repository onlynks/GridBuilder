<?php

class Calculator
{
    public function getPolygonsPoints($ray, $sides, $slices)
    {
        $polygons = [];

        $angle = 360/$sides;
        $slicesRay = $ray/($slices+1);

        $currentAngle = 0;
        $currentRay = $ray;

        for($sl = 0; $sl<=$slices; $sl++){

            $points = [];

            for($si = 0; $si<$sides; $si++){

                $points[] = $currentRay*cos(deg2rad($currentAngle));
                $points[] = $currentRay*sin(deg2rad($currentAngle));
                $currentAngle = $currentAngle+$angle;
            }
            $currentAngle = 0;
            $currentRay = $currentRay-$slicesRay;
            $polygons[] = $points;
        }
        return $polygons;
    }

}