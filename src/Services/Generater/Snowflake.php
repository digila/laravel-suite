<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Digila\Suite\Services\Generater;

use Illuminate\Support\Facades\DB;

class Snowflake
{
    /**
     * 64bitのユニークIDの作成
     * 
     * @return string BIGINT
     */
    public static function generate()
    {
        $epoch = config('digilasuite.generater.snowflake.epoch');
        
        // 41bit -- 現在時刻のタイムスタンプ
        $time = floor(microtime(true) * 1000);
        $time -= $epoch;
        
        $base = decbin(pow(2, 40) - 1 + $time);

        // 10bit -- サーバーID
        $serverid = decbin(pow(2, 9) - 1 + self::getServerId());
        
        // 12bit -- ランダムパート
        $random = mt_rand(1, pow(2, 11) - 1);
        $random = decbin(pow(2, 11)-1 + $random);
        
        $id = bindec($base) . bindec($serverid) . bindec($random);
        
        return (string) $id;
    }
    
    /**
     * MyDQLデータベースのサーバーIDを取得
     * 
     * @return int
     */
    private static function getServerId()
    {
        $result = DB::select('SELECT @@server_id as server_id LIMIT 1');
        return $result[0]->server_id;
    }
    
    /**
     * IDからタイムスタンプを取得
     * 
     * @param type $particle
     * @return timestump
     */
    public function timeFromId($particle)
    {
        return sprintf(bindec(substr(decbin($particle),0,41)) - pow(2,40) + 1 + self::EPOCH);
    }
    
}