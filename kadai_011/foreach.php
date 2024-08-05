<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <title>kadai_011</title>
 </head>
 
 <body>
     <p>
        <?php
        $personal_date = [
            '名前' => '玉ねぎ', 
            '値段' => '200',
            '産地' => '北海道'
        ];

        foreach ($personal_date as $key => $value) {
            echo "キー:{$key}, 値: {$value} <br>"; 
        }
        ?>
    </p>
</body>

</html>
