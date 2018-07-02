<?php
/**
 * Created by PhpStorm.
 * User: zhuto
 * Date: 2018/7/2
 * Time: 13:22
 */

namespace App;


use Illuminate\Support\Facades\Auth;

trait RecordInfo
{
    //laravel boot打头的静态方法会在启动的时候就执行
    public static function bootRecordInfo()
    {
        foreach(static::getModelEvents() as $event){
                static::$event(function ($model){
                    $model->recordInfo();
                });
        }
    }
    public function recordInfo()
    {
        UserRecord::create([
            'user_id' => Auth::id(),
            'record_id' => $this->id,
            'record_type' => get_class($this),
        ]);
    }
    public static function getModelEvents()
    {
        //判断静态的事件是否存在,存在的话就返回它本身
        //否则直接返回create
        if(isset(static::$recordEvents)){
            return static::$recordEvents;
        }
        return ['created'];
    }
}