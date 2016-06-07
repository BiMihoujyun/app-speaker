<!-- Sidebar starts -->
<div class="sidebar">
    <!-- Logo starts -->
    <div class="logo">
        <h1><?php echo $this->html->link($this->Html->image('ggxrdgp.png',array('width'=>'200px')), array('controller' => 'home', 'action' => 'index'), array('label' => false, 'escape' => false)); ?>
    </div>
    <!-- Logo ends -->

    <!-- Sidebar buttons starts -->
    <div class="sidebar-buttons text-center">
        <div class="btn-group">
            <?php echo $this->html->link('<i class="fa fa-desktop"></i>', array('controller' => 'home', 'action' => 'index'), array('class' => 'btn btn-black btn-xs', 'escape' => false)); ?>
            <?php echo $this->html->link('Dashboard', array('controller' => 'home', 'action' => 'index'), array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>
        </div>
        <!-- Logout button -->
        <div class="btn-group">
            <?php echo $this->html->link('<i class="fa fa-power-off"></i>', array('controller' => 'customers', 'action' => 'logout'), array('class' => 'btn btn-black btn-xs', 'escape' => false)); ?>
            <?php echo $this->html->link('Logout', array('controller' => 'customers', 'action' => 'logout'), array('class' => 'btn btn-primary btn-xs', 'escape' => false)); ?>
        </div>

    </div>
    <!-- Sidebar buttons ends -->


    <!-- Sidebar navigation starts -->

    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <div class="sidey">
        <ul class="nav">
            <!-- Main navigation. Refer Notes.txt files for reference. -->

            <!-- Use the class "current" in main menu to hightlight current main menu -->
            <li><?php echo $this->html->link('<i class="fa fa-desktop"></i> Dashboard', array('controller' => 'home', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->html->link('<i class="fa fa-users"></i> Tournament(未)', array('controller' => 'home', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->html->link('<i class="fa fa-list"></i> 大会支援ツール', array('controller' => 'tools', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->html->link('<i class="fa fa-comments"></i> レス読み子さん', array('controller' => 'speaks', 'action' => 'index'), array('escape' => false)); ?></li>
            <li><?php echo $this->html->link('<i class="fa fa-cog"></i> 正規表現', array('controller' => 'speaks', 'action' => 'regular_expression'), array('escape' => false)); ?></li>


        </ul>
    </div>
    <!-- Sidebar navigation ends -->



</div>
<!-- Sidebar ends -->
