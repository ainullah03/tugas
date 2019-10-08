<?php 
	function display_month($month, $year, $holidays){		//menampilkan kalender per bulan
		//deklarasi variable
		$first_day_of_month = mktime(0,0,0, $month, 1,$year);
		$first_day_of_week = date('w', $first_day_of_month); 
		$days_in_month = date('t', $first_day_of_month); 
		$month_name = date('F', $first_day_of_month); 
		$date_now = date("d");
		$month_now = date("m");
		
		echo("<h2>$month_name $year</h2>");
		
		$week = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
		
		//awal table + hari
		echo("<table> <tr>");
		foreach ($week as $d){
			echo ("<th class='hari'>$d</th>");
		}
		echo("</tr> <tr>");
		if ($first_day_of_week > 0){ //pengecekan jarak tgl 1 dengan hari minggu
			echo "<td colspan=\"$first_day_of_week\">&nbsp;</td>"; 
		}
		//penulisan tanggal beserta pengecekan hari-libur
		$day = $first_day_of_week;
		for ($day_of_month=1; $day_of_month <= $days_in_month; $day_of_month++){
			$temp = "".$year."-".$month."-".$day_of_month; //format untuk mengecek apakah libur 
			if ($day_of_month == $date_now && 
				$month == $month_now){
				echo "<td style='background-color:yellow' title='HARI INI'>$day_of_month</td>";
			}else if (isset($holidays[$temp])){
				echo "<td style='background-color:red' title='libur NASIONAL'>$day_of_month</td>";
		    }else if ($day%7==5){
				echo "<td style='background-color:red' title='JUMAT'>$day_of_month</td>";
			}else{
				echo "<td >$day_of_month</td>";
			}
			if ($day%7==6 && $day_of_month != $days_in_month)
				echo("</tr><tr>");
			
			$day++;
		}
		//membuat tabel kosong berdasar sisa hari
		if ($day%7 > 0){
			$day = 7-$day%7;
			echo "<td colspan='$day'>&nbsp;</td>"; 
		}
		echo ("</tr></table>");
	}
?>