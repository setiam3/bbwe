<?php

namespace app\controllers\profiles;

use app\models\Member;
use app\models\MemberContacts;
use Yii;

class ProfileController extends \yii\web\Controller
{

    public function actionDeleteContact()
    {
        $request = \Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $member = MemberContacts::find()->where(['id' => $request->post('id')])->one();
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

    public function actionAddContact()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = Yii::$app->user->identity;
        $request = \Yii::$app->request;

        $members_id = $request->post('members_id');
        foreach ($members_id as $key => $value) {
            if ($value !== $user->id) {
                $member = MemberContacts::find()->where(['created_by' => $user->id, 'member_id' => $value])->one() ?? new MemberContacts();
                $member->created_by = $user->id;
                $member->member_id = $value;
                $member->save();
            }
        }
        return [
            'status' => 'success',
            'code' => 200
        ];
    }

    public function actionMemberList()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return Member::find()->select(['id', 'name', 'photo', 'email', 'profession'])->all();
    }

    public function actionContactList()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = Yii::$app->user->identity;
        $members = MemberContacts::find()->where(['created_by' => $user->id])->with(['member'])->asArray()->all();

        return $members;
    }
}
