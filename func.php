<?php
function if_empty($_val, $_default = false){

    return isset($_val) || $_val ? $_val : $_default;
}