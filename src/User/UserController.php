<?php

namespace Anax\User;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\Di\InjectionAwareTrait;
use \Anax\User\HTMLForm\UserLoginForm;
use \Anax\User\HTMLForm\CreateUserForm;
use \Anax\User\HTMLForm\EditUserForm;
use \Anax\User\HTMLForm\DeleteUserForm;

/**
 * A controller class.
 */
class UserController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait,
        InjectionAwareTrait;



    /**
     * @var $data description
     */
    //private $data;



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return void
     */
    public function getIndex()
    {
        $title      = "A index page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $data = [
            "content" => "An index page",
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
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
    public function getPostLogin()
    {
        $title      = "A login page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UserLoginForm($this->di);

        $form->check();


        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
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
    public function getPostCreateUser()
    {
        $title      = "A create user page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new CreateUserForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
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
    public function editAllUsers()
    {
        $acronym = $this->di->session->get("user");
        $role = $this->di->get("commentController")->getRole($acronym);
        if ($role != 10) {
            echo "Du har ej tillgång till sidan.";
            return false;
        }

        $title      = "An edit all users page";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new DeleteUserForm($this->di);

        $form->check();

        $data = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $data);

        $pageRender->renderPage(["title" => $title]);
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
    public function showProfile()
    {
        $acronym = $this->di->session->get("user");
        $user = new User();
        $user->setDb($this->di->get("db"));
        $user = $user->find("acronym", $acronym);

        if (isset($user->email)) {
            $this->editUser($user->id);
        }
        // if no user is logged in:

        $val = $this->di->get("url")->createRelative("user/login");
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $data = [
            "content" => "<h2><a href='$val'>Logga in</a> för att se din profil.</h2>"
        ];

        $view->add("default2/article", $data);
        $pageRender->renderPage(["title" => "Ej tillgång"]);
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
    public function editUser($id)
    {
        $title      = "Redigera användare";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $user = new User;
        $user->setDb($this->di->get("db"));
        $user = $user->find("id", $id);

        $data = [
            "title" => $title,
            "email" => $user->email,
            "acronym" => $user->acronym,
            "gravatar" => $user->gravatar,
            "role" => $user->role,
        ];

        $form       = new EditUserForm($this->di, $user->acronym);
        $form->check();

        $formdata = [
            "content" => $form->getHTML(),
        ];

        $view->add("take1/profile", $data);
        $view->add("default2/article", $formdata);

        $pageRender->renderPage(["title" => $title]);
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
    public function editOneUser($id)
    {
        $title      = "Redigera en användare";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");

        $user = new User;
        $user->setDb($this->di->get("db"));
        $user = $user->find("id", $id);

        // $data = [
        //     "title" => $title,
        //     "email" => $user->email,
        //     "acronym" => $user->acronym,
        //     "gravatar" => $user->gravatar,
        // ];

        $form       = new EditUserForm($this->di, $user->acronym);
        $form->check();

        $formdata = [
            "content" => $form->getHTML(),
        ];

        $view->add("default2/article", $formdata);

        $pageRender->renderPage(["title" => $title]);
        return true;
    }
}
