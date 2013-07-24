<?php
header('Content-Type: text/html; charset=utf-8');
/* куда будет записываться лог приложения */
define('LOG_FILE', 'log.txt');

/* реализация __autoload */
function loadClass($class) {
    $filename = str_replace( '_', DIRECTORY_SEPARATOR, $class ).'.php';
    if( file_exists($filename) ) {
        require_once($filename);
    }
}
spl_autoload_register('loadClass');

/* получение имени вызывающего класса для лога */
function get_calling_class() {
  $trace = debug_backtrace();
  $class = $trace[1]['class'];
  for ( $i=1; $i<count( $trace ); $i++ ) {
    if ( isset( $trace[$i] ) ) {
      if ( $class != $trace[$i]['class'] ) {
        return $trace[$i]['class'];
      }
    }
  }
}

// очищаем файл автоматически, если он превысит 2730 байт
// формируем ссылку на очистку log-файла
if ( filesize(LOG_FILE) >= 2730 || (isset($_GET['clog']) && (int)$_GET['clog'] === 1) ) {
  file_put_contents(LOG_FILE, '');
}
echo "menu: <a href='?clog=1'>очистить log-файл</a>";

// Application

$names = array(
	'Tim  Wagner',
	'Yaroslav Rogoza',
	'Alexander Turyak',
	'Viacheslav Kravchuk'
);

$example = new Atwix_Example($names);

printf("<h3>отсортированный список имен в одну строку:</h3><p>%s</p>",
  $example->renderNamesSorted()
);

printf("<h3>содержимое log-файла приложения (%s):</h3><pre>%s</pre>",
  LOG_FILE,
  file_get_contents(LOG_FILE)
);
