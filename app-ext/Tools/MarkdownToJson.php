<?php

namespace Extended\Tools;

class MarkdownToJson{

    private $data;
    private $text;

    public function __construct($title,$text){
        $this->data = new \stdclass;
        $this->data->title = $title;
        $this->data->questions = [];
        $this->text = $text;
        $this->init();
    }

    public function init(){

       $array = explode("---",$this->text);
       array_shift($array);
       foreach($array AS $arr){
        
        $question = new \stdclass;

        $props = explode("-",$arr);
        array_shift($props);
        foreach($props AS $prop){
            $p = explode(":",$prop);

            $value = trim($p[1]);

            if(strpos($value,",") !== false){
                $value = explode(",",$value);
            }
            $question->{trim($p[0])} = $value;
        }
        $this->data->question[] = $question;
       }
        return $this;
    }

    public function getData(){
        return $this->data;
    }
    public function getText(){
        return $this->text;
    }
}