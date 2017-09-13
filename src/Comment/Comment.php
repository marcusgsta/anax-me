<?php

namespace Marcusgsta\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * Comment.
 */
class Comment implements AppInjectableInterface

{
    use AppInjectableTrait;


    /**
     * Add an item to a dataset.
     *
     * @param string $key  for the dataset
     * @param string $item to add
     *
     * @return array as new item inserted
     */
    public function addItem($key, $item)
    {
        $dataset = $this->getDataset($key);

        // Get max value for the id
        $max = 0;
        foreach ($dataset as $val) {
            if ($max < $val["id"]) {
                $max = $val["id"];
            }
        }
        $item["id"] = $max + 1;
        $dataset[] = $item;
        $this->saveDataset($key, $dataset);
        return $item;
    }

    /**
     * Get (or create) a subset of data.
     *
     * @param string $key for data subset.
     *
     * @return array with the dataset
     */
    public function getDataset($key)
    {
        $data = $this->session->get(self::KEY);
        $set = isset($data[$key])
            ? $data[$key]
            : [];
        return $set;
    }

    /**
     * Save (the modified) dataset.
     *
     * @param string $key     for data subset.
     * @param string $dataset the data to save.
     *
     * @return self
     */
    public function saveDataset($key, $dataset)
    {
        $data = $this->session->get(self::KEY);
        $data[$key] = $dataset;
        $this->session->set(self::KEY, $data);
        return $this;
    }
    /**
     *
     *
     * @param string $comment
     *
     * @return void
     */
    public function saveComment($comment)
    {
        $path = $this->app->request->getRoute();

        // Check for comments
        if (isset($comment['text'])) {
            $text = $comment['text'];
            $email = $comment['email'];
            $gravatar = $comment['gravatar'];

            $currentComments = 'comments' . $path;

            // make id
            $current = $this->app->session->get($currentComments);
            $id = count($current);
            $id++;

            $this->app->session->setArray($currentComments, [
                    'id' => $id,
                    'text' => $text,
                    'email' => $email,
                    'gravatar' => $gravatar,
            ]);
        }
    }

    /**
     *
     *
     * @param string $comment
     *
     * @return void
     */
    public function editComment($array, $id)
    {
        $comments = $this->app->session->get($array);

        foreach ($comments as $key => $comment) {
            if ($comment['id'] == $id) {
                $text = $comment['text'];
                $id = $comment['id'];
                $email = $comment['email'];
                $gravatar = $comment['gravatar'];

                $html = "<form method='post'>";
                $html .= "<textarea name='text' value=$text>$text</textarea>";
                $html .= "<input type='hidden' name='id' value=$id>";
                $html .= "<input type='hidden' name='email' value=$email>";
                $html .= "<input type='hidden' name='gravatar' value=$gravatar>";
                $html .= "<input type='hidden' name='key' value=$array>";
                $html .= "<div><input type='submit' name='update' value='Uppdatera'</div>";
                $html .= "</form>";
            }
        }
        return $html;
    }

    /**
     *
     *
     * @param string $comment
     *
     * @return void
     */
    public function updateComment($array, $id)
    {

    }


    /**
     *
     *
     * @param string $comment
     *
     * @return void
     */
    public function deleteComment($array, $id)
    {
        $comments = $this->app->session->get($array);

        foreach ($comments as $key => $comment) {
            if ($comment['id'] == $id) {
                $this->app->session->deleteArray($array, $key);
            }
        }
    }

 }
