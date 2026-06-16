<?php
use App\Core\Csrf; function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');} function csrf_field(){return '<input type="hidden" name="_token" value="'.e(Csrf::token()).'">';} function money($n){return number_format((float)$n).' ریال';}
