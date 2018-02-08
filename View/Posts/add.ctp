<!-- File: /app/View/Posts/add.ctp -->

<h1>追加</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('追加（投稿？）');
?>