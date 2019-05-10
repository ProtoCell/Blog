<?php  // src/Entity/Task.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

class Task
{
    public $task;


    public function settitre($task)
    {
        return $this->task;
    }

    public function setauteur($task)
    {
        $this->task = $task;
    }
    public function setcontenu($task)
    {
        $this->task = $task;
    }

    public function setdate($task)
    {
        return $this->task = $task;
    }

    
}
?>