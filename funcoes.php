<?php
	function converterDataGravar($data) {
   		(!strstr($data,'/')) ? sscanf($data,'%d-%d-%d',$y,$m,$d) : sscanf($data,'%d/%d/%d',$d,$m,$y);
   		
   		return (!strstr($data,'/')) ? sprintf('%d/%d/%d',$d,$m,$y) : sprintf('%d-%d-%d',$y,$m,$d);
	}	
?>