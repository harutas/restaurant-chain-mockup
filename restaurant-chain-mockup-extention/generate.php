<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <title>Generate Users</title>
</head>

<body>
  <div class="container">

    <form action="download.php" method="post">
      <!-- チェーンが持つ従業員の数を選択 -->
      <div class="row w-50 my-3">
        <p class="fs-5 mb-0">Number of employee range:</p>
        <div class="col">
          <label for="max-employees">
            Max:</label>
          <input class="form-control" type="number" id="max-employees" name="max-employees" min="1" max="100" value="10">
        </div>
        <div class="col">
          <label for="min-employees">
            Min:</label>
          <input class="form-control" type="number" id="min-employees" name="min-employees" min="1" max="100" value="10">
        </div>
      </div>

      <!-- 従業員の給与範囲を選択 -->
      <div class="row w-50 my-3">
        <p class="fs-5 mb-0">Employee salary range:</p>
        <div class="col">
          <label for="max-salary">Max:</label>
          <input class="form-control" type="number" id="max-salary" name="max-salary" min="1" max="100" value="50">
        </div>
        <div class="col">
          <label for="min-salary">Min:</label>
          <input class="form-control" type="number" id="min-salary" name="min-salary" min="1" max="100" value="50">
        </div>
      </div>

      <!-- 場所の数を入力 -->
      <div class="row w-50 my-3">
        <p class="fs-5 mb-0">Number of locations:</p>
        <div class="col">
          <label for="max-locations">Max:</label>
          <input class="form-control" type="number" id="max-locations" name="max-locations" min="1" max="100" value="5">
        </div>
        <div class="col">
          <label for="min-locations">Min:</label>
          <input class="form-control" type="number" id="min-locations" name="min-locations" min="1" max="100" value="5">
        </div>
      </div>

      <!-- 生成したいファイルのタイプを選択: HTML、JSON、TXT、または MarkDown -->
      <div class="row w-50 my-3">

        <div class="col">
          <label class="fs-5" for="format">Download Format:</label>
          <select class="form-select" id="format" name="format">
            <option value="html">HTML</option>
            <option value="md">Markdown</option>
            <option value="json">JSON</option>
            <option value="txt">Text</option>
          </select>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-primary">Generate</button>
        </div>
      </div>
    </form>
  </div>
  <!-- TODO: 場所の郵便番号の範囲を設定 -->
</body>

</html>