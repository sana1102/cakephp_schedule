<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
/*ひとつ注意： CakePHP は、「id」フィールドがデータ配列の中に存在している場合は、 モデルを編集しているのだと判断します。
もし、「id」がなければ、(add のビューを復習してください) save() が呼び出された時、CakePHP は新しいモデルの挿入だと判断します。
(cakephpチュートリアルより)*/
echo $this->Form->input('id', array('type' => 'hidden'));// つまりこの処理をif文で有無を切り替えれば追加・更新がひとまとめに出来る？
echo $this->Form->end('更新');
?>