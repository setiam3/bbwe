<?php

namespace app\controllers\profiles;

use Yii;
use app\models\form\UploadImageJobForm;
use app\models\MemberJobs as MemberJobsModel;
use yii\web\UploadedFile;

class JobsController extends \yii\web\Controller
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
        return ['code'=>200,'data'=>MemberJobsModel::find()->auth()->all()];
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $post = $request->post();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $upload = new UploadImageJobForm();
        $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
        if ($upload->upload()) {
            $modelJob = new MemberJobsModel();
            $modelJob->created_by = $this->user->id;
            $modelJob->thumbnail = $upload->imgUrl;
            $modelJob->job_name = $request->post('job_name');
            $modelJob->job_description = $request->post('job_description');
            $modelJob->job_requirement = $request->post('job_requirement');
            if ($modelJob->save()) {
                return ['code' => 200, 'message' => 'success'];
            }
        }
        return ['code' => 400, 'message' => 'error'];
    }
}
