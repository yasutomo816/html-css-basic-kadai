<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社員情報入力フォーム</title>
</head>
<!-- form.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>社員情報入力フォーム</title>
</head>
<body>
    <h2>社員情報入力フォーム</h2>

    <form action="confirm.php" method="post">
        <!-- 社員名入力フィールド -->
        <label for="employee_name">社員名:</label>
        <input type="text" id="employee_name" name="employee_name" placeholder="社員名を入力" required>
        <br><br>

        <!-- 年齢入力フィールド -->
        <label for="employee_age">年齢:</label>
        <input type="number" id="employee_age" name="employee_age" placeholder="年齢を入力" required>
        <br><br>

        <!-- 所属部署選択フィールド -->
        <label for="department">所属部署:</label>
        <select id="department" name="department" required>
            <option value="" disabled selected>開発部</option>
            <option value="開発部">開発部</option>
            <option value="営業部">営業部</option>
            <option value="人事部">人事部</option>
        </select>
        <br><br>

        <input type="submit" value="確認画面へ">
    </form>
</body>
