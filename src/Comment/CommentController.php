<?php

namespace Marcusgsta\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * CommentController.
 */
class CommentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;


    /**
     * Add comment.
     *
     * @param string $key  for the dataset
     * @param string $item to add
     *
     * @return array as new item inserted
     */
    public function init()
    {
        // $dbase = $this->di->get("database");
        // $dbase->connect();
        //
        // $database = $this->di->get("comment")->injectDatabase($dbase);
        // return $database;
    }


    /**
     * Create a new item by getting the entry from the request body and add
     * to the dataset.
     *
     * @param string $key    for the dataset
     *
     * @return void
     */
    public function postItem()
    {
        $entry = $this->di->get("request")->getPost();
        // $entry = json_decode($entry, true);
        $previous = $this->di->get("request")->getServer('HTTP_REFERER');
        $path = basename(parse_url($previous, PHP_URL_PATH));
        if ($path == 'htdocs') {
            $path = 'index';
        }

        $key = 'page';
        $entry[$key] = $path;


        // make id
        // $current = $this->app->session->get($path);
        // $id = count($current);
        // $id++;

        // $this->app->session->setArray($path, [
        //         'id' => $id,
        //         'text' => $text,
        //         'email' => $email,
        //         'gravatar' => $gravatar,
        // ]);


        // $item =
        $this->di->get("comment")->addItem($entry);

        $url = $this->di->get("request")->getServer('HTTP_REFERER');

        $this->di->get("response")->redirect($url);
    }

    /**
     * Get the dataset or parts of it.
     *
     * @param string $key - the page id for the comments
     * @SuppressWarnings(PHPMD.ExitExpression)
     * @return void
     */

    // public function getDataset($key)
    public function getComments($key)
    {
        $request = $this->di->get("request");

        $dataset = $this->di->get("comment")->getComments($key);
        $offset  = $request->getGet("offset", 0);
        $limit   = $request->getGet("limit", 25);
        $res = [
            "data" => array_slice($dataset, $offset, $limit),
            "offset" => $offset,
            "limit" => $limit,
            "total" => count($dataset)
        ];

        // $this->di->get("response")->sendJson($res);
        $this->di->get("response")->send($res);
        exit;
    }


    /**
     * Extract the part containing the route.
     *
     * @return string as the current extracted route
     */
    public function extractRoute()
    {
        $requestUri = $this->requestUri;
        $scriptPath = $this->path;
        $scriptFile = $this->scriptName;

        // Compare REQUEST_URI and SCRIPT_NAME as long they match,
        // leave the rest as current request.
        $i = 0;
        $len = min(strlen($requestUri), strlen($scriptPath));
        while ($i < $len
               && $requestUri[$i] == $scriptPath[$i]
        ) {
            $i++;
        }
        $route = trim(substr($requestUri, $i), "/");

        // Does the request start with script-name - remove it.
        $len1 = strlen($route);
        $len2 = strlen($scriptFile);

        if ($len2 <= $len1
            && substr_compare($scriptFile, $route, 0, $len2, true) === 0
        ) {
            $route = substr($route, $len2 + 1);
        }

        // Remove the ?-part from the query when analysing controller/metod/arg1/arg2
        $queryPos = strpos($route, "?");
        if ($queryPos !== false) {
            $route = substr($route, 0, $queryPos);
        }

        $route = ($route === false) ? "" : $route;

        $this->route = $route;
        $this->routeParts = explode("/", trim($route, "/"));

        return $this->route;
    }
    /**
     * Get the dataset or parts of it.
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
