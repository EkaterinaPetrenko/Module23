<?php 

interface EnginInterface
{
    protected function honking();
    protected function drive(string $direction);
    protected function addFunction();
    protected function turnWipers();
}

abstract class Engines implements EnginInterface
{
    // Функция подачи звукового сигнала
    protected function honking()
    {
        echo $this->sound;
    }

    // Функция езды вперед / назад
    protected function drive(string $direction)
    {
        if ($direction == 'forward') {
            echo "Едем вперед!\n";
        } elseif ($direction == 'back') {
            echo "Едем назад!\n";
        }
    }

    // Функция дополнительных возможностей машины
    abstract protected function addFunction();
    
    // Функция включения дворников,
    protected function turnWipers() 
    {                                       
        echo "Дворники включены\n";
    }
}

// Класс легковых машин
class Cars extends Engines
{
    protected $sound = "Bip-bip!\n";
    private $saloonTrim;                // Элемент индивидуальности для автомобиля: отделка салона
    
    // Геттер отделки салона
    public function getSaloonTrim()     
    {
        return $this->saloonTrim;
    }

    protected function nitrOxide()        // Доп.способность для автомобиля: ускорение при подаче закиси азота
    {                                    
        echo "Подача закиси азота\n";
    }

    public function addFunction()
    {
        $this->turnWipers();
        $this->nitrOxide();
    }
}

// Класс танков
class Tanks extends Engines
{
    protected $sound = "Ba-bah!\n";
    private $typeTracks;             // Элемент индивидуальности для танка: тип гусениц
    
    public function getTypeTracks()  // Геттер типа гусениц
    {
        return $this->typeTracks;
    }

    protected function shooting()      // Доп.способность для танка: стрельба 
    {
        echo "Стреляем!\n";
    }

    public function addFunction()
    {
        $this->shooting();
        $this->honking();
    } 
}

// Класс спецтехники
class SpecEquipment extends Engines
{
    protected $sound = "Bip-bip!\n";
    private $bodyColor;             // Элемент индивидуальности для спецтехники: цвет кузова
    
    // Геттер цвета кузова
    public function getBodyColor() 
    {
        return $this->bodyColor;
    }

    // Доп.способность для спецтехники: управление ковшом
    protected function liftBucket()    
    {
        echo "Поднимаем ковш!\n";
    }

    public function addFunction()
    {
        $this->turnWipers();
        $this->honking();
        $this->liftBucket();
    }
}

$Engine = new Cars;

function testEngines (Engines $Engine)
{
    $this->drive("forward");
    $this->addFunction();
    $this->drive("back");
}
?>
