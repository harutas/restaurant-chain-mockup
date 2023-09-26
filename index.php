<?php
// コードベースのファイルのオートロード

use Helpers\RandomGenerator;

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
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$users = Helpers\RandomGenerator::users($min, $max);
$employee = Helpers\RandomGenerator::employee();
$restaurantLocation = Helpers\RandomGenerator::restaurantLocation()
// Test

// use Faker\Factory;
// use Models\Users\Employee;

// $faker = Factory::create();

// $employee = new Models\Users\Employee(
//   $faker->randomNumber(),
//   $faker->firstName(),
//   $faker->lastName(),
//   $faker->email,
//   $faker->password,
//   $faker->phoneNumber,
//   $faker->address,
//   $faker->dateTimeThisCentury,
//   $faker->dateTimeBetween('-10 years', '+20 years'),
//   $faker->randomElement(['admin', 'user', 'editor']),
//   "Chef",
//   120,
//   $faker->dateTimeThisCentury,
//   ["大賞", "金賞"]
// );
// echo $employee->toHTML();
// echo $employee->toString();
// echo $employee->toMarkdown();
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
  <h1>User Profiles</h1>

  <?php echo $employee->toHTML() ?>
  <?php echo $restaurantLocation->toHTML() ?>
  <?php foreach ($users as $user) : ?>
    <div class="user-card">
      <!-- ユーザー情報の表示 -->
      <?php echo $user->toHTML() ?>
    </div>
  <?php endforeach; ?>

</body>

</html>