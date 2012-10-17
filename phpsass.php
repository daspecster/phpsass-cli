<?php


    if (($library_path = dirname(__FILE__)) && file_exists($library_path . '/SassParser.php')) {
      $phpsass_library_path = $library_path;
    }

    if (isset($phpsass_library_path)) {
	 require_once($phpsass_library_path . '/SassParser.php');
    }
    else {
      throw new Exception('Could not find PHPSass compiler.');
    }




$file = getopt("f:");
$file = $file['f'];

$options = array(
        'style' => 'expanded',
        'cache' => FALSE,
        'syntax' => $syntax,
        'debug' => FALSE,
        'callbacks' => array(
                'warn' => 'warn',
                'debug' => 'debug'
        ),
);

// Execute the compiler.

$parser = new SassParser($options);
try {
        //$result = $parser->toCss($file['f']);
        print $parser->toCss($file);
} catch (Exception $e) {
        print $e->getMessage();
}
