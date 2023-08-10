<?php

// Класс для масштабирования изображения
class ScaleTransform extends ImageTransform {
    private $scaleFactor; // Фактор масштабирования

    // Конструктор класса, принимает фактор масштабирования
    public function __construct($scaleFactor) {
        $this->scaleFactor = $scaleFactor;
    }

    // Метод для применения масштабирования к изображению
    public function apply($image) {
        // Вычисляем новые размеры изображения, умножая текущие размеры на фактор масштабирования
        $newWidth = $image->getImageWidth() * $this->scaleFactor;
        $newHeight = $image->getImageHeight() * $this->scaleFactor;

        // Применяем масштабирование к изображению
        $image->scaleImage($newWidth, $newHeight);
    }
}
