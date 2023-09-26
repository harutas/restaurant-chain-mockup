<?php
// コードベースのファイルのオートロード

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

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 1;
$max = $_GET['max'] ?? 5;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$restaurantChains = Helpers\RandomGenerator::restaurantChains($min, $max);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profiles</title>
  <!-- <link rel="stylesheet" href="css\styles.css"> -->
</head>

<body>
  <?php foreach ($restaurantChains as $restaurantChain) : ?>
    <h1>Restaurant Chain <?php echo $restaurantChain->getName() ?></h1>
  <?php endforeach; ?>

</body>

</html>