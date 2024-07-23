<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Sample Page</title>
</head>
<body>
    <p>
        <?php
        // 合計点と平均点を算出するための変数を定義
        $sum = 0;
        // 数字の数
        $count = 5;

        // 各計算結果
        $result1 = 80 + 60;
        $result2 = 55 + 40;
        $result3 = 100 + 25;
        $result4 = 80 + 95;
        $result5 = 30 + 60;

        // 合計点を計算
        $sum = $result1 + $result2 + $result3 + $result4 + $result5;

        // 平均点を計算
        $average = $sum / $count;

        // 各計算結果を表示
        echo $result1;
        echo "<br>";
        echo $result2;
        echo "<br>";
        echo $result3;
        echo "<br>";
        echo $result4;
        echo "<br>";
        echo $result5;
        echo "<br>";

        // 合計点と平均点を表示
        echo "合計点: " . $sum . "<br>";
        echo "平均点: " . $average . "<br>";
        ?>
    </p>
</body>

</html>
