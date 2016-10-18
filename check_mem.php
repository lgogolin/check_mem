<?php

	$ds_name[1] = "Memory Usage";
	$opt[1] = "--vertical-label \"Bytes\" -l0 -b 1024 --title \"Memory usage  for $hostname / $servicedesc\" ";

	# Total Memory
	$def[1] = "DEF:mem_total=$RRDFILE[1]:$DS[1]:AVERAGE " ;
	# Used Memory
	$def[1] .= "DEF:mem_used=$RRDFILE[1]:$DS[2]:AVERAGE " ;
	# Cache
	$def[1] .= "DEF:mem_cache=$RRDFILE[1]:$DS[3]:AVERAGE " ;
	# Buffer
	$def[1] .= "DEF:mem_buffer=$RRDFILE[1]:$DS[4]:AVERAGE " ;
	

	# Memory Cache
	$def[1] .= rrd::cdef("mem_cache_tmp", "mem_cache,mem_buffer,+,mem_used,+");
	$def[1] .= rrd::area("mem_cache_tmp", "#c0c0c0", "Memory Cache");

	$def[1] .= "GPRINT:mem_cache:LAST:\"%3.2lf %sB LAST \" ";
        $def[1] .= "GPRINT:mem_cache:MAX:\"%3.2lf %sB MAX \" ";
        $def[1] .= "GPRINT:mem_cache" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';


	# Memory Used
	$def[1] .= rrd::cdef("mem_used_tmp", "mem_used,mem_buffer,+");
	$def[1]	.= rrd::area("mem_used_tmp", "#3e606f", "Memory Used");

	$def[1] .= "GPRINT:mem_used:LAST:\"%3.2lf %sB LAST \" ";
	$def[1] .= "GPRINT:mem_used:MAX:\"%3.2lf %sB MAX \" ";
	$def[1] .= "GPRINT:mem_used" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';

	# Memory Buffer
	$def[1]	.= rrd::area("mem_buffer", "#FCFFF5", "Memory Buffer");

	$def[1] .= "GPRINT:mem_buffer:LAST:\"%3.2lf %sB LAST \" ";
        $def[1] .= "GPRINT:mem_buffer:MAX:\"%3.2lf %sB MAX \" ";
        $def[1] .= "GPRINT:mem_buffer" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';

	# Memory Total
	$def[1] .= rrd::line1("mem_total", "#000000", "Memory Total");

	$def[1] .= "GPRINT:mem_total:LAST:\"%3.2lf %sB LAST \" ";
        $def[1] .= "GPRINT:mem_total:MAX:\"%3.2lf %sB MAX \" ";
        $def[1] .= "GPRINT:mem_total" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';

	$ds_name[5] = "SWAP Usage";
        $opt[2] = "--vertical-label \"Bytes\" -l0 -b 1024 --title \"SWAP usage  for $hostname / $servicedesc\" ";

	# Total SWAP
        $def[2] = "DEF:swap_total=$RRDFILE[1]:$DS[5]:AVERAGE " ;

        # Used SWAP
        $def[2] .= "DEF:swap_used=$RRDFILE[1]:$DS[6]:AVERAGE " ;

	
	# SWAP used
	$def[2] .= rrd::area("swap_used", "#3E606F", "SWAP Used");

	$def[2] .= "GPRINT:swap_used:LAST:\"%3.2lf %sB LAST \" ";
        $def[2] .= "GPRINT:swap_used:MAX:\"%3.2lf %sB MAX \" ";
        $def[2] .= "GPRINT:swap_used" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';

	# SWAP Total
	$def[2] .= rrd::line1("swap_total", "#000000", "SWAP Total");

        $def[2] .= "GPRINT:swap_total:LAST:\"%3.2lf %sB LAST \" ";
        $def[2] .= "GPRINT:swap_total:MAX:\"%3.2lf %sB MAX \" ";
        $def[2] .= "GPRINT:swap_total" . ':AVERAGE:"%3.2lf %sB AVERAGE \j" ';	
	
?>
