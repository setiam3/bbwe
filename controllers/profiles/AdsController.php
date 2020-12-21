<?php

namespace app\controllers\profiles;

use Yii;
use app\models\form\UploadImageJobForm;
use app\models\MemberAdvertisement as AdsModel;
use yii\web\UploadedFile;

class AdsController extends \yii\web\Controller
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
        return ['code' => 200, 'data' => AdsModel::find()->auth()->all()];
    }

    /**
     * Active 
     *
     * @return void
     */
    public function actionActive()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['code' => 200, 'data' => AdsModel::find()->auth()->active()->one()];
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $modelAds = AdsModel::find()->id($request->post('id'))->one() ?? new AdsModel();
        $modelAds->created_by = $this->user->id;
        $upload = new UploadImageJobForm();
        $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');

        if ($upload->imageFile) {
            if ($upload->upload('uploads/profiles/ads/')) {
                $modelAds->ads_image = $upload->imgUrl;
            }
        }

        $modelAds->ads_name = $request->post('ads_name');
        $modelAds->ads_description = $request->post('ads_description');
        $modelAds->ads_is_active = $request->post('ads_is_active') ?? 0;
        if ($modelAds->save()) {
            return ['code' => 200, 'message' => 'success'];
        }

        return ['code' => 400, 'message' => 'error'];
    }

    public function actionDelete()
    {
        $request = \Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $member = AdsModel::find()->where(['id' => $request->post('id')])->one();
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
