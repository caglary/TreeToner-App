<?php

//Tarih için 
function showTodayName() {
  $daysOfWeek = array('Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi');
  $todayNum = date('w'); // Get today's number (0 for Sunday, 1 for Monday, etc.)
  $todayName = $daysOfWeek[$todayNum]; // Get today's name from the array
  $todayDate = date("Y-m-d"); // Get today's date in YYYY-MM-DD format
  echo   $todayDate." ".$todayName; // Output the date and name
}







    
