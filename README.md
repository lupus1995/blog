# Блог на yii2(backend) и react(frontend)

Пет проект для того, чтобы освежить знания по php, построению бекенд логики и написанию webpack с нуля

# Настройка phpcodesnifer

Установить через композер глобально (composer global require squizlabs/php_codesniffer) или локально (composer require squizlabs/php_codesniffer) или [скачать исходник](https://cs.symfony.com/download/php-cs-fixer-v2.phar) и поместить его в корень проекта

Далее в описании пойдет настройка для редактрора visual studio code.

Необходимо скачать приложение [phpcs](https://github.com/ikappas/vscode-phpcs.git). Создать файл phpcs.xml, в котором описываются правила для линтера. Если файл phpcs.xml будет изменен, то чтобы правила вступили в силу необходимо перезапустить редактор.

Для корректного форматирования кода на php необходимо скачать приложение vscode-php-cs-fixer. Настройки редактирование задаются в файле .php_cs(название может быть другое)
