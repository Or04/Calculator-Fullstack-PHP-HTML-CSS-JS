<?php


class model
{
    public $num1, $num2, $num3, $func, $retVal, $method;
    
    public function init()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
       
        if ($this->method === 'PUT') {
            parse_str(file_get_contents('php://input'), $_PUT);
            $this->num1 = (int) $_PUT['num1'];
            $this->num2 = (int) $_PUT['num2'];
            $this->num3 = (int) $_PUT['num3'];
            $this->func = $_PUT['func'];
        }
       
        else if ($this->method === 'POST') {
            $this->num1 = (int) $_POST['num1'];
            $this->num2 = (int) $_POST['num2'];
            $this->num3 = (int) $_POST['num3'];
            $this->func = $_POST['func'];
           
        } 
        else if ($this->method === 'GET') {
            $this->num1 = (int) $_GET['num1'];
            $this->num2 = (int) $_GET['num2'];
            $this->num3 = (int) $_GET['num3'];
            $this->func = $_GET['func'];
        }
    }
}
class controller extends model
{
    
    public function sum()
    {
        $this->retVal = $this->num1 + $this->num2 + $this->num3;
    }
    
    public function avg()
    {
        $this->retVal = ($this->num1 + $this->num2 + $this->num3) / 3;
    }
    public function multi()
    {
        $this->retVal = $this->num1 * $this->num2 * $this->num3;
    }
}
$start = new controller();
$start->init();
switch ($start->func) {
    case "sum":
        $start->sum();
        break;
    case "avg":
        $start->avg();
        break;
    case "multi":
        $start->multi();
        break;
    default:
        echo "INVALID OPERATION\n";
        $start->error();
        break;
}

$a = array(
    'retVal' => $start->retVal
);
header('Content-Type: application/json');
echo json_encode($a);
?>