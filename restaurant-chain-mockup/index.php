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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>User Profiles</title>
  <!-- <link rel="stylesheet" href="css\styles.css"> -->
</head>

<body>
  <div class="container">
    <?php foreach ($restaurantChains as $restaurantChain) : ?>
      <div class="my-5">

        <h1 class="text-center">Restaurant Chain <?php echo $restaurantChain->getName() ?></h1>
        <div class="border border-secondary-subtle">
          <h2 class="w-100 bg-secondary-subtle fs-3 mb-0 p-2">Restaurant Chain Information</h2>

          <div class="px-3">
            <!-- アコーディオン -->
            <?php foreach ($restaurantChain->getRestaurantLocations() as $restaurantLocation) : ?>
              <div class="accordion my-3" id=<?php echo $restaurantChain->getChainId() ?>>
                <div class="accordion-item">
                  <!-- ヘッダ -->
                  <h2 class="accordion-header">
                    <button class="accordion-button fs-5 fw-semi" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $restaurantLocation->getId() ?>" aria-expanded="true" aria-controls=<?php echo $restaurantLocation->getId() ?>>
                      <?php echo $restaurantLocation->getName() ?>
                    </button>
                  </h2>
                  <!-- ボディ -->
                  <div id=<?php echo $restaurantLocation->getId() ?> class="accordion-collapse collapse show" data-bs-parent="#<?php echo $restaurantChain->getChainId() ?>">
                    <div class="accordion-body">
                      <p class="fs-6 fw-bolder"><?php echo "Company Name: " . $restaurantLocation->getName() . ", " . "Address: " . $restaurantLocation->getAddress() . ", " . $restaurantLocation->getCity() . ", " . $restaurantLocation->getState() . ", " . "ZipCode: " . $restaurantLocation->getZipCode() ?></p>
                      <hr>
                      <p class="fs-5 fw-bolder">Employees:</p>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Name</th>
                            <th scope="col">Start Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($restaurantLocation->getEmployees() as $employee) : ?>
                            <tr>
                              <th scope="row"><?php echo $employee->getId() ?></th>
                              <td><?php echo $employee->getJobTitle() ?></td>
                              <td><?php echo $employee->getFirstName() . " " . $employee->getLastName() ?></td>
                              <td><?php echo $employee->getStartDate() ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>