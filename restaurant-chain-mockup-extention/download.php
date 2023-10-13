<?php
// コードベースのファイルのオートロード

use Models\Companies\RestaurantChain;

spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
  $base_dir = __DIR__ . "/src/";
  $file = $base_dir . str_replace("\\", "/", $class) . ".php";

  if (file_exists($file)) {
    require_once $file;
  }
});

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// POSTリクエストからパラメータを取得
$maxEmployees = $_POST["max-employees"];
$minEmployees = $_POST["min-employees"];

$maxSalary = $_POST["max-salary"];
$minSalary = $_POST["min-salary"];

$maxLocations = $_POST["max-locations"];
$minLocations = $_POST["min-locations"];

$format = $_POST["format"];

// is_null
if (is_null($maxEmployees) || is_null($minEmployees) || is_null($maxSalary) || is_null($minSalary) || is_null($maxLocations) || is_null($minLocations) || is_null($format)) {
  exit('Missing parameters.');
}

// is_numeric
if (!is_numeric($maxEmployees) || $maxEmployees < 1 || $maxEmployee > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($minEmployees) || $minEmployees < 1 || $minEmployee > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($maxSalary) || $maxSalary < 1 || $maxSalary > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($minSalary) || $minSalary < 1 || $minSalary > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($maxLocations) || $maxLocations < 1 || $maxLocations > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}
if (!is_numeric($minLocations) || $minLocations < 1 || $minLocations > 100) {
  exit('Invalid count. Must be a number between 1 and 100.');
}

// format_type
$allowedTypes = ['json', 'txt', 'html', 'md'];
if (!in_array($format, $allowedTypes)) {
  exit('Invalid type. Must be one of: ' . implode(', ', $allowedTypes));
}

$restaurantChains = Helpers\RandomGenerator::restaurantChains(1, 5, $minEmployees, $maxEmployees, $minSalary, $maxSalary, $minLocations, $maxLocations);

// generate
if ($format === 'md') {
  header('Content-Type: text/markdown');
  header('Content-Disposition: attachment; filename="restaurant-chain.md"');
  foreach ($restaurantChains as $restaurantChain) {
    echo $restaurantChain->toMarkdown();
  }
} elseif ($format === 'json') {
  header('Content-Type: application/json');
  header('Content-Disposition: attachment; filename="restaurant-chain.json"');
  $restaurantChainsArray = [];
  foreach ($restaurantChains as $restaurantChain) {
    $restaurantChainsArray[] = $restaurantChain->toArray();
  }
  echo json_encode($restaurantChainsArray);
} elseif ($format === 'txt') {
  header('Content-Type: text/plain');
  header('Content-Disposition: attachment; filename="restaurant-chain.txt"');
  foreach ($restaurantChains as $restaurantChain) {
    echo $restaurantChain->toString();
  }
} else {
  // HTMLをデフォルトに
  header('Content-Type: text/html');
  foreach ($restaurantChains as $restaurantChain) {
    echo $restaurantChain->toHTML();
  }
}
