<?php

    $ip_file = fopen('last_ip.txt','c+');
    $check_last_ip = fgets($ip_file);
    $file = fopen('counter.txt','c+');
    $count = intval(fgets($file));

    if($_SERVER['REMOTE_ADDR'] != $check_last_ip)
    {
        fclose($ip_file);
        $ip_file = fopen('last_ip.txt','w+');

        fputs($ip_file, $_SERVER['REMOTE_ADDR']);
        $count++;
        fseek($file, 0);
        fputs($file, $count);
    }

    
    fclose($file);
    fclose($ip_file);
    echo$count;
?>