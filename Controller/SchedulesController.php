<!--Controller/ScheduleController.php-->
<?php
class SchedulesController extends AppController {
    public $helpers = array('Html', 'Form');

    public function calendar($date = null) {
        if (!$date) {
            $date = date("Y-m-d");
        }
        echo $date;

        if ($this->request->is('post')) {
            $this->Schedule->create();
            if ($this->Schedule->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'calendar', $this->request->data['Schedule']['date']));
            }
            $this->Flash->error(__('Unable to add your post.'));
        }

        // https://qiita.com/kazu56/items/8b4bb08bef24f552c99e 参照
        //findBy[カラム名]で取ってこれる
        $schedule = $this->Schedule->findByDate($date);
        $isUpdate = true;
        // user_idと、dateの一致から取る場合はAndで繋げば可能(Orもできるらしいがどう使うかぴんとこない)
        //$schedule = $this->Schedule->findByUserIdAndDate(1, $date);
        if (!$schedule) {
            // ない場合はとりあえずないなりに処理しておく
            $schedule['Schedule']['date'] = $date;
            $schedule['Schedule']['created'] = "";
            $schedule['Schedule']['text'] = "";
            $isUpdate = false;
        }
        $this->set('schedule',$schedule);
        $this->set('isUpdate',$isUpdate);
    }
}