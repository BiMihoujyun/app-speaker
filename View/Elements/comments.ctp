<?php foreach ($comments as $comment): ?>
	<div class="comment-list-item" data-id="<?php echo $comment['Comment']['id']; ?>">
		<div class="comment-left">
			<?php echo $this->Html->image($comment['User']['image'], [
				'class' => 'img-responsive'
			]); ?>
		</div>
		<div class="comment-right">
			<div class="comment-header">
				<span class="comment-user"><?php echo $this->Format->name($comment['User']); ?></span>
				<span class="comment-created"><?php echo $this->Format->datetime($comment['Comment']['created']); ?></span>
				<?php
				if (AuthComponent::user('role') === 'admin'
					|| AuthComponent::user('id') === $comment['User']['id']
				):
				?>
				<span class="comment-delete" data-target="<?php echo Router::url([
					'controller' => 'comments',
					'action' => 'delete',
					$comment['Comment']['id']
				]); ?>">このコメントを削除</span>
				<?php endif; ?>
			</div>
			<?php echo nl2br(h($comment['Comment']['body'])); ?>
		</div>
	</div>
<?php endforeach; ?>

<?php if ($has['before']): ?>
<div class="more-wrapper">
	<?php
	$query = [
		'before' => $has['before'],
	];
	$url = Router::url(array(
		'controller' => 'comments',
		'action' => 'get',
		$movie['Movie']['id'],
		'?' => $query
	));
	?>
	<div class="more" data-target="<?php echo $url;?>">もっと読む</div>
</div>
<?php endif; ?>
