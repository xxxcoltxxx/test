<?php

class Config
{
    private $name;
    /** @var Config[] */
    private static $instance = array();
    private $data = array();

    protected function __construct($name)
    {
        $this->name = $name;
        $this->data = parse_ini_file(PATH_CONFIG . $name . ".ini", true);
    }

    public static function instance($name)
    {
        if (!preg_match("#^[a-z/_]+$#", $name)) {
            throw new Exception("msg_wrong_config_name");
        }
        if (!isset(self::$instance[$name])) {
            self::$instance[$name] = new self($name);
        }
        return self::$instance[$name];
    }

    public function get($section, $name = null, $default = null)
    {
        if (is_null($default) && is_null($name) && !isset($this->data[$section]) || !is_null($name) && !isset($this->data[$section][$name])) {
            throw new Exception("Parameter {$name} not found in section {$section}", 404);
        }
        return is_null($name) ? $this->data[$section] : $this->data[$section][$name];
    }
}
