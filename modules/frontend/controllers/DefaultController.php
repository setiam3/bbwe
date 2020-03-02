<?php
namespace app\modules\frontend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Member;
use app\models\MemberVideo;
use app\models\MemberPodcast;
use app\models\MemberPost;
use app\models\MemberPostjob;
use app\models\MemberMenu;
use app\models\Contact;
use yii\web\UploadedFile;

/**
 * Default controller for the `frontend` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAudio()
    {
        if(Yii::$app->request->post()){
            print_r(Yii::$app->request->post());
        }
        return $this->render('webaudio');
    }
    public function number_format($number){
        return number_format($number,2,",",".");
    }
    public function money($number){
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%(#10n', $number);
    }
    public function genPdfThumbnail($source, $target){
        $source = Yii::$app->basePath.$source;
        //print_r(Yii::alias('@web'));die;
        $target = dirname($source).DIRECTORY_SEPARATOR.$target;
        $im     = new \Imagick($source."[0]"); // 0-first page, 1-second page
        $im->setImageColorspace(255); // prevent image colors from inverting
        $im->setimageformat("jpeg");
        $im->thumbnailimage(160, 160); // width and height
        $im->writeimage($target);
        $im->clear();
        $im->destroy();
    }
    public function actionBlogupload()
    {
        $model = new MemberVideo();
        if($model->load(Yii::$app->request->post())){
            $video=UploadedFile::getInstance($model,'video');
            if(!empty($video)){
                $video->saveAs(realpath(Yii::$app->basePath).'/web/video/'.$video->name);
                $model->video=Yii::$app->request->BaseUrl.'/video/'.$video->name;
            }
            $model->save();
            return $this->redirect('index');
        }
        return $this->render('blogvideo',['model' => $model]);
    }
    public function actionBlogpodcast()
    {
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
    public function actionBlogpost()
    {
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
    public function actionDirectory()
    {
        $model = Member::findAll(['deactivated_account'=>0]);
        return $this->render('directory', [
                    'model' => $model,
        ]);
    }
    public function actionContact()
    {
        $contact=new Contact();
        if($contact->load(Yii::$app->request->post())){
            if(!empty($_POST['audio64'])){
                $filename=(new \DateTime('UTC'))->format('Y-m-d\TH:i:s\Z').'.wav';
                $contact->voice_message=Yii::$app->request->BaseUrl.'/uploads/'.$filename;
                $this->base64toAudio($_POST['audio64'],realpath(Yii::$app->basePath).'/web/uploads/'.$filename);
            }
            $contact->save();
            return $this->redirect('index');
        }
        return $this->render('contact',['model'=>$contact]);
    }
    public function base64toAudio($base64,$output_file){
        $file = fopen($output_file, "wb");
        $data = explode(',', $base64);
        fwrite($file, base64_decode($data[1]));
        fclose($file);
        return $output_file;
    }
    public function actionBlogpages()
    {
        $posts=MemberPost::findAll(['idmember'=>1]);
        return $this->render('blogpages',['posts'=>$posts]);
    }
    public function actionBloglist()
    {
        return $this->render('bloglist');
    }
    public function actionProfile()
    {
        if(Yii::$app->user->isGuest){
            $this->redirect('login');
        }else{
            $memberMenu=MemberMenu::findAll(['status'=>1]);
            $member=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',Yii::$app->user->id])->orderBy('datetime desc')->limit(2)->all();
            return $this->render('profile',['membermenu'=>$memberMenu,'model'=>$this->findModel(Yii::$app->user->id,'Member'),'member'=>$member]);
        }
    }
    public function actionPostjob(){
        $model=new MemberPostjob();
        return $this->render('profilepost',['model'=>$model]);
    }
    public function actionProfilelisting($id){
        $member=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',$id])->orderBy('datetime desc')->limit(2)->all();
        return $this->render('profile-joblisting',['model'=>$this->findModel($id,'Member'),'member'=>$member]);
    }
    public function actionUpdateprofile(){
        $profile=$this->findModel(Yii::$app->user->id,'Member');
        $old_profile=$profile->cv;
        if($profile->load(Yii::$app->request->post())){
            $profile->name=Yii::$app->request->post('Member')['name'];
            $profile->skill=Yii::$app->request->post('Member')['skill'];
            $profile->about=Yii::$app->request->post('Member')['about'];
            $cv=UploadedFile::getInstance($profile,'cv');
            if(!empty($cv)){
                $profile->cv='/'.$cv->name;
            }else{
                $profile->cv=$old_profile;
            }
            if($profile->save()){
                if(!empty($cv)){
                    $cv->saveAs(Yii::getAlias('@uploads').$cv->name);
                }
                Yii::$app->session->setFlash('success', 'success update profile');
            }else{
                Yii::$app->session->setFlash('error', 'error update profile');
            }
        }
        $member=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',Yii::$app->user->id])->orderBy('datetime desc')->limit(2)->all();
        return $this->render('updateprofile',['model'=>$profile,'member'=>$member]);
    }
    public function actionDeleteprofilecv(){
        //delete by ajax
        if(Yii::$app->request->post() && Yii::$app->user->id==$_POST['id']){
            $profile=$this->findModel($_POST['id'],'Member');
            $fullpath=realpath(Yii::getAlias('@uploads')).$profile->cv;
            if(file_exists($fullpath)){
                if (!unlink($fullpath)) {  
                    return json_encode(array('success'=>false,'message'=>$profile->cv." cannot be deleted due to an error"));  
                }else{
                    if(pathinfo($fullpath)['extension']=='pdf'){
                        unlink($fullpath.'.jpeg');
                    }
                    return json_encode(array('success'=>true,'message'=>$profile->cv." has been deleted"));
                    $profile->cv='';
                    $profile->save();
                }
            }else{
                return json_encode(array('success'=>false,'message'=>$profile->cv." files not exist"));
            }
        }
    }
    public function actionGb()
    {
    	$this->redirect('login');
    }
    public function actionThanksjoin()
    {
        $this->layout=false;
        return $this->render('thanksjoin');
    }
    
    public function actionRegister()
    {
        $model=new Member();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //send mail here 
            $this->redirect('thanksjoin');
        }
        return $this->render('registration',['model'=>$model]);
    }
    public function actionLogin(){
    	if (!Yii::$app->user->isGuest) {
            return $this->redirect('index');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->lastViset();
            return $this->redirect('index');
        }
        $model->password = '';
        return $this->render('britishlogin', [
            'model' => $model,
        ]);
    }
    private function lastViset() {
        $model = $this->findModel(Yii::$app->user->id,'Member');
        $model->latest_login = date('Y-m-d H:i:s',time());
        $model->status='online';
        $model->save();
    }
    public function actionLogout(){
        $session=Yii::$app->session;
        $member=$this->findModel($session->get('__id'),'Member');
        $member->status='offline';
        $member->update();
        Yii::$app->user->logout($destroySession = true);
        Yii::$app->session->close();
        return $this->redirect('index');
    }
    protected function findModel($id,$models)
    {
        $modelx=Yii::createObject([
          'class' => "app\models\\".$models,
         ]);
        if (($model = $modelx::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
