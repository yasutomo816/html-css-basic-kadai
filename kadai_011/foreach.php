<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <title>kadai_011</title>
 </head>
 
 <body>
     <p>
        <?php
        $personal_date = ['name' => '玉ねぎ', 'price' => '200', 'location' => '北海道'];

        foreach ($personal_date as $value) {
            echo $value . '<br>';
        }
        ?>
    </p>
</body>

</html>
