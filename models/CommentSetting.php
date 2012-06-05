<?php

Yii::import('application.modules.comments.models._base.BaseCommentSetting');

class CommentSetting extends BaseCommentSetting{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function init() {
        return parent::init();
    }
}