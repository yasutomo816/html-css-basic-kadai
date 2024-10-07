<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
    <?php

function sort_2way($array, $order) {
    if ($order) {
        sort($array); // 昇順ソート
    } else {
        rsort($array); // 降順ソート
    }

    // foreach文でソート結果を1行ずつ表示
    foreach ($array as $num) {
        echo $num . "<br>";
    }
}

        // ソートする配列を宣言
        $nums = [15, 4, 18, 23, 10];

        // 昇順ソート
        echo "昇順ソート:<br>";
        sort_2way($nums, true);

        // 降順ソート
        echo "降順ソート:<br>";
        sort_2way($nums, false);
        ?>
    </p>
</body>

</html>