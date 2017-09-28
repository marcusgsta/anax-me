<?php

namespace Marcusgsta\Access;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * AccessController
 */
class AccessController implements InjectionAwareInterface
{

    use InjectionAwareTrait;


    public function addUser()
    {
        // $item = $this->di->get("request")->getBody();
        // $file = $this->di->get("request")->getRoute();
        // var_dump($file);
        // exit;
        // $file = "/view/login/create_user.php";
        // //$this->di->get("viewRenderFile")->render($file, "hej");
        // $item = $this->di->get("view")->getTemplateFile($file);
        // var_dump($item);
        // exit;
        // $this->di->get("viewRenderFile")->render($file, "hej");
        // $this->di->get("access")->addUser($item);
        // return $user;
    }
    /**
     * Not supported route.
     *
     * @param
     * @SuppressWarnings(PHPMD.ExitExpression)
     * @return void
     */
    public function anyUnsupported()
    {
        echo "Not supported";
        exit;
    }
}
