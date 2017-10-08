<?php

namespace Marcusgsta\Comment\HTMLForm;

use \Anax\HTMLForm\FormModel;
use \Anax\DI\DIInterface;
use \Marcusgsta\Comment\Comment;

/**
 * Example of FormModel implementation.
 */
class CreateCommentForm extends FormModel
{
    /**
     * Constructor injects with DI container.
     *
     * @param Anax\DI\DIInterface $di a service container
     */
    public function __construct(DIInterface $di)
    {
        parent::__construct($di);
        $page = $this->di->session->get("previous");
        $acronym = $this->di->session->get("user");
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Lämna en kommentar",
            ],
            [
                "comment" => [
                    "type"        => "textarea",
                    // "placeholder" => $page,
                ],
                "acronym" => [
                    "type"        => "hidden",
                    "value"       => $acronym,
                ],
                "page" => [
                    "type"        => "hidden",
                    "value"       => $page,
                ],
                "submit" => [
                    "type" => "submit",
                    "value" => "Submit",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }



    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        // Get values from the submitted form
        $comment       = $this->form->value("comment");
        $acronym     = $this->form->value("acronym");
        $page       = $this->form->value("page");

        // Save to database

        $commentInst = new Comment();
        $commentInst->setDb($this->di->get("db"));
        $commentInst->commenttext = $comment;
        $commentInst->acronym = $acronym;
        $createdDate = date("h:i:s M jS Y", time());

        $commentInst->created = $createdDate;
        // $path = $this->di->request->getRoute();
        // $path = $this->di->request->getRoute('HTTP_REFERER');
        // var_dump($path);
        // exit;
        $commentInst->page = $page;

        $commentInst->save();

        $this->form->addOutput("Comment was posted.");
        return true;
    }
}
