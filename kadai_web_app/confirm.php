<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>入力内容確認</title>
    <style>
        .button-container {
            margin-top: 20px;
        }
        .button-container button, .button-container input {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h2>入力内容をご確認ください。</h2>

    <?php
    // フォームデータをPOSTから取得
    $name = isset($_POST['employee_name']) ? htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8') : '';
    $age = isset($_POST['employee_age']) ? htmlspecialchars($_POST['employee_age'], ENT_QUOTES, 'UTF-8') : '';
    $department = isset($_POST['department']) ? htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8') : '';

    // エラーチェック用の配列
    $errors = [];

    if (empty($name)) {
        $errors[] = '社員名が未入力です。';
    }

    if (empty($age) || !is_numeric($age)) {
        $errors[] = '年齢が正しく入力されていません。';
    }

    if (empty($department)) {
        $errors[] = '所属部署が選択されていません。';
    }
    ?>

    <?php if (!empty($errors)) : ?>
        <p>以下のエラーがあります。修正してください。</p>
        <?php foreach ($errors as $error) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endforeach; ?>
        <button onclick="history.back();">戻る</button>
    <?php else : ?>
        <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>

        <table border="1">
            <tr>
                <th>項目</th>
                <th>入力内容</th>
            </tr>
            <tr>
                <td>社員名</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>年齢</td>
                <td><?php echo $age; ?></td>
            </tr>
            <tr>
                <td>所属部署</td>
                <td><?php echo $department; ?></td>
            </tr>
        </table>

        <div class="button-container">
            <form action="complete.php" method="post" style="display: inline;">
                <input type="hidden" name="employee_name" value="<?php echo $name; ?>">
                <input type="hidden" name="employee_age" value="<?php echo $age; ?>">
                <input type="hidden" name="department" value="<?php echo $department; ?>">
                <input type="submit" value="確定">
            </form>
            <button type="button" onclick="history.back();">キャンセル</button>
        </div>
    <?php endif; ?>
</body>
</html>
