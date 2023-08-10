<?php

// Класс для применения эффекта фильтра изменения яркости изображения
class FilterTransform extends ImageTransform {
    private $brightness; // Значение яркости

    // Конструктор класса, принимает значение яркости
    public function __construct($brightness) {
        $this->brightness = $brightness;
    }

    // Метод для применения эффекта к изображению
    public function apply($image) {
        // Изменяем яркость изображения, используя заданное значение яркости
        // Второй аргумент метода brightnessContrastImage() - значение контраста, в данном случае 0
        $image->brightnessContrastImage($this->brightness, 0);
    }
}
