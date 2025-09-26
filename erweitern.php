<?php
class User {
    private $username;
    private $password;
    protected $id;

    protected static $allUsers = [];

    public function __construct($name,$pw,$id){
        $this->username = $name;
        $this->password = $pw;
        $this->id = $id;

        self::$allUsers[] = $this;
    }

    public function getId(){
        return $this->id;
    }

    public static function getAllUsers(){
        return self::$allUsers;
    }
}

class Lehrer extends User {
    public function unterrichten(){
        return "blablabla";
    }
}

class Schulleiter extends Lehrer {
    const TEMPERATUR = 30;

    public static function hitzefreiGeben($temperatur){
        if ($temperatur >= self::TEMPERATUR) {
            return "Hitzefrei";
        } else {
            return "KEIN Hitzefrei";
        }
    }
}

$chef = new Schulleiter("Meier","123",1);
$schulze = new Lehrer("Schulze","pw",23);
$tom = new User("Tom","1234",2);

//statischer Aufruf geht hier nicht:
//Schulleiter::hitzefreiGeben(33);
echo $chef->hitzefreiGeben(12) . "<br>";
echo $chef->unterrichten() . "<br>";
echo $schulze->unterrichten() . "<br>";
echo "chef id: " . $chef->getId() . "<br>" . "<br>";

echo "USERS:"."<br>";

foreach (User::getAllUsers() as $users) {
    echo "User ID: " . $users->getId() . "<br>";
}