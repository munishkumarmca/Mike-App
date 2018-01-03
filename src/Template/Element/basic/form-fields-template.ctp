<?php 
$myTemplates = [
    'inputContainer' => '<div class="form-group input {{class}} {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="input {{class}} {{type}}{{required}} error">{{content}}{{error}}</div>'
];
$this->Form->templates($myTemplates);
?>