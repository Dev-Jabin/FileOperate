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

	//写入文件
	public function writeFile($file)
	{
		$handle = fopen($file, 'r');
		$content = fread($handle, filesize($file));
		$content = "hello File\n".$content;
		fclose($handle);
		// write
		$handle = fopen($file, 'w');
		fwrite($handle, $content);
		fclose($handle);
	}
}

$fileObj = new File();
$dir = 'test';
$fileObj -> loopDir($dir);
$file = 'test/test1/demo1.txt';
$fileObj -> writeFile($file);
