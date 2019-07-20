<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 18.07.19
 * Time: 23:31
 */

require __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

class ConfigClient implements \Oosor\AuthApiDatabase\Contracts\Configuration {
    public function getClientId()
    {
        return 3;
    }

    public function getClientSecret()
    {
        return 'ke1QMcleBOYrLsKiA65n6uy88qKx8ZuOL7q9VZI1';
    }

    public function userName()
    {
        return null;
    }

    public function userPassword()
    {
        return null;
    }

    public function accessToken()
    {
        return null;
    }
}

class ConfigPassword implements \Oosor\AuthApiDatabase\Contracts\Configuration {
    public function getClientId()
    {
        return 2;
    }

    public function getClientSecret()
    {
        return 'a0ac55idyWvsM4k77fhNBtweZJosmP6X10FafEE5';
    }

    public function userName()
    {
        return 'andrew@google.com';
    }

    public function userPassword()
    {
        return 'andrew@google.com';
    }

    public function accessToken()
    {
        return null;
    }
}

class ConfigPersonal implements \Oosor\AuthApiDatabase\Contracts\Configuration {
    public function getClientId()
    {
        return null;
    }

    public function getClientSecret()
    {
        return null;
    }

    public function userName()
    {
        return null;
    }

    public function userPassword()
    {
        return null;
    }

    public function accessToken()
    {
        return 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg0NmQ3YTJjZWFmNjliOTU3NDkzMmVhYWJmZjk2NjZhYjZhMTYxMWMyZmI5YmJlM2UzODlkYzE2ZmM5NWIzMDlmMzk0NGRlMzY0MTI0Yjk2In0.eyJhdWQiOiIyIiwianRpIjoiODQ2ZDdhMmNlYWY2OWI5NTc0OTMyZWFhYmZmOTY2NmFiNmExNjExYzJmYjliYmUzZTM4OWRjMTZmYzk1YjMwOWYzOTQ0ZGUzNjQxMjRiOTYiLCJpYXQiOjE1NjM2MzE4OTEsIm5iZiI6MTU2MzYzMTg5MSwiZXhwIjoxNTk1MjU0MjkxLCJzdWIiOiIxIiwic2NvcGVzIjpbImNvbnN0cnVjdCJdfQ.gggBkqiThcCYQXOow8KJYp-BV4LI5cJzVzI65MTthdCCFWN9fgAce6PNXaVkiqPXOEvFzemZ9Vr-MH45VcqbXHucDrIOGgsmtDbA0ggCP0Sk-nu6CGYnAEC_zR6ewLowQxnDkpJ6HMAiqYTGL-fSwOleTGYlIh8CErT22Dh8qAskfdW0SDrK7z42nA2fojLMXYiO1z-vRI54_lwtb0pHP4tcMLXJlUr3eE_ztjfksNIhBt9OPbbf1KGPy3kzEL4W18l5c0FyGzvhY8PxeRzclB4X7LvlliH28hSw5nACL7Pbc0c0To1jH-1WsrNJQ_7DGP8-uK4qMufeEcSV01IkndaUyMlB06O1sPlc2_pdi6Rnxm6f9oVtQ-i4k8SvexG0lh6KTtraOWJXOmLZTwmszHVzeqqui6WBxruKabRmXPh2xV2cIa8SAxP5MqxLv-UEVGnl0cNtS9VEc-tJ3uqHxS9_x8PFanllyK1XQsKqq3UFD96LT05em3chahYnu2nFTWSx3tvF4vRMYfArJOCU7QjfBtkiOA7WOdLX7zw67Rc13Bg1tZnNkFuNLWjqpjtQog9PIaDIMvnZ_z9s6rIwpgE1yp-3vza6Y1Gm72FD8SyDpxov3U2vK1uostfB7pJUUI8cI-DOss4ZYTAbquRSzO2ul2pjJnR5OpXAISPWvjs';
    }
}


try {

    $auth = new \Oosor\AuthApiDatabase\Auth('http://localhost:8000/', new ConfigClient());
//    echo $auth
//        ->clientToken()
//        ->addInsertScope()
//        ->get();


    $authPassword = new \Oosor\AuthApiDatabase\Auth('http://localhost:8000/');
    $authPassword->setConfig(new ConfigPassword());
//    echo $authPassword
//        ->passwordToken()
//        ->addConstructScope()
//        ->get();


    $authPersonal = new \Oosor\AuthApiDatabase\Auth('http://localhost:8000/', new ConfigPersonal());
//    echo $authPersonal
//        ->personalToken('name_token')
//        ->addInsertScope()
//        ->addSelectScope()
//        ->addUpdateScope()
//        ->get();

} catch (\Exception $exception) {
    echo $exception;
}