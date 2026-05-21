<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約完了</title>
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
            text-align: center;
        }

        .success-icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: bounce 1s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        h1 {
            color: #2ecc71;
            margin-bottom: 15px;
            font-size: 32px;
        }

        .subtitle {
            color: #666;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .booking-info {
            background: #f9f9f9;
            border-left: 4px solid #2ecc71;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 4px;
            text-align: left;
        }

        .booking-info h3 {
            color: #2ecc71;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .booking-detail {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .booking-detail:last-child {
            border-bottom: none;
        }

        .booking-detail-label {
            font-weight: bold;
            color: #666;
        }

        .booking-detail-value {
            color: #333;
        }

        .booking-number {
            background: #e3f2fd;
            border: 2px solid #2196f3;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            font-size: 18px;
        }

        .booking-number-label {
            font-weight: bold;
            color: #1976d2;
            margin-bottom: 8px;
        }

        .booking-number-value {
            font-family: 'Courier New', monospace;
            font-size: 24px;
            color: #0d47a1;
            letter-spacing: 2px;
        }

        .instructions {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            text-align: left;
            font-size: 14px;
            color: #856404;
        }

        .instructions h4 {
            margin-bottom: 10px;
            color: #ff6b6b;
        }

        .instructions ul {
            margin-left: 20px;
        }

        .instructions li {
            margin-bottom: 8px;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        a {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .primary-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .secondary-btn {
            background: #e0e0e0;
            color: #333;
        }

        .secondary-btn:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        .confirmation-email {
            background: #e8f5e9;
            border: 1px solid #4caf50;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
            font-size: 14px;
            color: #2e7d32;
        }

        @media print {
            body {
                background: white;
            }

            .button-group {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✅</div>

        <h1>予約が完了しました！</h1>
        <p class="subtitle">ご予約ありがとうございます</p>

        <?php
        // POSTデータの取得
        $departure = isset($_POST['departure']) ? htmlspecialchars($_POST['departure']) : '情報なし';
        $destination = isset($_POST['destination']) ? htmlspecialchars($_POST['destination']) : '情報なし';
        $departure_date = isset($_POST['departure_date']) ? htmlspecialchars($_POST['departure_date']) : '情報なし';
        $return_date = isset($_POST['return_date']) ? htmlspecialchars($_POST['return_date']) : '';
        $passengers = isset($_POST['passengers']) ? htmlspecialchars($_POST['passengers']) : '情報なし';
        $cabin_class = isset($_POST['cabin_class']) ? htmlspecialchars($_POST['cabin_class']) : '情報なし';
        $passenger_name = isset($_POST['passenger_name']) ? htmlspecialchars($_POST['passenger_name']) : '情報なし';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '情報なし';
        $total_price = isset($_POST['total_price']) ? htmlspecialchars($_POST['total_price']) : '0';

        // 予約番号を生成
        $booking_number = 'JL' . date('Ymd') . strtoupper(substr(md5(uniqid()), 0, 6));

        // 日付のフォーマット
        $dep_formatted = date('Y年m月d日', strtotime($departure_date));
        $ret_formatted = !empty($return_date) ? date('Y年m月d日', strtotime($return_date)) : 'なし';
        $trip_type = empty($return_date) ? '片道' : '往復';
        ?>

        <div class="booking-number">
            <div class="booking-number-label">ご予約番号</div>
            <div class="booking-number-value"><?php echo $booking_number; ?></div>
        </div>

        <div class="booking-info">
            <h3>📋 ご予約内容</h3>

            <div class="booking-detail">
                <span class="booking-detail-label">旅行タイプ</span>
                <span class="booking-detail-value"><?php echo $trip_type; ?></span>
            </div>

            <div class="booking-detail">
                <span class="booking-detail-label">ルート</span>
                <span class="booking-detail-value"><?php echo $departure; ?> → <?php echo $destination; ?></span>
            </div>

            <div class="booking-detail">
                <span class="booking-detail-label">出発日</span>
                <span class="booking-detail-value"><?php echo $dep_formatted; ?></span>
            </div>

            <?php if (!empty($return_date)): ?>
            <div class="booking-detail">
                <span class="booking-detail-label">帰路日</span>
                <span class="booking-detail-value"><?php echo $ret_formatted; ?></span>
            </div>
            <?php endif; ?>

            <div class="booking-detail">
                <span class="booking-detail-label">乗客数</span>
                <span class="booking-detail-value"><?php echo $passengers; ?>名</span>
            </div>

            <div class="booking-detail">
                <span class="booking-detail-label">客室クラス</span>
                <span class="booking-detail-value"><?php echo $cabin_class; ?></span>
            </div>

            <div class="booking-detail">
                <span class="booking-detail-label">主要乗客</span>
                <span class="booking-detail-value"><?php echo $passenger_name; ?></span>
            </div>

            <div class="booking-detail">
                <span class="booking-detail-label">合計料金</span>
                <span class="booking-detail-value"><strong>¥<?php echo number_format($total_price); ?></strong></span>
            </div>
        </div>

        <div class="confirmation-email">
            📧 ご予約確認メールを<strong><?php echo $email; ?></strong>に送信いたします。
        </div>

        <div class="instructions">
            <h4>重要なお知らせ</h4>
            <ul>
                <li>ご予約番号をお控えください。チェックイン時に必要です。</li>
                <li>航空券は予約日より7日以内にお支払いください。</li>
                <li>出発の24時間前からオンラインチェックインが可能です。</li>
                <li>変更・キャンセルはご予約番号で管理画面からお手続きください。</li>
                <li>ターミナルは出発の3時間前にご到着ください。</li>
            </ul>
        </div>

        <div class="button-group">
            <a href="form.php" class="secondary-btn">新規予約</a>
            <a href="#" class="primary-btn" onclick="window.print(); return false;">印刷</a>
        </div>
    </div>
</body>
</html>
