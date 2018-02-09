<!-- File: /app/View/Posts/calendar.ctp -->

<h1>calendar</h1>
<html>
<head>
    <title>練習用</title>
</head>

    <table border="1" cellpadding="1">
        <?php 
            if(!$schedule) {
                return;
            }
            $date = $schedule['Schedule']['date'];
            $y = date('Y', strtotime($date));
            $m = date('m', strtotime($date));
            //$today = date('d', strtotime($schedule['Schedule']['date']));

             // 1日の曜日を取得
            $wd1 = date("w", mktime(0, 0, 0, $m, 1, $y));
            // その数だけ空白を表示
            for ($i = 1; $i <= $wd1; $i++) {
                echo "<td>　</td>";
            }
            
            $d = 1;
            // checkdate 月、日、年を入れてそれが存在(有効)であればtrue(例：2/30はfalseを返す)
            while (checkdate($m, $d, $y)) {
                echo "<td>";
                // 'action' => 'schedule', $d...controllで定義しているscheduleの引数に$dを渡している
                echo $this->Html->link(
                    $d,
                    array('controller' => 'schedules', 'action' => 'calendar', date("Y-m-d", mktime(0, 0, 0, $m, $d, $y)))
                );
                echo "</td>";

                // 今日が土曜日の場合は…
                if (date("w", mktime(0, 0, 0, $m, $d, $y)) == 6) {
                    // 週を終了
                    echo "</tr>";
                 
                    // 次の週がある場合は新たな行を準備
                    if (checkdate($m, $d + 1, $y)) {
                        echo "<tr>";
                    }
                }
                $d++;
            }

            // 最後の週の土曜日まで移動
            $wdx = date("w", mktime(0, 0, 0, $m + 1, 0, $y));
            for ($i = 1; $i < 7 - $wdx; $i++) {
                echo "<td>　</td>";
            }
        ?>

        
    </table>
    <?php
        if($isUpdate) {
            echo "更新やぞ";

        }else{
            echo "追加やぞ";
        }
        echo $this->Form->create();
        echo $this->Form->input('text',  array('value' => $schedule['Schedule']['text']));// 
        echo $this->Form->input('date', array('type' => 'hidden', 'value' => $date));
        if($isUpdate) {
            echo $this->Form->input('id', array('type' => 'hidden', 'value' => $schedule['Schedule']['id']));
        }
        echo $this->Form->end('追加（投稿？）');
    ?>
</html>
