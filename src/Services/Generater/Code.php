<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Digila\Suite\Services\Generater;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Code
{
    /**
     * コードの作成
     * 
     * @return string BIGINT
     */
    public static function generate($config)
    {
        $code = null;

        foreach ($config as $key => $num) {
            switch ($key) {
                case 'az':
                    for ($i=0;$i < $num; $i++) {
                        $code .= collect(range('a', 'z'))->random();
                    }
                    break;
                case 'AZ':
                    for ($i=0;$i < $num; $i++) {
                        $code .= collect(range('A', 'Z'))->random();
                    }
                    break;
                case 'num':
                    for ($i=0;$i < $num; $i++) {
                        $code .= collect(range('0', '9'))->random();
                    }
                    break;
                default:
                    break;
            }
        }
        
        return $code;
    }
    
    
}