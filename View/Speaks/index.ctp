<?php ob_start(); ?>
<script>
    <?php ob_end_clean(); ?>
    <?php $this->Html->scriptStart(array('inline' => false));?>
    $(document).ready(function () {
// With JQuery
        $("#BoostCakeVolume").slider({
            ticks: [50, 100, 150, 200],
            ticks_labels: ['50', '100', '150', '200'],
            ticks_snap_bounds: 50
        });

// Without JQuery
        var slider = new Slider("#BoostCakeVolume", {
            ticks: [50, 100, 150, 200],
            ticks_labels: ['50', '100', '150', '200'],
            ticks_snap_bounds: 50
        });

        // With JQuery
        $('#BoostCakeLevel').slider({
            formatter: function (value) {
                return 'Current value: ' + value;
            }
        });

// Without JQuery
        var slider3 = new Slider('#BoostCakeLevel', {
            formatter: function (value) {
                return 'Current value: ' + value;
            }
        });
        $('#read_stop').click(function () {
            if (typeof audio != "undefined") {
                if (audio.paused == false) {
                    audio.pause();  // ロード・アルゴリズムを実行して初期状態に戻す
                    audio.currentTime = 0;
                }
            }
            if (typeof repeat != "undefined") {
                clearTimeout(repeat);
            }

            $('#road_and_start').removeAttr('disabled');

        });
        $('#road_and_start').click(function (event) {
            event.preventDefault(); // 本来のPOSTを打ち消すおまじない
            $('#road_and_start').attr('disabled', 'disabled');

            if (typeof audio !== "undefined") {
                if (audio.paused == false) {
                    audio.pause();  // ロード・アルゴリズムを実行して初期状態に戻す
                    audio.currentTime = 0;

                } else {
                }
            }

            Url = $('#BoostCakeUrl').val();
            Speaker = $('[name=data\\[BoostCake\\]\\[speaker\\]]:checked').val();
            Emotion = $('[name=data\\[BoostCake\\]\\[emotion\\]]:checked').val();
            ThreadNumber = $('#BoostCakeRes').val();
            EmotionLevel = $('#BoostCakeLevel').val();
            Volume = $('#BoostCakeVolume').val();
            $.ajax({
                url: "/speaks/getThread",
                type: "POST",
                data: {url: Url},
                dataType: "json",
                success: function (data) {
                    if (data.title == '404 Not Found') {
                        alert('スレッドURLが不正です。');
                        $('#road_and_start').removeAttr('disabled');
                    } else {
                        document.getElementById("title").innerHTML = data.title;

                        next_res();
                    }


                },
                error: function () {
                    alert('スレッドURLが不正です。');
                    $('#road_and_start').removeAttr('disabled');
                    //通信失敗時の処理


                }
            });

        });
    });


    function next_res() {
        if (typeof repeat !== "undefined" && typeof audio !== "undefined") {
            clearInterval(repeat);
            if (audio.paused == false) {
                audio.pause();  // ロード・アルゴリズムを実行して初期状態に戻す
                audio.currentTime = 0;

            } else {
            }
        }
        Speaker = $('[name=data\\[BoostCake\\]\\[speaker\\]]:checked').val();
        Emotion = $('[name=data\\[BoostCake\\]\\[emotion\\]]:checked').val();
        EmotionLevel = $('#BoostCakeLevel').val();
        Volume = $('#BoostCakeVolume').val();
        $(function () {
            $.ajax({
                url: "/speaks/getSpeaksJson",
                type: "POST",
                data: {
                    url: Url,
                    speaker: Speaker,
                    emotion: Emotion,
                    thread_number: ThreadNumber,
                    emotion_level: EmotionLevel,
                    volume: Volume
                },
                dataType: "json",
                success: function (data) {
                    document.getElementById("res").innerHTML = data.res_view;
                    if (typeof popupWindow !== "undefined") {
                        popupWindow.document.getElementById("res").innerHTML = data.res_view;
                    }

                    audio = new Audio(data.voice_data);

                    audio.pause();
                    audio.currentTime = 0;
                    audio.play();
                    ThreadNumber++;
                    audio.addEventListener("ended",_interval , true);


                },
                error: function () {
                    audio = undefined;
                    //通信失敗時の処理
                    repeat = setTimeout(next_res, 10000);

                }
            });
        });
    }
    function _interval(){
        $('#BoostCakeRes').val(ThreadNumber);
        next_res();

    }
    $('#getThreadNumber').click(function () {
        Url = $('#BoostCakeUrl').val();

        $(function () {
            $.ajax({
                url: "/speaks/getThreadLastNumber",
                type: "POST",
                data: {url: Url},
                dataType: "json",
                success: function (data) {
                    $('#BoostCakeRes').val(data.threadnumber);
                },
                error: function () {
                }
            });
        });


    });
    $(function () {
        $('.colorselect').colorpicker();
    });
    function viewer_open() {
        var color = $('#color-select').val();
        color = color.replace(/#/g, '');
        document.getElementById("res").style.backgroundColor = '#' + color;
        popupWindow = window.open("speaks/viewer/" + color, "", "width=640,height=120,toolbar=no,directories=no,location=no,menubar=no,status=no,scrollbars=no");
    }


    <?php $this->Html->scriptEnd(); ?>
    <?php ob_start(); ?>
</script>
<?php ob_end_clean(); ?>
<div class="container">


    <div class="page-content page-form">
        <div id="title"></div>
        <div id="res"
             style="background-color:#46b8da;width:640px;height: 120px;color:#ffffff;font-size:18px;line-height:18px;font-weight: bold;"></div>
        <div class="input-group colorselect col col-md-2">
            <input id='color-select' type="text" value="#46b8da" class="form-control"/>
            <span class="input-group-addon"><i></i></span>
        </div>
        <input type="button" name="btn1" value="レス表示のポップアップウィンドウを開く" onclick="javascript:viewer_open();">

        <div class="widget">
            <div class="widget-head">
                <h5>Form</h5>
            </div>
            <div class="widget-body">
                <?php echo $this->Form->create('BoostCake', array(
                    'inputDefaults' => array(
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col col-md-3 control-label'
                        ),
                        'wrapInput' => 'col col-md-9',
                        'class' => 'form-control'
                    ),
                    'class' => 'well form-horizontal'
                )); ?>

                <?php echo $this->Form->input('url', array(
                    'label' => array(
                        'text' => '読み込むスレットを指定',
                    ),
                    'value' => 'http://jbbs.shitaraba.net/bbs/read.cgi/netgame/323/1423217194/',
                    'beforeInput' => '<div class="input-group">',
                    'afterInput' => '<span class="input-group-addon"></span></div>'
                )); ?>


                <?php echo $this->Form->input('res', array(
                    'label' => array(
                        'text' => '読み始めるレス番号を入力'
                    ),
                    'wrapInput' => 'col col-md-1',
                    'default' => 1,
                    'beforeInput' => '<div class="input-group">',
                    'afterInput' => '<button type="button" class="btn btn-default" id="getThreadNumber">最終レス番号取得</button></div>'

                )); ?>

                <?php echo $this->Form->input('speaker', array(
                    'type' => 'radio',
                    'before' => '<label class="col col-md-3 control-label">誰で喋らす？</label>',
                    'legend' => false,
                    'wrapInput' => array('data-toggle' => 'buttons'),
                    'class' => 'btn btn-primary',
                    'autocomplete' => 'off',
                    'options' => $speaker_array,
                )); ?>
                <?php echo $this->Form->input('emotion', array(
                    'type' => 'radio',
                    'before' => '<label class="col col-md-3 control-label">感情</label>',
                    'legend' => false,
                    'wrapInput' => array('data-toggle' => 'buttons'),
                    'class' => 'btn btn-primary',
                    'autocomplete' => 'off',
                    'options' => $emotion_array,
                )); ?>
                <?php echo $this->Form->input('level', array(
                    'label' => array(
                        'text' => '感情レベル'
                    ),

                    'data-slider-min' => '1',
                    'data-slider-max' => '4',
                    'data-slider-step' => '1',
                    'data-slider-value' => '1',
                )); ?>
                <?php echo $this->Form->input('volume', array(
                    'label' => array(
                        'text' => 'select sound level'
                    ),
                    'data-slider-value' => '100',
                    'data-slider-ticks' => '[50,100,150, 200]',
                    'data-slider-ticks-snap-bounds' => '50',
                    'data-slider-ticks-labels' => '["50":, "100", "150", "200"]'
                )); ?>


                <div class="form-group">
                    <div class="col col-md-9 col-md-offset-3">
                        <?php echo $this->Form->submit('読み込む', array(
                            'div' => false,
                            'class' => 'btn btn-primary',
                            'id' => 'road_and_start',
                        )); ?>
                        <button type="button" class="btn btn-default" id="read_stop">読み込みを止める（一時停止）</button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>

            </div>

            <div class="widget-foot">
                <div>
                    *メモ*<br>
                    ・同じレスを呼び出し続けると同一ファイルの読み出し規制がかかる。その場合はレス番をいじるかブラウザの別タブで開き直す<br>
                    ・chromeがハングアップする（要検証）
                    <br>
                    *対応しないといけないこと*<br>
                    ・UI周りがあんまりいけてない<br>
                </div>
            </div>
        </div>

    </div>
</div>
