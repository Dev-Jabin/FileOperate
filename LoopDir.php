<?php

/**
 * @Author: Jabin
 * @Date:   2019-06-06
 * @Email:  jpyan2906@gmail.com
 */

function loopDir($dir)
{
	$handle = opendir($dir);

	while (($file = readdir($handle))!==false) {
		if ($file !== '.' && $file!== '..') {
			echo "$file\n";
			if (filetype($dir.'/'.$file)=='dir') {
				loopDir($dir.'/'.$file);
			}
		}
	}
}
$dir = 'test';
loopDir($dir);