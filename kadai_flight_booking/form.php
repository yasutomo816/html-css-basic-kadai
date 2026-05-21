<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>航空券予約フォーム</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #667eea;
            font-size: 18px;
            margin-bottom: 15px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="tel"]:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-row.full {
            grid-template-columns: 1fr;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 20px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-group label {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            cursor: pointer;
        }

        .radio-group input[type="radio"] {
            margin-right: 8px;
            cursor: pointer;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✈️ 航空券予約システム</h1>

        <form action="confirm.php" method="post">
            <!-- 出発地・到着地セクション -->
            <div class="form-section">
                <h3>出発地・到着地</h3>

                <div class="form-group">
                    <label for="departure">出発地:</label>
                    <select id="departure" name="departure" required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="東京(羽田)">東京(羽田)</option>
                        <option value="大阪(関西)">大阪(関西)</option>
                        <option value="名古屋(中部)">名古屋(中部)</option>
                        <option value="福岡">福岡</option>
                        <option value="札幌(新千歳)">札幌(新千歳)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="destination">到着地:</label>
                    <select id="destination" name="destination" required>
                        <option value="" disabled selected>選択してください</option>
                        <option value="東京(羽田)">東京(羽田)</option>
                        <option value="大阪(関西)">大阪(関西)</option>
                        <option value="名古屋(中部)">名古屋(中部)</option>
                        <option value="福岡">福岡</option>
                        <option value="札幌(新千歳)">札幌(新千歳)</option>
                        <option value="沖縄(那覇)">沖縄(那覇)</option>
                    </select>
                </div>
            </div>

            <!-- 日付・乗客セクション -->
            <div class="form-section">
                <h3>日付・乗客情報</h3>

                <div class="form-row">
                    <div class="form-group">
                        <label for="departure_date">出発日:</label>
                        <input type="date" id="departure_date" name="departure_date" required>
                    </div>

                    <div class="form-group">
                        <label for="return_date">帰路日 (片道の場合は不要):</label>
                        <input type="date" id="return_date" name="return_date">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="passengers">乗客数:</label>
                        <input type="number" id="passengers" name="passengers" min="1" max="9" value="1" required>
                    </div>

                    <div class="form-group">
                        <label for="cabin_class">客室クラス:</label>
                        <select id="cabin_class" name="cabin_class" required>
                            <option value="エコノミー">エコノミー</option>
                            <option value="ビジネス">ビジネス</option>
                            <option value="ファースト">ファースト</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 乗客情報セクション -->
            <div class="form-section">
                <h3>主要乗客情報</h3>

                <div class="form-group">
                    <label for="passenger_name">乗客名 (漢字):</label>
                    <input type="text" id="passenger_name" name="passenger_name" placeholder="山田太郎" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="passenger_name_kana">乗客名 (カナ):</label>
                        <input type="text" id="passenger_name_kana" name="passenger_name_kana" placeholder="ヤマダタロウ" required>
                    </div>

                    <div class="form-group">
                        <label for="passenger_name_en">乗客名 (ローマ字):</label>
                        <input type="text" id="passenger_name_en" name="passenger_name_en" placeholder="YAMADA TARO" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birth_date">生年月日:</label>
                        <input type="date" id="birth_date" name="birth_date" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">性別:</label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>選択してください</option>
                            <option value="男性">男性</option>
                            <option value="女性">女性</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- 連絡先セクション -->
            <div class="form-section">
                <h3>連絡先情報</h3>

                <div class="form-group">
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email" placeholder="example@example.com" required>
                </div>

                <div class="form-group">
                    <label for="phone">電話番号:</label>
                    <input type="tel" id="phone" name="phone" placeholder="09012345678" required>
                </div>

                <div class="form-group">
                    <label for="address">住所:</label>
                    <input type="text" id="address" name="address" placeholder="東京都渋谷区..." required>
                </div>
            </div>

            <!-- 特別要望セクション -->
            <div class="form-section">
                <h3>特別要望</h3>

                <div class="form-group">
                    <label>食事リクエスト:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="meal" value="なし" checked>
                            なし
                        </label>
                        <label>
                            <input type="radio" name="meal" value="ベジタリアン">
                            ベジタリアン
                        </label>
                        <label>
                            <input type="radio" name="meal" value="その他">
                            その他
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>座席希望:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="seat" value="窓側" checked>
                            窓側
                        </label>
                        <label>
                            <input type="radio" name="seat" value="通路側">
                            通路側
                        </label>
                        <label>
                            <input type="radio" name="seat" value="中央">
                            中央
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit">確認画面へ進む</button>
        </form>
    </div>
</body>
</html>
