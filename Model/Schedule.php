<!--Model/Schedule.php-->
<?php
class Schedule extends AppModel {
	public $validate = array(
        'date' => array(
            'rule' => 'notBlank'
        ),
    );
}