<!--Controller/ScheduleController.php-->
<?php
class SchedulesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function calendar($date = null) {
        if (!$date) {
            $date = date("Y/m/d");
            //$date = "2018-2-8";
            echo "本日の日付";
        }
        echo $date;
          // https://qiita.com/kazu56/items/8b4bb08bef24f552c99e 参照
        //findBy[カラム名]で取ってこれる
        //$schedule = $this->Schedule->findByDate($date);
        // user_idと、dateの一致から取る場合はAndで繋げば可能(Orもできるらしいがどう使うかぴんとこない)
        $schedule = $this->Schedule->findByUserIdAndDate(1, $date);
        if (!$schedule) {
            // ない場合はとりあえずないなりに処理しておく
            $schedule['Schedule']['date'] = $date;
            $schedule['Schedule']['created'] = "";
            $schedule['Schedule']['text'] = "";
            //throw new NotFoundException(__('Invalid schedule date'));
        }
        $this->set('schedule',$schedule);
    }
/*
    public function schedule($d = null) {
    	if (!$d) {
            throw new NotFoundException(__('Invalid schedule'));
        }
        $date =  "2018-2-".$d;
        // https://qiita.com/kazu56/items/8b4bb08bef24f552c99e 参照
        //findBy[カラム名]で取ってこれる
        //$schedule = $this->Schedule->findByDate($date);
        // user_idと、dateの一致から取る場合はAndで繋げば可能(Orもできるらしいがどう使うかぴんとこない)
        $schedule = $this->Schedule->findByUserIdAndDate(1, $date);
        if (!$schedule) {
            // ない場合はとりあえずないなりに処理しておく
            $schedule['Schedule']['date'] = $date;
            $schedule['Schedule']['created'] = "";
            $schedule['Schedule']['text'] = "";
            //throw new NotFoundException(__('Invalid schedule date'));
        }
        echo $schedule['Schedule']['date'];
        $this->set('schedule', $schedule);
    }
*/
    public function schedule($date = null) {
        if(!$date){
           throw new NotFoundException(__('とどいてないんやけど'));
        }
        $this->redirect(array('action' => 'calendar', $date));
    }
}