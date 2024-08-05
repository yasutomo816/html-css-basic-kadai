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
            'name' => '玉ねぎ', 
            'price' => '200',
             'location' => '北海道'
        ];

        // キーを日本語にマッピング
        $key_mapping = [
            'name' => '名前',
            'price' => '値段',
            'location' => '産地'
        ];

        foreach ($personal_date as $key => $value) {
            // マッピングを用いて表示
            echo "{$key_mapping[$key]}: {$value}. <br>";
        }
        ?>
    </p>
</body>

</html>
