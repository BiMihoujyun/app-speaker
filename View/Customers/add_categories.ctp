<?php $errorMessages = $this->validationErrors['Category']; ?>
<div>
    <ul>
        <?php foreach($errorMessages as $messages): ?>
            <?php foreach($messages as $message): ?>
                <li>
                    <?php echo h($message); ?>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</div>

<div>
    <h2>カテゴリー<?php echo empty($this->data['Category']['id']) ? '追加' : '編集'; ?></h2>
</div>

<div>
    <?php echo $this->Form->create('Category'); ?>
    <?php echo empty($this->data['Category']['id']) ? null : $this->Form->input('id', array('type' => 'hidden')); ?>

    <h3>カテゴリー名</h3>
    <p><?php echo $this->Form->inout('name', array('placeholder' => 'カテゴリー名を入力して下さい。')); ?></p>

    <h3>親カテゴリー</h3>
    <p><?php echo $this->Form->select('parent_id', $categoryList, array('empty' => '----')); ?></p>

    <?php echo $this->Form->end(empty($this->data['Category']['id']) ? ' 追加 ' : ' 編集 '); ?>
</div>


<div style="text-align: right;">
    <?php echo empty($this->data['Category']['id']) ? null : $this->Html->link('削除する', array('action' => 'delete', $this->data['Category']['id'])); ?>
</div>


<div class="pageLinks">
    <p><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></p>
</div>