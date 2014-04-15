<?php

class SuperParser
{
    protected $_stack = array();
    protected $_models = array();
    protected $_file = "";
    protected $_parser = null;

    protected $_currentId = "";
    protected $_current = "";

    public function __construct($file)
    {
        $this->_file = $file;

        $this->_parser = xml_parser_create("UTF-8");
        xml_set_object($this->_parser, $this);
        xml_set_element_handler($this->_parser, "startTag", "endTag");
        xml_set_character_data_handler($this->_parser, "contents"); 
    }

    public function contents($parser, $data) {
        if ($this->_current == "MODEL") {
            array_push($this->_models,$data);
        }
        if ($this->_models && count($this->_models) >= 10 ) {
            echo implode("\n", $this->_models);
	    echo "\n";
            die;
        }
     }

    public function startTag($parser, $name, $attribs)
    {
        array_push($this->_stack, $this->_current);

        $this->_current = $name;
    }

    public function endTag($parser, $name)
    {
        $this->_current = array_pop($this->_stack);
    }

    public function parse()
    {
        $fh = fopen($this->_file, "r");
        if (!$fh) {
            die("Epic fail!\n");
        }

        while (!feof($fh)) {
            $data = fread($fh, 4096);
            xml_parse($this->_parser, $data, feof($fh));
        }
    }
}

$parser = new SuperParser("https://s3-eu-west-1.amazonaws.com/opsway-share/g.xml");
$parser->parse();
