# TinyFixtures
Small library for generating PHP fixtures based on associative arrays (fe. from yaml)

Given:
   
    class Point
    {
       private $x;
       private $y;
       private $z;
       
       public function __construct($x, $y, $z)
       {
           $this->x = $x;
           $this->y = $y;
           $this->z = $z;
      }
    }

Provide all values as associative array:
    
    $generator = new FixturesGenerator();
    $generator->generate(Point::class, ['z' => 1, 'x' => 2, 'y' => 3]); // no constructor call
    
Or provide array of following arguments to force constructor call if it's more convinient:

    $generator = new FixturesGenerator();
    $generator->generate(Point::class, [1, 2, 3]); // constructor called

It will gues class from doc annotations:

    class Vector
    {
       /**
        * @var \Full\Path\Point
        */
       private $start;
       
       /**
        * @var Point
        */
       private $end;
    }
    
    $generator = new FixturesGenerator();
    $generator->generate(Vector::class, [ 'start' => [1, 2, 3], 'end' => [4, 5, 6] ]);

Skip array notation for simple value objects:

    class Money
    {
      private $money;
      
      public function __construct($money)
      {
         $this->check($money);
         $this->money = $money;
      }
      
      /**
       * @throws InvalidValueException
       */
       private function check($money)
       // ...
    }
    
    $generator = new FixturesGenerator();
    $generator->generate(Money::class, 100.00); // [100.00] is ok as well
    
    
  
  For more see [concrete examples](https://github.com/ekiwok/TinyFixtures/tree/master/examples).
  
  
