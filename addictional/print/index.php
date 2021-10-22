<?php
require_once "options.php";

function read_folder($folder)
{
	$files = scandir($folder);
	$out = [];
	foreach($files as $file)
	{
		if ($file == '.' || $file == '..') continue;
		$fullfilename = $folder . '/' . $file;
		if (is_dir($fullfilename))
			$out = array_merge($out, read_folder($fullfilename));
			else
				array_push($out, $fullfilename);
	}
	return $out;
}

$sources = read_folder("../data-for-print");
$files = [];
foreach ($sources as $source)
{
	$matches = [];
	preg_match('#^../data-for-print/(.*)$#', $source, $matches);
	$name = $matches[1];
	$files = array_merge($files, [
		$name => $source
	]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Практическая по ПиРВП</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main>
		
		<div>
			<h1>Файлы</h1>
			<?php
			foreach ($files as $key => $val)
			{
				if (in_array($val, $listIgnoreFiles))
				{
					continue;
				}
				$code = file_get_contents($val);
				$code = htmlspecialchars($code);
				?>
				<h2><?=$key?></h2>
				<pre><?=$code?></pre>
				<?php
			}
			?>
		</div>
	</main>
</body>
</html>