# Тестовое задание на вакансию "Тестировщик"

Необходимо написать автоматические тесты для класса Translate с помощью фреймворка PHPUnit:

* Проверка, что при получении ошибки от Яндекса создаётся Exception с нужным текстом и кодом
* Проверка, что при получении от Яндекса перевода он возвращается в методе translate

Условия:

* Запросов к реальному серверу Яндекса быть не должно
* ini-файл с настройками не должен подгружаться
* Конструктор класса Translate не должен вызываться в тесте

Желательно PHPUnit и компоненты для него устанавливать через composer. На почту a_paramonov@irknet.ru отправить полный архив, включающий в себя существующие скрипты, тесты и composer.json (если он будет)

Для проверки работоспособности нужно скопировать include/config/translate.ini.example в include/config/translate.ini и прописать там ключ доступа к Yandex translate API. Ключ, указанный в примере, так же работает
Запуск скрипта: php translate.php
