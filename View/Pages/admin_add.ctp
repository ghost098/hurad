<?php $this->Html->css(
    array('twbs-components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min'),
    null,
    array('inline' => false)
); ?>
<?php $this->Html->script(
    array('admin/Pages/pages', 'twbs-components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min'),
    array('block' => 'scriptHeader')
); ?>

    <div class="page-header">
        <h2><?php echo $title_for_layout; ?></h2>
    </div>

<?php
echo $this->Form->create(
    'Page',
    array(
        'inputDefaults' => array(
            'label' => false,
            'div' => false
        )
    )
);
?>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <?php echo $this->Form->input(
                    'title',
                    array(
                        'type' => 'text',
                        'class' => 'form-control postTitle',
                        'placeholder' => __d('hurad', 'Enter title here')
                    )
                ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input(
                    'slug',
                    array(
                        'type' => 'text',
                        'class' => 'form-control postSlug',
                        'placeholder' => __d('hurad', 'Enter slug here')
                    )
                ); ?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input(
                    'content',
                    array('class' => 'form-control editor', 'type' => 'textarea')
                ); ?>
            </div>
            <div class="column">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __d('hurad', 'Excerpt'); ?></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?php echo $this->Form->input(
                                'excerpt',
                                array('class' => 'form-control', 'type' => 'textarea')
                            ); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->Content->loadMetaBoxes('Page.center'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="column">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __d('hurad', 'Publish'); ?></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <?php echo $this->Form->label(
                                'status',
                                __d('hurad', 'Page Status:'),
                                array('class' => 'control-label')
                            ); ?>
                            <?php
                            echo $this->Form->input(
                                'status',
                                [
                                    'class' => 'form-control',
                                    'options' => Post::getStatus(
                                            [Post::STATUS_PUBLISH, Post::STATUS_PENDING, Post::STATUS_DRAFT]
                                        )
                                ]
                            );
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label(
                                'comment_status',
                                __d('hurad', 'Comment Status:'),
                                array('class' => 'control-label')
                            ); ?>
                            <?php
                            echo $this->Form->input(
                                'comment_status',
                                [
                                    'class' => 'form-control',
                                    'options' => Post::getCommentStatus()
                                ]
                            );
                            ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label(
                                'created',
                                __d('hurad', 'Publish date:'),
                                array('class' => 'control-label')
                            ); ?>
                            <div id="datetimepicker" class="input-group date">
                            <span class="input-group-addon">
                            <span data-time-icon="glyphicon glyphicon-time"
                                  data-date-icon="glyphicon glyphicon-calendar"></span>
                        </span>
                                <?php echo $this->Form->input(
                                    'created',
                                    array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'data-format' => 'dd/MM/yyyy hh:mm:ss',
                                        'value' => date('d/m/Y H:i:s')
                                    )
                                ); ?>
                            </div>
                            <script type="text/javascript">

                                $(function () {
                                    $('#datetimepicker').datetimepicker({
                                        pick24HourFormat: true
                                    });
                                });
                            </script>
                        </div>
                        <?php echo $this->Form->button(
                            __d('hurad', 'Publish'),
                            array('type' => 'submit', 'class' => 'btn btn-primary')
                        ) ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __("Page Attributes"); ?></div>
                    <div class="panel-body">
                        <?php echo $this->Form->label(
                            'parent_id',
                            __("Parent"),
                            array('class' => 'control-label')
                        ); ?>
                        <?php echo $this->Form->select(
                            'parent_id',
                            $parentPages,
                            array('empty' => __d('hurad', '(No Parent)'), 'class' => 'form-control')
                        ); ?>
                    </div>
                </div>
                <?php echo $this->Content->loadMetaBoxes('Page.side'); ?>
            </div>
        </div>
    </div>

<?php echo $this->Form->end(); ?>