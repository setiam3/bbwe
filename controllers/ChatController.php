<?php
namespace app\controllers;
use Yii;
use yii\helpers\Url;
use yii\web\Response;
use app\models\Member;
use app\models\Chat;
use yii\web\UploadedFile;

class ChatController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $imageDir='/web/assets/';
    public function actionIndex()
    {
        $this->layout=false;
        $session=Yii::$app->session;
        if(Yii::$app->request->post()){
            $chatname=strval($session->get('__id'));
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($_POST['data'] === 'cek'){
                if($session->isActive && $session->get('__id')){
                    $data['status'] = 'success';
                    $data['user']   = $chatname;
                    $data['avatar'] = Member::findOne($session->get('__id'))->photo;
                    $data['nameidmember'] = Member::findOne($session->get('__id'))->name;
                    $data['id'] = $session->get('__id');
                    $data['latest_status'] = Member::findOne($session->get('__id'))->status;
                }else{
                    $data['status'] = 'error, Login first';
                }
            
            }elseif($_POST['data'] == 'message'){
                 if(!empty($_POST['ke']) && !empty($_POST['tipe'])){
                    $data = $this->get_message($_POST['tipe'], $_POST['ke'], $chatname);
                }
            }elseif($_POST['data'] == 'user'){
                $data = $this->get_user($session->get('__id'));
            }elseif($_POST['data'] == 'send'){
                if(isset($chatname) && !empty($_POST['ke']) && !empty($_POST['date']) && !empty($_POST['avatar']) && !empty($_POST['tipe']) && isset($_POST['message']) && isset($_POST['images'])){
                    $images = json_decode($_POST['images']);
                    if(!empty($_POST['message']) && count($images) < 1){
                        $data = $this->send_message($chatname, $_POST['ke'], $_POST['message'], "", $_POST['date'], $_POST['avatar'], $_POST['tipe']);
                    }else if(!empty($_POST['message']) && count($images) > 0){
                        $h = 0;
                        foreach($images as $image){
                            
                            if($image->type=='video/mp4'){
                                $this->base64toMedia($image->blob,realpath(Yii::$app->basePath).$this->imageDir.$image->name);
                            }else{
                                $n = $this->arrayToBinaryString($image->binary);
                            $this->createImg($n, $image->name, 'image/png');
                            }
                        
                            if($h == 0){
                                $data = $this->send_message($chatname, $_POST['ke'], $_POST['message'], $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
                            }else{  
                                $data = $this->send_message($chatname, $_POST['ke'], "", $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
                            }
                            $h++;
                        }
                    }else if(empty($_POST['message']) && count($images) > 0){
                        foreach($images as $image){
                        //$this->base64toMedia($image->blob,realpath(Yii::$app->basePath).$this->imageDir.$image->name);
                            $n = $this->arrayToBinaryString($image->binary);
                            $this->createImg($n, $image->name, 'image/png');
                            $data = $this->send_message($chatname, $_POST['ke'], "", $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
                        }
                    }
                }
            }elseif($_POST['data']=='getname'){
                $data=$this->getname($_POST['name']);
            }
            Yii::$app->response->data=$data;
            Yii::$app->response->send();
        }
        return $this->render('index');
    }
    public function get_message($tipe, $ke, $user){//user is
        $data = array();
        if($tipe == 'rooms'){
            if($ke == 'all'){
                $message=Chat::find()->where(['type'=>$tipe])->orderBy('date DESC')->all();
            }else{
                $message=Chat::find()->where(['ke'=>$ke])->orderBy('date DESC')->all();
            }
            foreach ($message as $r) {
                $data[] = array(
                    'name' => $r->name,
                    'nameidmember' => $r->nameidmember,
                    'avatar' => $r->avatar,
                    'message' => $r->message,
                    'image' => $r->file,
                    'type' => $r->type,
                    'date' => $r->date,
                    'selektor' => $r->ke,
                );
            }
        }else if($tipe == 'users'){
            if($ke == 'all'){
                $message=Chat::find()->where(['name'=>$user,'type'=>$tipe])->orWhere(['ke'=>$user,'type'=>$tipe])->orderBy('date DESC')->all();
                $tmp = array();
                foreach ($message as $r) {
                    $name = (($r->name == $user) ? $r->ke : $r->name);
                    if(!in_array($name, $tmp)){
                        array_push($tmp, $name);
                        $member=Member::find()->where(['id'=>$name])->one();
                        $data[] = array(
                            'name' => $name,
                            'nameidmember' => $r->nameidmember,
                            'avatar' => $member->photo,
                            'date' => $r->date,
                            'message' => $r->message,
                            'status' => $member->status,
                            'selektor' => ($r->name == $user ? "to" : "from"),
                        );
                    }
                }
            }else{
                $message=Chat::find()->where(['name'=>$user,'ke'=>$ke])->orWhere(['ke'=>$user,'name'=>$ke])->orderBy('date DESC')->all();
                foreach ($message as $r) {
                    $data[] = array(
                        'name' => $r->name,
                        'nameidmember' => $r->nameidmember,
                        'avatar' => $r->avatar,
                        'message' => $r->message,
                        'image' => $r->file,
                        'type' => $r->type,
                        'date' => $r->date,
                        'selektor' => ($r->name== $user ? $r->ke: $r->name),
                    );
                }
            }
        }
        return $data;
    }
    public function getname($id){
        if(isset($id)){
            $data=Member::findOne($id)->name;
            return $data;
        }
    }
    
    public function get_user($user){
        if(isset($user)){
            $member=Member::findOne($user);
            $member->status='online';
            $member->update();
        }
        $data = array();
        $members=Member::find()->where(['deactivated_account'=>0])->andWhere(['!=','id',$user])->all();
        foreach ($members as $r) {
            $data['all'][]=array(
                'name'=>strval($r->id),
                'avatar'=>$r->photo,
                'login'=>$r->latest_login,
                'status'=>$r->status,
                'nameidmember'=>$r->name,
            );
        }
        $data["chat"] = $this->get_message("users", "all",$user);
        return $data;
    }
    
    public function send_message($name, $ke, $message, $image, $date, $avatar, $tipe){     
        $data = array();
        $chat=new Chat();
        $chat->name=$name;
        $chat->nameidmember=Member::findOne($name)->name;
        $chat->keidmember=($ke=='Public')?$ke:Member::findOne($ke)->name;
        $chat->ke=$ke;
        $chat->avatar=$avatar;
        $chat->message=$message;
        $chat->file=$image;
        $chat->type=$tipe;
        $chat->date=$date;
        $chat->save();
        $data['status'] = 'success';
        return $data;
    }
    // upload image
    public function arrayToBinaryString($arr) {
        $str = "";
        foreach($arr as $elm) {
            $str .= chr((int) $elm);
        }
        return $str;
    }

    public function createImg($string, $name, $type){
        $im = imagecreatefromstring($string); 
        if($type == 'image/png'){
                imageAlphaBlending($im, true);
                imageSaveAlpha($im, true);
            imagepng($im, realpath(Yii::$app->basePath).$this->imageDir.$name);
        }else if($type == 'image/gif'){
            imagegif($im, realpath(Yii::$app->basePath).$this->imageDir.$name);
        }else{
            imagejpeg($im, realpath(Yii::$app->basePath).$this->imageDir.$name);
        }
        imagedestroy($im);
    }
    public function base64toMedia($base64,$output_file){
        $file = fopen($output_file, "wb");
        $data = explode(',', $base64);
        // fwrite($file, base64_decode($data[1]));
        // fclose($file);
        file_put_contents($output_file,base64_decode($data[1]));
        return $output_file;
    }
}