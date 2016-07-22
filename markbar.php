<?php
// jQuery.Markbar by reinink - https://github.com/reinink/jQuery.Markbar
// This file may be used and distributed under the terms of the public license.

// Markbar plugin by nibreh, thanks to Datenstrom
// Markbar is a markdown toolbar by Reinink - https://github.com/reinink/jQuery.Markbar
class YellowMarkbar
{
	const Version = "0.0.3";
	var $yellow;		//access to API

	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		if(!$this->yellow->config->isExisting("jqueryCdn"))
		{
			$this->yellow->config->setDefault("jqueryCdn", "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/");
		}
	}

	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name=="header" && $this->yellow->getRequestHandler()=="webinterface")
		{
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$jqueryCdn = $this->yellow->config->get("jqueryCdn");
			$output .= "<script type=\"text/javascript\" src=\"{$jqueryCdn}jquery.min.js\"></script>\n";
			$output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}markbar/jquery.markbar.js\"></script>\n";
			$output .= "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginLocation}markbar/themes/default/default.css\">\n";
			$output .= "<script type=\"text/javascript\">\n";
			$output .= "\$(function(){\$('textarea').markbar();});";
			$output .= "</script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("markbar", "YellowMarkbar", YellowMarkbar::Version);
?>
