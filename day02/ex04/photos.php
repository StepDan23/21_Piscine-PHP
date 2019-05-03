#! /usr/bin/php
<?php
	function get_imgs_url($code, $site)
	{
		if ((preg_match_all('/<img.*?src[ \t]*=[ \t]*"[ \t]*(.*?)[ \t]*".*?>/i', $code, $img_links) !== false))
		{
			if (count($img_links[0]) == 0)
				exit ("There is no images on ".$site[0]."\n");
			foreach($img_links[1] as $j => $img)
				if (!(preg_match("'^(https|http):[/]'i", $img)))
					$img_links[1][$j] = $site[1].$site[2].$img;
			return ($img_links);
		}
		return (false);
	}

	function download_imgs($folder, $links)
	{
		foreach ($links as $url)
		{
			preg_match("'.*[/]+(.*?[.]\w{1,10})$'", $url, $name);
			if (count($name) > 0)
			{
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				if (($img = curl_exec($ch)) === false)
					exit ("Error: ".curl_error($ch)."\n");
				curl_close($ch);
				$fd = fopen($folder."/".$name[1], "w");
				fwrite($fd, $img);
				fclose($fd);
			}
		}
	}

	if ($argc > 1)
	{
		if (!(preg_match("'^(http[s]{0,1}:[/]{2})([w]{3}[.]\w+[.]\w{1,12})$'i", $argv[1], $site)))
			exit ("Wrong Site Format");
		$ch = curl_init($site[0]);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (($code = curl_exec($ch)) === false)
			exit ("Error: ".curl_error($ch)."\n");
		curl_close($ch);
		if (($img_links = get_imgs_url($code, $site)) !== false)
		{
			if (file_exists($site[2]) === false)
					mkdir($site[2]);
			else if (file_exists($site[2]) && !is_dir($site[2]))
				exit ("Couldn't make folder ".$site[2]."/, file with this name already exists\n");
			download_imgs($site[2], $img_links[1]);
		}
	}
?>