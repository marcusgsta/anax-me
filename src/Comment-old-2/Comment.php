<?php

namespace Marcusgsta\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * Comment class for handling comment system.
 */
class Comment implements ConfigureInterface
{
    use ConfigureTrait;


    private $dbase;

    /**
     * Inject dependency to $database..
     *
     * @param array $database object representing database.
     *
     * @return self
     */
    public function injectDatabase($database)
    {
        $this->dbase = $database;
        return $this;
    }


    public function addItem($values)
    {
        //$dataset = $this->getDataset($key);
        $this->dbase->connect();
        $author = $values['email'];
        $commenttext = $values['text'];
        $page = $values['page'];


        $sql = "INSERT INTO comment (author, commenttext, page) VALUES ('$author', '$commenttext', '$page');";

        $this->dbase->execute($sql);

    }

    /**
     * Get (or create) a subset of data.
     *
     * @param string $key - page id for comments.
     *
     * @return array with the dataset
     */
    // public function getDataset($key)
    public function getComments($key)
    {
        $this->dbase->connect();
        $sql = "SELECT * FROM comment where page = '$key'";
        $data = $this->dbase->executeFetchAll($sql);
        $set = isset($data)
            ? $data
            : [];
        return $set;
        // $data = $this->session->get(self::KEY);
        // $set = isset($data[$key])
        //     ? $data[$key]
        //     : [];
        // return $set;
    }
    // public function addItem($key, $item)
    // {
    //     $dataset = $this->getDataset($key);
    //
    //     // Get max value for the id
    //     $max = 0;
    //     foreach ($dataset as $val) {
    //         if ($max < $val["id"]) {
    //             $max = $val["id"];
    //         }
    //     }
    //     $item["id"] = $max + 1;
    //     $dataset[] = $item;
    //     $this->saveDataset($key, $dataset);
    //     return $item;
    // }
}
