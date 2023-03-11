<?php

use Carbon\Carbon;


  //Tarih için 
   function showTodayName()
  {
    $date = Carbon::today();

    
    $date = $date->isoFormat('DD-MM-YYYY')." ".$date->isoFormat('dddd');

    return $date;
  }

