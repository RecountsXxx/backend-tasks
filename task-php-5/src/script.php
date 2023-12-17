<?php
class Input{
    protected $background;
    protected $width;
    protected $height;
    protected $name;
    protected $value;

    public function __construct($background, $width, $height, $name, $value) {
        $this->background = $background;
        $this->width = $width;
        $this->height = $height;
        $this->name = $name;
        $this->value = $value;
    }
}
class Control{
    protected $background;
    protected $width;
    protected $height;
    protected $name;
    protected $value;
    protected $items;

    public function __construct($background, $width, $height, $name, $value,$items) {
        $this->background = $background;
        $this->width = $width;
        $this->height = $height;
        $this->name = $name;
        $this->value = $value;
        $this->items = $items;
    }
}
class Radio extends Input{
    private bool $isChecked;

    public function __construct($background, $width, $height, $name, $value,$isChecked)
    {
        parent::__construct($background, $width, $height, $name, $value);
        $this->isChecked = $isChecked;
    }
    public function getCheckedState() : bool{
        return $this->isChecked;
    }
    public function setCheckedState(){
        $this->isChecked = true;
    }
    public function setUncheckedState(){
        $this->isChecked = false;
    }

    public function getHTMLRadio(){
        return "<label for='$this->name'>$this->value</label><input type='radio' checked='$this->isChecked' name='$this->name' style='background: $this->background; width: $this->width; height: $this->height;'>";
    }
}

class Checkbox extends Input{
    private bool $isChecked;

    public function __construct($background, $width, $height, $name, $value,$isChecked)
    {
        parent::__construct($background, $width, $height, $name, $value);
        $this->isChecked = $isChecked;
    }
    public function getCheckedState() : bool
    {
        return $this->isChecked;
    }
    public function setCheckedState()
    {
        $this->isChecked = true;
    }
    public function setUncheckedState()
    {
        $this->isChecked = true;
    }
    public function getHTMLCheckbox(){
        return "<label for='$this->name'>$this->value</label><input type='checkbox' checked='$this->isChecked' name='$this->name' style='background: $this->background; width: $this->width; height: $this->height;'>";
    }
}
class Text extends Input{
    private $placeholder;

    public function __construct($background, $width, $height, $name, $value,$placeholder)
    {
        parent::__construct($background, $width, $height, $name, $value);
        $this->placeholder = $placeholder;
    }

    public function getText(){
        return $this->value;
    }
    public function getHTMLText(){
        return "<label for='$this->name'>$this->value</label><input type='text' placeholder='$this->placeholder' name='$this->name' style='background: $this->background; width: $this->width; height: $this->height;'>";
    }
}
class Button extends Input{
    public function __construct($background, $width, $height, $name, $value,$placeholder)
    {
        parent::__construct($background, $width, $height, $name, $value);
        $this->placeholder = $placeholder;
    }
    public function getHTMLButton(){
        return "<input type='submit' placeholder='$this->placeholder' name='$this->name' value='$this->value' style='background: $this->background; width: $this->width; height: $this->height;'>";
    }
}
class Select extends Control{
    public function __construct($background, $width, $height, $name, $value, $items)
    {
        parent::__construct($background, $width, $height, $name, $value, $items);
    }
    public function getItems(){
        return $this->items;
    }
    public function setItems($items)
    {
        $this->items = $items;
    }
    public function addItems($item){
        $this->items[] = $item;
    }
    public function getHTMLSelect(){
        $selectHTML = "<select style='background: $this->background; width: $this->width; height: $this->height;'>" ;

        foreach ($this->items as $item){
            $selectHTML .= '<option>' . $item . '</option>';
        }
        $selectHTML .= '</select>';
        return $selectHTML;

    }


}



$inputEmail = new Text('white',50,50,'email','Email','Enter email');
echo $inputEmail->getHTMLText() . '</br>';

$inputName = new Text('white',50,50,'name','Name','Enter name');
echo $inputName->getHTMLText() . '</br>';

$inputPhone = new Text('white',50,50,'phone','Phone','Enter phone');
echo $inputPhone->getHTMLText() . '</br>';

$inputAdress = new Text('white',50,50,'adress','Adress','Enter adress');
echo $inputAdress->getHTMLText() . '</br>';

$select = new Select('white',50,50,'state','Male',['Ukraine','USA','UK']);
echo $select->getHTMLSelect() . '</br>';

$radioMale = new Radio('white',50,50,'state','Male',false);
$radioFemale = new Radio('white',50,50,'state','Female',false);
$radioSubs = new Radio('white',50,50,'state','Susbscribe',false);

echo $radioMale->getHTMLRadio() . '</br>';
echo $radioFemale->getHTMLRadio() . '</br>';
echo $radioSubs->getHTMLRadio() . '</br>';

$button = new Button('white',50,50,'buttonSubmit','Send',false);
echo $button->getHTMLButton();
?>
