  
<?php
error_reporting(0);
$banner = "\e[36;1m                                                                                 
                                                                                       
   _____           _  _____          _      
  / ____|         | |/ ____|        | |     
 | (___   __ _  __| | |     ___   __| | ___ 
  \___ \ / _` |/ _` | |    / _ \ / _` |/ _ \
  ____) | (_| | (_| | |___| (_) | (_| |  __/
 |_____/ \__,_|\__,_|\_____\___/ \__,_|\___|
                              
                                                                                 
[#] Shell Checker [#]    
                                   
Coded by : VanGans - SadCode Official\n\n\e[0;1m";
                                                                                                                                                                                                                          
	sleep(3);
	echo $banner;
	sleep(2);
	echo "File list shell : ";
	$list = trim(fgets(STDIN));
	$su = file_get_contents($list);
	if (empty($su)) {
		echo "file tidak ada\n";
	}else{
	$ck = explode("\n", $su);
	echo "\nCEK HASILNYA DI shell_aktif.txt\n\n";
	foreach ($ck as $key) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $key);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$exe = curl_exec($ch);
	curl_close($ch);
	preg_match("/<input type=\"password\"/i", $exe, $get);
		if (!empty($get)) {
			echo $key." ==> SHELL DITEMUKAN\n";
			$file = "shell_aktif.txt";
			  touch($file);
			  $o = fopen($file, 'a');
			  fwrite($o, $key."\n");
			  fclose($o);
		}else{
			echo $key." ==> SHELL TIDAK ADA\n";
		}
			
		}
	}
?>
