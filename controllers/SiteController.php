<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\InviteForm;
use app\models\Member;
use app\models\MemberInvited;
use app\models\MemberSearch;
use app\models\MemberVideo;
use app\models\MemberPodcast;
use app\models\MemberPost;
use app\models\User;
use app\models\Chat;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionChat(){
        //$this->layout=false;
        //return $this->render('chatfire');
        // $member=Member::findAll(['deactivated_account'=>0]);
        // $searchModel = new MemberSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         return $this->render('chat');
    }
    public function actionBlogupload(){
        $model = new MemberVideo();
        if($model->load(Yii::$app->request->post())){
            $video=UploadedFile::getInstance($model,'video');
            if($video->saveAs(realpath(Yii::$app->basePath).'/web/video/'.$video->name)){
                $model->video=Yii::$app->request->BaseUrl.'/video/'.$video->name;
                $model->save();
                return $this->redirect('index');
            }else{
                echo "failed uploads";
            }
        }
        return $this->render('blogvideo',['model' => $model]);
    }
    public function actionBlogpost(){
        $model=new MemberPost();
        if($model->load(Yii::$app->request->post())){
            $cover=UploadedFile::getInstance($model,'cover_picture');
            if($cover->saveAs(realpath(Yii::$app->basePath).'/web/uploads/'.$cover->name)){
                $model->cover_picture=Yii::$app->request->BaseUrl.'/uploads/'.$cover->name;
                $model->save();
                return $this->redirect('index');
            }else{
                echo "failed uploads"; die;
            }
        }
        return $this->render('blogpost',['model'=>$model]);
    }
    public function actionBlogpostupdate($id){
        $model=MemberPost::findOne($id);
        if($model->load(Yii::$app->request->post())){
            $cover=UploadedFile::getInstance($model,'cover_picture');
            if($cover->saveAs(realpath(Yii::$app->basePath).'/web/uploads/'.$cover->name)){
                $model->cover_picture=Yii::$app->request->BaseUrl.'/uploads/'.$cover->name;
                $model->save();
                return $this->redirect('index');
            }else{
                echo "failed uploads"; die;
            }
        }
        return $this->render('blogpost',['model'=>$model]);
    }
    public function actionBlogpodcast(){
        $model=new MemberPodcast();
        if($model->load(Yii::$app->request->post())){
            $podcast=UploadedFile::getInstance($model,'podcast');
            if($podcast->saveAs(realpath(Yii::$app->basePath).'/web/uploads/'.$podcast->name)){
                $model->podcast=Yii::$app->request->BaseUrl.'/uploads/'.$podcast->name;
            }else{
                echo "failed uploads"; die;
            }
            $model->save();
            return $this->redirect('index');
        }
        return $this->render('blogpodcast',['model'=>$model]);
    }
    public function actionBloglist(){
        return $this->render('bloglist');
    }
    public function actionBlogpages(){
        $posts=MemberPost::findAll(['idmember'=>1]);
        return $this->render('blogpages',['posts'=>$posts]);
    }
    public function actionTolower(){
        $path = realpath(Yii::$app->basePath.'/web/images');
        //print_r($path);die;
        $di = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach($di as $name => $fio) {
            $newname = $fio->getPath() . DIRECTORY_SEPARATOR . strtolower( $fio->getFilename() );
            //echo $newname, "\r\n";
            rename($name, $newname);
        }
    }
    public function actionProfile(){
        $id=Yii::$app->user->id;
        $member=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',$id])->orderBy('datetime desc')->limit(2)->all();
        return $this->render('profile',['model'=>$this->findModel($id,'Member'),'member'=>$member]);
    }
    public function actionProfileguestpaid(){
        $id=Yii::$app->user->id;
        $member=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',$id])->orderBy('datetime desc')->limit(3)->all();
        return $this->render('profiles_guest',['model'=>$this->findModel($id,'Member'),'member'=>$member]);
    }
    public function actionProfilepageguestviewer(){
        return $this->render('profilepageguestviewer');
    }
    public function actionUpdateprofile(){
        $profile=$this->findModel(Yii::$app->user->id,'Member');
        if(Yii::$app->request->post()){
            $profile->name=Yii::$app->request->post('Member')['name'];
            $profile->profession=Yii::$app->request->post('Member')['profession'];
            $profile->country=Yii::$app->request->post('Member')['country'];
            $profile->email=Yii::$app->request->post('Member')['email'];
            if($profile->save()){
                Yii::$app->session->setFlash('success', 'success update profile');
            }else{
                Yii::$app->session->setFlash('error', 'error update profile');
            }
        }
        return $this->render('registration',['model'=>$profile]);
    }
    public function actionFlag($code){
        return $this->render('flags',['code'=>$code]);
    }
    
    public function actionWorld(){
        return $this->render('worldpage');
    }
    public function actionDirectory(){
        $model = Member::findAll(['deactivated_account'=>0]);
        return $this->render('directory', ['model' => $model,]);
    }
    public function actionHome(){
        return $this->render('generalhome');
    }
    public function actionThanksjoin(){
        return $this->render('thanksjoin');
    }
    public function actionInvite(){
        $model=new InviteForm();
        if ($model->load(Yii::$app->request->post()) ) {
            $saved=0;
            foreach ($_POST['InviteForm'] as $key => $value) {
                if(!empty($value)){
                    $exists = MemberInvited::find()->where( [ 'email' => $value ] )->exists();
                    if(!$exists){
                        $modelin=new MemberInvited();
                        $modelin->email=$value;
                        $modelin->datetime=date('Y-m-d H:i:s',time());
                        $modelin->idmember=1;
                        $modelin->referral=Member::findOne(1)->email;
                        $modelin->save();
                        $saved+=1;
                    }
                }
            }
            if($saved>0){
                Yii::$app->session->setFlash('success', 'Invitation sent');
            }else{
                Yii::$app->session->setFlash('warning', 'email exists');
            }
        }
        return $this->render('_forminvite',['model'=>$model]);
    }
    public function actionRegister(){
        $model=new Member();
        if ($model->load(Yii::$app->request->post())) {
            $hasInvited=MemberInvited::find()->where('email="'.$model->email.'"')->one();
            if(empty($hasInvited)){
                Yii::$app->session->setFlash('danger', 'must be invited first');
            }else{
                $model->referral=MemberInvited::find()->where('email="'.$model->email.'"')->one()->referral;
                $model->save();
                Yii::$app->session->setFlash('success', 'thanksjoin');
                $this->redirect('thanksjoin');
            }
        }
        return $this->render('registration',['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->lastViset();
            return $this->redirect(Yii::$app->user->returnUrl);
        }
        $model->password = '';
        return $this->render('newlogin', [
            'model' => $model,
        ]);
    }
    private function lastViset() {
        $model = $this->findModel(Yii::$app->user->id,'Member');
        $model->latest_login = date('Y-m-d H:i:s',time());
        $model->status='online';
        $model->save();
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(){
        $session=Yii::$app->session;
        $member=$this->findModel($session->get('__id'),'Member');
        $member->status='offline';
        $member->update();
        Yii::$app->user->logout($destroySession = true);

        Yii::$app->session->close();
        return $this->goHome();
    }
    public function actionTes(){
        //$user='admin';$tipe='users';
        //$message=Chat::find()->where(['name'=>$user,'type'=>$tipe])->orWhere(['ke'=>$user,'type'=>$tipe])->orderBy('date DESC')->all();
        $message=Member::findAll(['deactivated_account'=>0,['!=','id','1']]);
        
        return $this->render('index',['model'=>$message]);
    }
    public function actionAdv(){
        return $this->render('adv');
    }
    public function actionSuccessubmitform(){
        return $this->render('successubmitform');
    }
    public function actionConfirmemail(){
        return $this->render('confirmemail');
    }
    public function actionInformationwecollect($id){
        switch ($id) {
            case 1:$template='informationwecollect';
                break;
            case 2:$template='informationwecollect2';
                break;
            case 3:$template='informationwecollect3';
                break;
        }
        return $this->render($template);
    }
    public function actionCollectallinfo(){
        return $this->render('collectallinfo');
    }

    protected function findModel($id,$models){
        $modelx=Yii::createObject([
          'class' => "app\models\\".$models,
         ]);
        if (($model = $modelx::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout(){
        return $this->render('about');
    }
}
