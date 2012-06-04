<?php if (count($comments) > 0): ?>
    <ul class="comments-list">
        <?php foreach ($comments as $comment): ?>
            <li id="comment-<?php echo $comment->comment_id; ?>">
                <div class="comment">
                    <div class="gravatar">
                        <?php
                        if ($this->useGravatar) {
                            $this->widget('ext.YiiGravatar', array(
                                'email' => $comment->email,
                                'size' => 80,
                                //'defaultImage' => 'http://www.amsn-project.net/images/download-linux.png',
                                'secure' => false,
                                'rating' => 'r',
                                'emailHashed' => false,
                                'htmlOptions' => array(
                                    'alt' => 'Gravatar for ' . $comment->user_name,
                                    'alt' => 'Gravatar for ' . $comment->user_name,
                                )
                            ));
                        }
                        ?>
                    </div>
                    <div class="comment-header">
                        <?php echo $comment->username; ?>
                        <?php echo Yii::app()->dateFormatter->formatDateTime($comment->create_time); ?>
                    </div>

                    <div class="comment_text">
                        <?php echo CHtml::encode($comment->comment_text); ?>
                    </div>
                    <div class="comment-footer">
                    <?php
                    if ($this->allowSubcommenting === true && ($this->registeredOnly === false || Yii::app()->user->isGuest === false) && count($comment->config)) {
                        echo CHtml::link(Yii::t('CommentsModule.msg', 'Reply'), '#', array('rel' => $comment->comment_id, 'class' => 'add-comment'));
                    }
                    ?>
                    <?php if ($this->adminMode === true): ?>
                        <div class="admin-panel">
                            <?php
                            if ($comment->status === null || $comment->status == Comment::STATUS_NOT_APPROWED)
                                echo CHtml::link(Yii::t('CommentsModule.msg', 'Approve'), Yii::app()->urlManager->createUrl(
                                                CommentsModule::APPROVE_ACTION_ROUTE, array('id' => $comment->comment_id)
                                        ), array('class' => 'approve'));
                            ?>
                            <?php
                            echo CHtml::link(Yii::t('CommentsModule.msg', 'Delete'), Yii::app()->urlManager->createUrl(
                                            CommentsModule::DELETE_ACTION_ROUTE, array('id' => $comment->comment_id)
                                    ), array('class' => 'delete'));
                            ?>
                        </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (count($comment->childs) > 0 && $this->allowSubcommenting === true) $this->render('ECommentsWidgetComments', array('comments' => $comment->childs)); ?>

            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p><?php echo Yii::t('CommentsModule.msg', 'No comments'); ?></p>
<?php endif; ?>

