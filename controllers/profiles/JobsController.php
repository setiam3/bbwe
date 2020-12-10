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
        return ['code' => 200, 'data' => MemberJobsModel::find()->auth()->all()];
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $modelJob = MemberJobsModel::find()->id($request->post('id'))->one() ?? new MemberJobsModel();
        $modelJob->created_by = $this->user->id;
        $upload = new UploadImageJobForm();
        $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');

        if ($upload->imageFile) {
            if ($upload->upload('uploads/profiles/jobs/')) {
                $modelJob->thumbnail = $upload->imgUrl;
            }
        }

        $modelJob->job_name = $request->post('job_name');
        $modelJob->job_description = $request->post('job_description');
        $modelJob->job_requirement = $request->post('job_requirement');
        if ($modelJob->save()) {
            return ['code' => 200, 'message' => 'success'];
        }

        return ['code' => 400, 'message' => 'error'];
    }

    public function actionDelete()
    {
        $request = \Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $member = MemberJobsModel::find()->where(['id' => $request->post('id')])->one();
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
