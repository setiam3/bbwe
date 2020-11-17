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
}