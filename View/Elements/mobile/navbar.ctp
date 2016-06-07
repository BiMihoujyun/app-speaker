<nav class="navbar navbar-default navbar-fixed-top sb-slide" role="navigation">
	<?php if (AuthComponent::user()): ?>
	<div class="sb-toggle-left navbar-left">
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
		<div class="navicon-line"></div>
	</div>
	<?php endif; ?>
    <div class="container">
        <div class="sp-logo-wrapper">
			<a class="sp-logo" href="/" alt="mirumo"><img src="/img/logo-03.png"></a>
		</div>
		<div class="navbar-right navbar-mypage">
		</div>
    </div>
</nav>

<div class="sb-slidebar sb-left">
	<?php echo $this->element('side'); ?>
	<?php if (AuthComponent::user()): ?>
	<div class="sidebox">
		<div class="sidebox-logout">
			<?php echo $this->Html->link('ログアウト', array(
				'controller' => 'users',
				'action' => 'logout',
			)); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
