<?php
    class View
    {
        public function render($viewScript){
            //render view based on passed data
            require($viewScript);
        }
    }
?>