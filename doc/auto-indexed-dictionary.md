Auto Indexed Dictionary
=======================

Use an auto indexed dictionary if you want use definition method result as terms.

    class Term
    {
        private $label;
        public function __construct($label)
        {
            $this->label = $label;
        }
        public function getLabel()
        {
            return $this->label;
        }
    }

    class Definition
    {
        private $term, $text;
        public function __construct(Term $term, $text)
        {
            $this->term = $term;
            $this->text = $text;
        }
        public function getTerm()
        {
            return $this->term;
        }
        public function getText()
        {
            return $this->text;
        }

    }

    $dictionary   = new AutoIndexedDictionary('Definition', 'getTerm');
    $dictionary[] = new Definition(new Term('term 1'), 'definition 1');
    $dictionary[] = new Definition(new Term('term 2'), 'definition 2');

    foreach ($dictionary as $term => $value) {
        printf(
            "%s : %s\n",
            $term->getLabel(),
            $definition->getText()
        );
    }

    /* will output :
       term 1 : definitition 1
       term 2 : definitition 2
    */