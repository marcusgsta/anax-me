<?php

namespace Marcusgsta\Access;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * Access class for handling access of users and user accounts.
 */
class Access implements ConfigureInterface
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

    /**
     * Adds user to the database
     * @param $user string The name of the user
     * @param $pass string The user's password
     * @return void
     */
    public function addUser($user, $pass)
    {
        // $stmt = $this->db->execute("INSERT into users (name, pass) VALUES ('$user', '$pass')");
        // $stmt->execute();
        
        $this->db->execute("INSERT into users (name, pass) VALUES ('$user', '$pass')");
    }

    /**
     * Gets the hashed password from the database
     * @param $user string The user to get password from/for
     * @return string The hashed password
     */
    public function getHash($user)
    {
        // $stmt = $this->db->prepare("SELECT pass FROM users WHERE name='$user'");
        // $stmt->execute();

        $this->db->execute("SELECT pass FROM users WHERE name='$user'");
        $res = $this->db->fetchOne();
        // $res = $stmt->fetch(PDO::FETCH_ASSOC);

        return $res->pass;
    }

    /**
     * Changes the password for a user
     * @param $user string The usr to change the password for
     * @param $pass string The password to change to
     * @return void
     */
    public function changePassword($user, $pass)
    {
        $this->db->execute("UPDATE users SET pass='$pass' WHERE name='$user'");
    }

    /**
     * Check if user exists in the database
     * @param $user string The user to search for
     * @return bool true if user exists, otherwise false
     */
    public function exists($user)
    {
        $this->db->execute("SELECT * FROM users WHERE name='$user'");
        $row = $this->db->fetchOne();
        // $stmt = $this->db->prepare("SELECT * FROM users WHERE name='$user'");
        // $stmt->execute();


        // $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return !$row ? false : true;
    }
}
