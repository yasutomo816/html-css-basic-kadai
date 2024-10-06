<!-- complete.php -->
<?php
// POSTから送信されたデータを受け取る
$name = isset($_POST['employee_name']) ? htmlspecialchars($_POST['employee_name'], ENT_QUOTES, 'UTF-8') : '';
$age = isset($_POST['employee_age']) ? htmlspecialchars($_POST['employee_age'], ENT_QUOTES, 'UTF-8') : '';
$department = isset($_POST['department']) ? htmlspecialchars($_POST['department'], ENT_QUOTES, 'UTF-8') : '';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>送信完了</title>
</head>
<body>
    <h2>登録が完了しました。</h2>

    <p>社員名: <?php echo $name; ?></p>
    <p>年齢: <?php echo $age; ?></p>
    <p>所属部署: <?php echo $department; ?></p>
</body>
</html>