<?php

/**
 * @Author: Jabin
 * @Date:   2019-06-06
 * @Email:  jpyan2906@gmail.com
 */
class File
{
	public function loopDir($dir)
	{
		$handle = opendir($dir);

		while (($file = readdir($handle))!==false) {
			if ($file !== '.' && $file!== '..') {
				echo "$file\n";
				if (filetype($dir.'/'.$file)=='dir') {
					$this->loopDir($dir.'/'.$file);
				}
			}
		}
	}
}

$fileObj = new File();
$dir = 'test';
$fileObj -> loopDir($dir);