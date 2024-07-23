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
        $score1 = 80 + 60;
        $score2 = 55 + 40;
        $score3 = 100 + 25;
        $score4 = 80 + 95;
        $score5 = 30 + 60;

        // 合計点を計算
        $sum = $score1 + $score2 + $score3 + $score4 + $score5;

        // 平均点を計算
        $average = $sum / $count;

        // 各計算結果を表示
        echo $score1;
        echo "<br>";
        echo $score2;
        echo "<br>";
        echo $score3;
        echo "<br>";
        echo $score4;
        echo "<br>";
        echo $score5;
        echo "<br>";

        // 合計点と平均点を表示
        echo "合計点: " . $sum . "<br>";
        echo "平均点: " . $average . "<br>";
        ?>
    </p>
</body>

</html>
