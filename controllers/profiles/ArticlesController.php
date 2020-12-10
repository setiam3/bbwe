<?php

namespace app\controllers\profiles;

use Yii;
use app\models\form\UploadImageJobForm;
use app\models\MemberArticles as MemberArticlesModel;
use yii\web\UploadedFile;

class ArticlesController extends \yii\web\Controller
{

    protected $user;


    public function init()
    {
        $this->user =  Yii::$app->user->identity;
        parent::init();
    }


    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['code' => 200, 'data' => MemberArticlesModel::find()->auth()->all()];
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $modelJob = MemberArticlesModel::find()->id($request->post('id'))->one() ?? new MemberArticlesModel();
        $modelJob->created_by = $this->user->id;
        $upload = new UploadImageJobForm();
        $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');

        if ($upload->imageFile) {
            if ($upload->upload('uploads/profiles/articles/')) {
                $modelJob->thumbnail = $upload->imgUrl;
            }
        }

        $modelJob->article_title = $request->post('article_title');
        $modelJob->content_article = $request->post('content_article');
        if ($modelJob->save()) {
            return ['code' => 200, 'message' => 'success'];
        }

        return ['code' => 400, 'message' => 'error'];
    }

    public function actionDelete()
    {
        $request = \Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $member = MemberArticlesModel::find()->where(['id' => $request->post('id')])->one();
        if ($member->delete()) {
            return [
                'status' => 'success',
                'code' => 200
            ];
        }
        return [
            'status' => 'error',
            'code' => 400
        ];
    }
}
