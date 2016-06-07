<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="nav-content">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/" alt="mirumo"><img src="/img/logo-03.png"></a>
		</div>
		<div class="collapse navbar-collapse">
			<?php if (AuthComponent::user()): ?>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<span class="navbar-text">
							<?php echo $this->Format->name(AuthComponent::user()); ?>
						</span>
					</li>
					<li>
						<?php echo $this->Html->link('ログアウト', array(
							'controller' => 'users',
							'action' => 'logout',
						)); ?>
					</li>
				</ul>
			<?php endif; ?>
		</div>
		<!-- /.navbar-collapse -->
	</div>
</nav>
