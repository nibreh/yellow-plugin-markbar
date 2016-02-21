<?php
// jQuery.Markbar by reinink - https://github.com/reinink/jQuery.Markbar
// This file may be used and distributed under the terms of the public license.
class YellowMarkbar
{
 	const Version = "0.0.2";
	var $yellow;		//access to API

	// Handle initialisation
	function onLoad($yellow)
	{
    	$this->yellow = $yellow;
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name == "header")
		{
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}markbar/jquery.markbar.js\"></script>\n";
			$output .= "<link rel=\"stylesheet\" href=\"{$pluginLocation}markbar/themes/default/default.css\">\n";
		}
		if($name == "footer")
		{
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$output .= "<script  type=\"text/javascript\" src=\"{$pluginLocation}markbar/function.markbar.js\"></script>\n";
		}
        	return $output;
    	}
}
$yellow->plugins->register("markbar", "YellowMarkbar", YellowMarkbar::Version);
?>


