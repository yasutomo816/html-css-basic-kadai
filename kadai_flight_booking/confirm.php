<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約確認</title>
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
            max-width: 700px;
            width: 100%;
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }

        .confirm-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f9f9f9;
            border-left: 4px solid #667eea;
            border-radius: 4px;
        }

        .confirm-section h3 {
            color: #667eea;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .confirm-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .confirm-row.full {
            grid-template-columns: 1fr;
        }

        .confirm-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .confirm-item:last-child {
            border-bottom: none;
        }

        .confirm-label {
            font-weight: bold;
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .confirm-value {
            color: #333;
            font-size: 16px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        button {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .back-btn {
            background: #e0e0e0;
            color: #333;
        }

        .back-btn:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        .price-summary {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-radius: 4px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }

        .price-summary h3 {
            color: #ff6b6b;
            margin-bottom: 10px;
            border: none;
        }

        .price-total {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .price-total .currency {
            font-size: 16px;
        }

        input[type="hidden"] {
            display: none;
        }

        .warning {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✈️ 予約確認</h1>

        <div class="warning">
            記入内容をご確認ください。修正がある場合は「戻る」ボタンをクリックしてください。
        </div>

        <?php
        // POSTデータの取得と安全な処理
        $departure = isset($_POST['departure']) ? htmlspecialchars($_POST['departure']) : '';
        $destination = isset($_POST['destination']) ? htmlspecialchars($_POST['destination']) : '';
        $departure_date = isset($_POST['departure_date']) ? htmlspecialchars($_POST['departure_date']) : '';
        $return_date = isset($_POST['return_date']) ? htmlspecialchars($_POST['return_date']) : '';
        $passengers = isset($_POST['passengers']) ? htmlspecialchars($_POST['passengers']) : '';
        $cabin_class = isset($_POST['cabin_class']) ? htmlspecialchars($_POST['cabin_class']) : '';
        $passenger_name = isset($_POST['passenger_name']) ? htmlspecialchars($_POST['passenger_name']) : '';
        $passenger_name_kana = isset($_POST['passenger_name_kana']) ? htmlspecialchars($_POST['passenger_name_kana']) : '';
        $passenger_name_en = isset($_POST['passenger_name_en']) ? htmlspecialchars($_POST['passenger_name_en']) : '';
        $birth_date = isset($_POST['birth_date']) ? htmlspecialchars($_POST['birth_date']) : '';
        $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
        $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
        $meal = isset($_POST['meal']) ? htmlspecialchars($_POST['meal']) : '';
        $seat = isset($_POST['seat']) ? htmlspecialchars($_POST['seat']) : '';

        // 料金計算（簡易計算）
        $base_price = 50000;
        if ($cabin_class === 'ビジネス') {
            $base_price = 150000;
        } elseif ($cabin_class === 'ファースト') {
            $base_price = 300000;
        }

        // 往復の場合
        if (!empty($return_date)) {
            $base_price = $base_price * 2;
        }

        $total_price = $base_price * intval($passengers);

        // 日付のフォーマット
        $dep_formatted = date('Y年m月d日', strtotime($departure_date));
        $ret_formatted = !empty($return_date) ? date('Y年m月d日', strtotime($return_date)) : 'なし';
        ?>

        <form method="post" action="complete.php">
            <!-- フライト情報 -->
            <div class="confirm-section">
                <h3>フライト情報</h3>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">出発地</div>
                        <div class="confirm-value"><?php echo $departure; ?></div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">到着地</div>
                        <div class="confirm-value"><?php echo $destination; ?></div>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">出発日</div>
                        <div class="confirm-value"><?php echo $dep_formatted; ?></div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">帰路日</div>
                        <div class="confirm-value"><?php echo $ret_formatted; ?></div>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">乗客数</div>
                        <div class="confirm-value"><?php echo $passengers; ?>名</div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">客室クラス</div>
                        <div class="confirm-value"><?php echo $cabin_class; ?></div>
                    </div>
                </div>
            </div>

            <!-- 乗客情報 -->
            <div class="confirm-section">
                <h3>乗客情報</h3>
                <div class="confirm-row full">
                    <div class="confirm-item">
                        <div class="confirm-label">乗客名（漢字）</div>
                        <div class="confirm-value"><?php echo $passenger_name; ?></div>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">乗客名（カナ）</div>
                        <div class="confirm-value"><?php echo $passenger_name_kana; ?></div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">乗客名（ローマ字）</div>
                        <div class="confirm-value"><?php echo $passenger_name_en; ?></div>
                    </div>
                </div>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">生年月日</div>
                        <div class="confirm-value"><?php echo $birth_date; ?></div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">性別</div>
                        <div class="confirm-value"><?php echo $gender; ?></div>
                    </div>
                </div>
            </div>

            <!-- 連絡先情報 -->
            <div class="confirm-section">
                <h3>連絡先情報</h3>
                <div class="confirm-row full">
                    <div class="confirm-item">
                        <div class="confirm-label">メールアドレス</div>
                        <div class="confirm-value"><?php echo $email; ?></div>
                    </div>
                </div>
                <div class="confirm-row full">
                    <div class="confirm-item">
                        <div class="confirm-label">電話番号</div>
                        <div class="confirm-value"><?php echo $phone; ?></div>
                    </div>
                </div>
                <div class="confirm-row full">
                    <div class="confirm-item">
                        <div class="confirm-label">住所</div>
                        <div class="confirm-value"><?php echo $address; ?></div>
                    </div>
                </div>
            </div>

            <!-- 特別要望 -->
            <div class="confirm-section">
                <h3>特別要望</h3>
                <div class="confirm-row">
                    <div class="confirm-item">
                        <div class="confirm-label">食事リクエスト</div>
                        <div class="confirm-value"><?php echo $meal; ?></div>
                    </div>
                    <div class="confirm-item">
                        <div class="confirm-label">座席希望</div>
                        <div class="confirm-value"><?php echo $seat; ?></div>
                    </div>
                </div>
            </div>

            <!-- 料金情報 -->
            <div class="price-summary">
                <h3>料金</h3>
                <div class="price-total">
                    <span class="currency">¥</span><?php echo number_format($total_price); ?>
                </div>
                <small style="color: #666; margin-top: 10px; display: block;">
                    ※ 税金・諸手数料は別途必要な場合があります。
                </small>
            </div>

            <!-- 隠しフィールドでデータを保持 -->
            <input type="hidden" name="departure" value="<?php echo $departure; ?>">
            <input type="hidden" name="destination" value="<?php echo $destination; ?>">
            <input type="hidden" name="departure_date" value="<?php echo $departure_date; ?>">
            <input type="hidden" name="return_date" value="<?php echo $return_date; ?>">
            <input type="hidden" name="passengers" value="<?php echo $passengers; ?>">
            <input type="hidden" name="cabin_class" value="<?php echo $cabin_class; ?>">
            <input type="hidden" name="passenger_name" value="<?php echo $passenger_name; ?>">
            <input type="hidden" name="passenger_name_kana" value="<?php echo $passenger_name_kana; ?>">
            <input type="hidden" name="passenger_name_en" value="<?php echo $passenger_name_en; ?>">
            <input type="hidden" name="birth_date" value="<?php echo $birth_date; ?>">
            <input type="hidden" name="gender" value="<?php echo $gender; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="phone" value="<?php echo $phone; ?>">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <input type="hidden" name="meal" value="<?php echo $meal; ?>">
            <input type="hidden" name="seat" value="<?php echo $seat; ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

            <div class="button-group">
                <button type="button" class="back-btn" onclick="history.back()">戻る</button>
                <button type="submit" class="submit-btn">予約を確定する</button>
            </div>
        </form>
    </div>
</body>
</html>
