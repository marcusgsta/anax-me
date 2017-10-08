<?php
namespace Anax\LogIn;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;

/**
 * A log in controller class.
 */
class LogInController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function logInUser($acronym)
    {

        $this->di->session->set("user", $acronym);

        return true;

    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function isLoggedIn()
    {
        $user = $this->di->session->get("user");
        return $user;
    }

    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function logOut()
    {
        // $user = $this->di->session->get("user");
        $this->di->session->delete("user");
        $url = $this->di->get("request")->getServer('HTTP_REFERER');

        $this->di->get("response")->redirect($url);
        return true;
    }
}
