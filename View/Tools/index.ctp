<script type="text/javascript">
    function player_1_open(){
        popupWindow = window.open("jobs/player_1","","width=600,height=10,toolbar=no,directories=no,location=no,menubar=no,status=no,scrollbars=no");
    }
    function player_2_open() {
        popupWindow2 = window.open("jobs/player_2","","width=600,height=10,toolbar=no,directories=no,location=no,menubar=no,status=no,scrollbars=no");
    }
    function player_1(data)
    {
        popupWindow.document.getElementById("player_1_name").innerHTML =data;
    }
    function player_2(data)
    {
        popupWindow2.document.getElementById("player_2_name").innerHTML =data;
    }
    //-->
</script>

<div>
    <iframe src="http://challonge.com/ggxrdgp_peercast_cup_02/module" width="100%" height="500" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>

<input type="button" name="btn1" value="1のポップアップウィンドウを開く" onclick="javascript:player_1_open();">
<input type="button" name="btn1" value="2のポップアップウィンドウを開く" onclick="javascript:player_2_open();">

<div style="margin-top:30px;">
    <?php $player_array = ['']; ?>

<div style='float:left;width:200px;'>
    1P側<br>
    <?php
            foreach($player_array as $val) {
                ?>

                <input type="button" name="btn1" value="<?php echo $val; ?>"
                       onclick="javascript:player_1('<?php echo $val; ?>');"><br>
                <?php
            }
    ?>
</div>
<div style="float:left">
    2P側<br>
    <?php
    foreach($player_array as $val) {
        ?>

        <input type="button" name="btn1" value="<?php echo $val; ?>"
               onclick="javascript:player_2('<?php echo $val; ?>');"><br>
        <?php
    }
    ?>

</div>
