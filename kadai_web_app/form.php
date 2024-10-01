<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <title>PHP基礎編</title>
 </head>
 
<body>
    <h2>社員情報入力</h2>
    <form action= "confirm.php" method="post">
        <table>
            <tr>
                <td>社員名</td>
                <td>
                    <input type="text" name="user_name" value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : ''; ?>">
                </td>
           </tr>
           <tr>
                 <td>年齢</td>
                 <td>
                    <input type="text" name="user_age" value="<?php echo isset($_COOKIE['age']) ? $_COOKIE['age'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>所属部署</td>
                <td>
                <form action="submit.php" method="post">
               <label for="department"></label>
               <select name="department" id="department">
               <option value="department">開発部</option>
               <option value="department">営業部</option>
               <option value="department">人事部</option>
            </select>
             </form>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
        </table><input type="submit" value="送信">
    </form>
</body>

</html>