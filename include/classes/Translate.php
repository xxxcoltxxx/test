<?php

/**
 * class Translate
 */
class Translate
{
    /** @var string */
    public $lang = "ru";
    /** @var  Curl */
    private $curl;
    private $config;

    private $error_codes = [
        401 => "Неправильный ключ API",
        402 => "Ключ API заблокирован",
        403 => "Превышено суточное ограничение на количество запросов",
        404 => "Превышено суточное ограничение на объем переведенного текста",
        413 => "Превышен максимально допустимый размер текста",
        422 => "Текст не может быть переведен",
        501 => "Заданное направление перевода не поддерживается"
    ];

    public function __construct()
    {
        $this->curl = new Curl("https://translate.yandex.net");
        $this->config = parse_ini_file(PATH_ROOT . "include/config/translate.ini");
    }

    public function translate($phrase, $lang_from = "ru", $lang_to = "en")
    {
        $params = ['key' => $this->config['key'], 'text' => $phrase, 'lang' => "{$lang_from}-{$lang_to}"];
        $response = json_decode($this->curl->get("api/v1.5/tr.json/translate", $params), true);
        if ($response['code'] != 200) {
            throw new Exception($this->error_codes[$this->curl->last_http_code] ?: "Unknown error", $this->curl->last_http_code);
        }
        return $response;
    }
}
