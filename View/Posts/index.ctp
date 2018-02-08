<!-- File: /app/View/Posts/index.ctp -->

<h1>ブログトップ</h1>

<?php
     echo $this->Html->link(
        'カレンダー',
        array('controller' => 'schedules', 'action' => 'calendar')
    );
?>

<?php echo $this->Html->link(
    '追加',
    array('controller' => 'posts', 'action' => 'add')
); ?>

<table>
    <tr>
        <th>Id</th>
        <th>タイトル</th>
        <th>操作</th>
        <th>作成日</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <!--タイトルから、本文へ--> 
        <td>
            <?php
                echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); 
            ?>
        </td>

        <!--操作-->
        <td> 
            <!--編集-->
            <?php
                echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id']));
            ?>
            <!--削除-->
            <?php
                // postLink
                echo $this->Form->postLink('削除', array('action' => 'delete', $post['Post']['id']), array('confirm' => '削除しますか?'));
            ?>
        </td>

        <!--作成日-->
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>

    <?php unset($post); ?>
</table>