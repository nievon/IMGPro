<?php

// Подключение необходимых классов
require_once 'ImageTransform.php';
require_once 'ScaleTransform.php';
require_once 'RotateTransform.php';
require_once 'FilterTransform.php';

// Класс для редактирования изображений
class ImageEditor {
    private $imagePath; // Путь к исходному изображению
    private $outputPath; // Путь для сохранения результата
    private $transforms; // Массив объектов-трансформаций

    // Конструктор класса
    public function __construct($imagePath, $outputPath, $transforms) {
        $this->imagePath = $imagePath;
        $this->outputPath = $outputPath;
        $this->transforms = $transforms;
    }

    // Метод для применения всех трансформаций к изображению
    public function applyTransformations() {
        $image = new Imagick($this->imagePath);

        foreach ($this->transforms as $transform) {
            $transform->apply($image);
        }

        $image->writeImage($this->outputPath);
        echo "Изменения сохранены\n"; // Выводим сообщение об успешном завершении
    }
}

// Проверка, что переданы все необходимые аргументы
if (count($argv) < 5) {
    echo "Использование: php ImageEditor.php <путь_к_исходному_изображению> <путь_для_сохранения_результата> <эффект> <значение_эффекта>\n";
    exit(1);
}

// Парсинг аргументов из командной строки
$imagePath = $argv[1]; // Путь к исходному изображению
$outputPath = $argv[2]; // Путь для сохранения результата
$selectedEffect = $argv[3]; // Выбранный эффект
$effectValue = $argv[4]; // Значение для эффекта

$transformObjects = [];

// В зависимости от выбранного эффекта создаем соответствующий объект-трансформацию
switch ($selectedEffect) {
    case 'scale':
        $transformObjects[] = new ScaleTransform($effectValue);
        break;
    case 'rotate':
        $transformObjects[] = new RotateTransform($effectValue);
        break;
    case 'filter':
        $transformObjects[] = new FilterTransform($effectValue);
        break;
    default:
        echo "Неизвестный эффект: $selectedEffect\n";
        exit(1);
}

// Создание экземпляра ImageEditor и применение всех трансформаций
$editor = new ImageEditor($imagePath, $outputPath, $transformObjects);
$editor->applyTransformations();
