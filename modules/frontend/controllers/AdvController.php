<?php
namespace app\modules\frontend\controllers;
use yii\web\UploadedFile;
use Yii;
use app\models\TemplateAdv;
use app\models\Registeradv;
use app\models\Registervoiceadv;
class AdvController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
	public function actionPicklayout(){
		$model=TemplateAdv::find()->select('distinct(layout),title')->where(['status'=>1])->all();
		return $this->render('template',['model'=>$model]);
	}
	public function actionPickstyle($id){
		$model=TemplateAdv::find()->where(['layout'=>$id,'status'=>1])->all();
		return $this->render('style',['model'=>$model]);
	}
	public function actionRegisteradv(){
		$model=new Registeradv;
		return $this->render('registeradv',['model'=>$model]);
	}
	public function actionRegistervoiceadv(){
		$model=new Registervoiceadv;
		return $this->render('registervoiceadv',['model'=>$model]);
	}
    public function actionIndex(){
    	return $this->render('adv');
    }
    public function actionPickdesign($id,$style=null)
    {
    	if($style==null){
    		$model=TemplateAdv::find()->where(['layout'=>$id,'status'=>1])->limit(1)->one();
    	}else{
    		$model=TemplateAdv::find()->where(['layout'=>$id,'style'=>$style,'status'=>1])->limit(1)->one();
    	}
    	if(Yii::$app->request->post()){
    		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    		if (isset($_POST['hasEditable'])) {
	    		if(isset($_POST['title'])){
	    			return ['output'=>$_POST['title'], 'message'=>''];
	    		}elseif(isset($_POST['text'])){
	    			return ['output'=>$_POST['text'], 'message'=>''];
	    		}
	    	}else{
	    		//collect all data
	    		$data=[
	    			'userid'=>Yii::$app->user->id,
	    			'adv_type'=>'Video Or Gif with Text',
	    			'adv_title'=>$_POST['title'],
	    			'adv_video'=>$_POST['video'],
	    			'adv_text'=>$_POST['text']
	    		];
	    		return ['output'=>$data, 'message'=>'Success send data'];
	    	}
    	}
        return $this->render('index',['model'=>$model]);
    }
    public function actionVoice(){
    	return $this->render('voiceadv');
    }
    public function actionVoiceupload(){
    	return $this->render('voiceupload');
    }
    public function actionVoicerecord(){
    	return $this->render('voicerecord');
    }
    public function actionUpload(){
    	if(Yii::$app->request->post()){
	    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    	$video=UploadedFile::getInstanceByName('video');
	    	$video->saveAs(realpath(Yii::$app->basePath).'/web/video/'.$video->name);
	    }
    }
    public function actionUploadcv(){
    	if(Yii::$app->request->post()){
	    	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    	$pdf=UploadedFile::getInstanceByName('Member[cv]');
	    	$pdf->saveAs(realpath(Yii::$app->basePath).'/web/uploads/files/'.$pdf->name);
	    }
    }
    public function base64toFiles($base64,$output_file){
        $file = fopen($output_file, "wb");
        $data = explode(',', $base64);
        fwrite($file, base64_decode($data[1]));
        fclose($file);
        return $output_file;
    }

}
