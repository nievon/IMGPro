<?php

// Класс для поворота изображения
class RotateTransform extends ImageTransform {
    private $angle; // Угол поворота

    // Конструктор класса, принимает угол поворота
    public function __construct($angle) {
        $this->angle = $angle;
    }

    // Метод для применения поворота к изображению
    public function apply($image) {
        // Вызываем метод rotateImage() с пустым объектом ImagickPixel()
        // и передаем угол поворота для поворота изображения
        $image->rotateImage(new ImagickPixel(), $this->angle);
    }
}
