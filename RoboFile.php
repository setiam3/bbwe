<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function s(){
        $this->taskExec("php -S localhost:8000 -t web")->run();
    }

    public function mg1()
    {
        $this->taskExec("php yii gii/model --overwrite=1 --interactive=0 --tableName=* --ns=app\\\database")->run();
    }
    public function mg2()
    {
        $this->taskExec("php yii gii/model --overwrite=1 --db=db_hrm --interactive=0 --tableName=* --ns=app\\\modelsParty\Hrm")->run();
    }

    public function ds(){
        $this->_exec('docker-compose up --build');
    }
    public function u(){
        $this->_exec('docker-compose up');
    }

}