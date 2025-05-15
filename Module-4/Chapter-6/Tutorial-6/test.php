<php?
    class classname {
        public $attribute;
        public $atribute1;
        public $attribute2;

        function __construct($param) {
            echo "Constructor called with paramater ".$param."<br />";
        }

        function operation($param) {
            $this->attribute = $param;
            echo $this->attribute;
        }

        function operation1() {

        }

        function operation2($param1, $param2) {

        }

        function __destruct() {

        }
    }

    $a = new classname("First");
    $b = new classname("Second");

    $a->attribute = "value";
    echo $a->attribute;

    $a->operation1();
    $a->operation2(12, "test");

    $x = $a->operation1();
    $y = $a->operation2(12, "test");
?>