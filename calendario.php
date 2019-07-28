<!Doctype html>
<html>
   <head>
      <title>Rough Calendar</title>
      <style type="text/css">
          a          { text-decoration: none;}
          table      { width: 60%;height:60%;}
          td.day     { padding: 2%; }
          tr         {}
          .month     { font-size: 2em;}
          
          div.digit,.weekdays,.feriado {   
                        border:1px solid black;
                        width: 80px; height: 40px; 
                        margin: 2px;margin-top:2px;
                        clear:right; left:0;
                        text-align: center; 
                        
                        padding-top: 8px; float:left; 
                    }
          .weekdays     { height:24px;margin-top: 0;padding-top:6px;
                          background-color: #99f; color:#fff; font-weight: bold;}
          .feriado      { color: red; }
       
         .day        { }
      </style>
   </head>
<body>

<?php
// Calendario
$months_of_year = array("January","February","March","April","May","June","July","August","September","Obtober","November","December");
$month;

echo "<table border='1'>";
foreach($months_of_year as $current_month)
{
   switch($current_month){
   case "January":
   case "March":
   case "May":
   case "July":
   case "August":
   case "October":
   case "December":
   echo "<tr>\n\t\t<td class='month' colspan='8'>$current_month</td>\n\t\t</tr><tr>\n";
   echo "<tr>\n\t\t<th>Sunday</th><th>Moday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th></tr>";
   for($days=0;$days<=31;$days++) { if($days % 7== 0){ echo "\n\t\t</tr><tr>"; } $day += 1; echo "\n\t\t<td class='day'>$days</td>\n"; } echo "</tr>\n";
   break;
   case "February":
   echo  "<tr>\n\t\t<td class='month' colspan='8'>$current_month</td></tr><tr>\n";
   echo "<tr>\n\t\t<td>Sunday</td><td>Moday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>";
   for($days=0;$days<=28;$days++) { if($days % 7== 0){ echo "\n\t\t</tr><tr>"; } echo "\n\t\t<td class='day'>$days</td>\n"; } echo "</tr>\n";
   default:
   echo  "<tr>\n\t\t<td  class='month' colspan='8'>$current_month</td></tr><tr>\n";
   echo "<tr>\n\t\t<td>Sunday</td><td>Moday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>";
   for($days=0;$days<=30;$days++) { if($days % 7== 0){ echo "\n\t\t</tr><tr>"; } echo "\n\t\t<td class='day'>$days</td>\n"; } echo "</tr>\n";
   break;
}
   
}
   echo "</table>";  
    //$month = ceil(365/12);
   //print $month."\n";
   

   
   $number = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31
echo "There were {$number} days in August 2003";

$year = 2019;
for($i=1; $i<=12; $i++)
{  
   // Getting first day of month string
   $firstday = strtotime("$year-$i-1");
   // Parsing first day of month
   $f_day = getdate($firstday);
   
   // Getting how many days in each month
   $num_days = cal_days_in_month(CAL_GREGORIAN,$i,$year);
   echo "<br><br><br><hr>". $f_day['month'].": $year: ".$f_day['wday']."<hr>";
   $m = 0;
   $week = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
   
   foreach($week as $weekday)
   {
      if(($weekday == "Sun")||($weekday == "Sat")){ $feriados = "feriado";}else{$feriados = '';}
      echo "<div class='weekdays $feriados'>$weekday</div>";
   }
   echo "<br><br><br>\n";
   for($d=1;$d <=35;$d++)
   {  
      // Incrementing the day of the month
      $m++;
      
      // synchronizing month with the first day of the month
      if($f_day['wday'] > $d){ $cd = ""; $m = 0; }else{ $cd = $m;}
      if($d >= ($num_days + $f_day['wday'])){ $cd = ""; $m = 0; }
      if($d % 7 ==0){ $digit = 'feriado';}else{$digit = 'digit';}
      if($f_day['month'] == 1){ $digit = 'feriado';}
      // Writing the days of the month in the calendar
      echo "<div class='$digit'><a href=''>".$cd."</a></div>";
   
      // Spacing by weeks
      if($d % 7 == 0){ echo "<br><br><br><br>\n";}
      
    
   }
}
// Testing built in functions 
$f_day_month = strtotime("2019-9-1");
$ndate = getdate($f_day_month);
echo '<pre><br><br><br>';print_r($ndate);
echo "<pre><br><br><br>".$ndate['weekday'];
?>
</body>
</html>