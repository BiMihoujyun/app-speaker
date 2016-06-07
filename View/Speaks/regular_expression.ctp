<!-- Content starts -->

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h5><?php echo __('正規表現登録');?></h5>
            </div>
            <div class="widget-body" >
                <?php echo $this->Form->create('RegularExpression', array(
                    'type' => 'file',
                    'inputDefaults' => array(
                        'div' => 'form-group',
                        'label' => array(
                            'class' => 'col col-md-3 control-label'
                        ),
                        'wrapInput' => 'col col-md-9',
                        'class' => 'form-control'
                    ),
                    'class' => 'form-horizontal'

                )); ?>
                <?php echo $this->Form->input('RegularExpression.before_value', array(
                    'label' => array(
                        'text' => __('変換前文字'),
                    ),
                )); ?>
                <?php echo $this->Form->input('RegularExpression.after_value', array(
                    'label' => array(
                        'text' => __('変換後文字'),
                    ),
                )); ?>
                <div class="form-group">
                    <div class="col col-md-9 col-md-offset-3">
                        <?php echo $this->Form->submit(__('登録'), array(
                            'div' => false,
                            'class' => 'btn btn-primary',
                            'id' => 'submit',
                        )); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>

            <div class="widget-foot">

            </div>
        </div>

        <div class="widget-body no-padd">
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <?php
                    $header_list = array('#',__('変換前文字'), __('返還後文字'),__('登録者'), __('Status'));
                    echo $this->Html->tableHeaders($header_list);

                    ?>

                    <tbody>
                    <?php
                    echo $this->Html->tableCells($data);
                    ?>


                    </tbody>
                </table>
            </div>
        </div>

        <div class="widget-foot">

            <?php echo $this->Paginator->pagination(array(
                'ul' => 'pagination pull-right'
            )); ?>

            <div class="clearfix"></div>

        </div>
    </div>
</div>

