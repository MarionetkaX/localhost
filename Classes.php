<?php

class TaskManager{
    /** @var TaskPrototype[]  */
    private $aTasks = [];

    /**
     * @var null|TaskPrototype
     */
    public $oCurrentTask = null;

    private $sConfigTasks = [
        [
            'title' => 'Сумма чисел',
            'description' => 'Посчитать сумму двух чисел',
            'class' => TaskSumm::class
        ],
        [
            'title' => 'Разность чисел',
            'description' => 'Посчитать разность двух чисел',
            'class' => TaskSubt::class
        ],
        [
            'title' => 'Произведение чисел',
            'description' => 'Посчитать произведение двух чисел',
            'class' => TaskComp::class
        ],
        [
            'title' => 'Частное чисел',
            'description' => 'Посчитать частное двух чисел',
            'class' =>TaskPriv::class
        ],
        [
            'title' => 'Факториал числа n',
            'description' => 'Вычислить n!',
            'class' =>TaskFact::class
        ],
        [
            'title' => 'Числа Фибоначчи',
            'description' => 'Вывести n-ый элемент численности фибоначи',
            'class' =>TaskFib::class
        ],
        [
            'title' => 'Генерация массива',
            'description' => 'Сгенерировать одномерный массив из случайных n элементов',
        ],

        [
            'title' => 'Изменение массива',
            'description' => 'Сгенерировать одномерный массив из случайных n элементов. Вывести исходный массив. Вывести отдельно четные и нечетные элементы массива',
        ],
        [
            'title' => 'Сортировка массива. Пузырек',
            'description' => 'Сгенерировать случайный массив. Вывести изначальный массив, отсортировать его <a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0_%D0%BF%D1%83%D0%B7%D1%8B%D1%80%D1%8C%D0%BA%D0%BE%D0%BC">пузырьком</a>',
        ],
        [
            'title' => 'Сортировка массива. Шейкер',
            'description' => 'Сгенерировать случайный массив. Вывести изначальный массив, отсортировать его <a href="https://ru.wikipedia.org/wiki/%D0%A1%D0%BE%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%BA%D0%B0_%D0%BF%D0%B5%D1%80%D0%B5%D0%BC%D0%B5%D1%88%D0%B8%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5%D0%BC">перемешиванием</a>',
        ]

    ];

    function __construct()
    {
        $iTask = isset($_GET['task'])? $_GET['task'] : false;
        foreach ($this->sConfigTasks as $key => $item) {
            if (isset($item['class']) && class_exists($item['class'])) {
                $this->aTasks[$key+1] = new $item['class'] (array_merge($item,['number' => $key+1]));
            }
            else{
                $this->aTasks[$key+1] = new TaskExample(array_merge($item,['number' => $key+1]));
            }
        }

        if ( $iTask && isset($this->aTasks[$iTask]) ) $this->oCurrentTask = $this->aTasks[$iTask];
    }

    public function buildMenu(){
        foreach ($this->aTasks as $oTask){
            echo
            "<div>
                <p>Задание №{$oTask->number}.<a href='/?task={$oTask->number}'> {$oTask->title}</a></p>
            </div>";
        }
    }

    public function buildResult(){
       echo "<div>";

        echo "<p>Задание №{$this->oCurrentTask->number}. {$this->oCurrentTask->title} <a href='/'>Назад к списку</a></p>";
        echo "<p>Описание: {$this->oCurrentTask->description}</p>";
        echo "<p>Результат: </p>";
       foreach ( $this->oCurrentTask->func() as $sMessage){
            echo "<p> {$sMessage} </p>";
       }
       echo "</div>";
    }

}

abstract class  TaskPrototype
{
    public $title;
    public $number;
    public $description;

    public function __construct($params = [])
    {
        foreach ($params as $key => $value){
            if (property_exists(self::class,$key))
                $this->$key = $value;
        }

    }


    /**
     * @return string[]
     */
    abstract public function func();
}

class TaskExample extends TaskPrototype{
    public function func()
    {
        return ['Необходимо создать нужный класс с необходимыми функциями'];
    }

}

class TaskSumm extends TaskPrototype{

    public $x1 = 1;
    public $x2 = 1;

    private function summ($x1,$x2){
        return $x1+$x2;
    }

    public function func()
    {
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1+x2={$this->summ($this->x1,$this->x2)}";

        return $out;
    }

}

class TaskSubt extends TaskPrototype{

    public $x1=7;
    public $x2=2;

    private function subt($x1,$x2){
        return $x1-$x2;
    }

    public function func()
    {
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1-x2={$this->Subt($this->x1,$this->x2)}";
        return $out;
    }

}

class TaskComp extends TaskPrototype{

    public $x1=7;
    public $x2=2;

    private function comp($x1,$x2){
        return $x1*$x2;
    }

    public function func()
    {
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1*x2={$this->comp($this->x1,$this->x2)}";
        return $out;
    }

}

class TaskPriv extends TaskPrototype{

    public $x1=8;
    public $x2=2;

    private function priv($x1,$x2){
        return $x1/$x2;
    }

    public function func()
    {
        $out[] = "Число x1={$this->x1}";
        $out[] = "Число x2={$this->x2}";
        $out[] = "x1:x2={$this->priv($this->x1,$this->x2)}";
        return $out;
    }

}

class TaskFact extends TaskPrototype{


    public $n = 7;
    public $i;
    public $s;

    private function fact($n){

        if ($n == 0)
        {
            return 1;
        }
        $s = 1;
        for ($i = 1; $i <= $n; $i++)
        {
            $s = $s * $i;
        }
        return $s;
    }

    public function func()
    {
        $out[] = "n!={$this->n}";
        $out[] = "n!={$this->fact($this->n)}";
        return $out;
    }
}

class TaskFib extends TaskPrototype{

    public $fib1 = 0;
    public $fib2 = 1;
    public $i;
    public $sum;
    public $n;
    public $s;

    private function fib($fib1,$fib2){
        $i=1;
        $n=5;
        while ($i<$n) {
            $sum = $fib2 + $fib1;
            $fib1 = $fib2;
            $fib2 = $sum;
            $i++;
        }
    return $i<$n;
    }


    public function func()
    {
        $out[] = "n!={$this->fib($this->sum)}";
        return $out;
    }

}