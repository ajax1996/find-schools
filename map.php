<?php

function getdistance($lat1 ,$lat2,$lon1 ,$lon2)
{
	$earthRadius=6371;
	$latfrom=deg2rad($lat1);
	$lonfrom=deg2rad($lon1);
	$latto=deg2rad($lat2);
	$lonto=deg2rad($lon2);

	$latdiff=$latto-$latfrom;
	$londiff=$lonto-$lonfrom;

	$angle=2 *asin(sqrt(pow(sin($latdiff/2),2) + cos($latfrom)*cos($latto)*pow(sin($londiff/2),2)));

	return $angle*$earthRadius;
}