<div class="comment-widget" id="<?php echo $this->id ?>">
    <h3><?php echo Yii::t('CommentsModule.msg', 'Comments'); ?></h3>
    <?php
    $this->render('ECommentsWidgetComments', array('comments' => $comments));
    if ($this->showPopupForm === true) {
        if ($this->registeredOnly === false || Yii::app()->user->isGuest === false) {
            echo "<div id=\"addCommentDialog-$this->id\">";
            $this->widget('comments.widgets.ECommentsFormWidget', array(
                'model' => $this->model,
            ));
            echo "</div>";
        }
    }
    if (count(Yii::app()->getModule('comments')->getModelConfig($this->model)) > 0) {
        if (($this->registeredOnly === false || Yii::app()->user->isGuest === false)) {
            //echo CHtml::link(Yii::t('CommentsModule.msg', 'Add comment'), '#', array('rel' => 0, 'class' => 'add-comment'));
            echo Yii::t('CommentsModule.msg', 'Add comment:');
            
            echo "<div id=\"addComment-" . $this->id . "\">";
            $this->widget('comments.widgets.ECommentsFormWidget', array(
                'model' => $this->model,
            ));

            echo "</div>";
            
            echo CHtml::submitButton('Add!', array('onclick' => '$.fn.commentsList.postComment($(document.getElementById("addComment-' . $this->id . '")),"yw1");return false;'));
        } else {
            echo '<strong>' . Yii::t('CommentsModule.msg', 'You have to login add a new comment.') . '</strong>';
        }
    } else {
        echo '<strong>' . Yii::t('CommentsModule.msg', 'Comments have been disabled here!') . '</strong>';
    }
    ?>
</div>
<div id="messagePlaceholder"></div>