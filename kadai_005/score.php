<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Sample Page</title>
</head>
<body>
    <p>
        <?php
        // スコアを定義
        $score1 = 80;
        $score2 = 60;
        $score3 = 55;
        $score4 = 40;
        $score5 = 100;
        $score6 = 25;
        $score7 = 80;
        $score8 = 95;
        $score9 = 30;
        $score10 = 60;

        // 合計点を計算
        $sum = $score1 + $score2 + $score3 + $score4 + $score5 + $score6 + $score7 + $score8 + $score9 + $score10;

        // 数字の数
        $count = 10;

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
        echo $score6;
        echo "<br>";
        echo $score7;
        echo "<br>";
        echo $score8;
        echo "<br>";
        echo $score9;
        echo "<br>";
        echo $score10;
        echo "<br>";

        // 合計点と平均点を表示
        echo "合計点: " . $sum . "<br>";
        echo "平均点: " . $average . "<br>";
        ?>
    </p>
</body>

</html>
