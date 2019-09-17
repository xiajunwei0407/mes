### 基于laravel的联通短信群发包
##### 使用前说明：
- 请确保你已经安装了laravel，且版本>=5.5
- 请使用PHP7版本


##### 如何使用？
```php
1. composer require bkqw/mes
2. php artisan vendor:pulish 
   选择 Bkqw\Mes\Providers\MesServiceProvider 
   该命令会在config目录下生成mes.php配置文件，请根据实际情况修改配置
3. 你可以这样调用： 
        use Bkqw\Mes\MesAction;
        app()->make(MesAction::class)->send($mobile, $content);
   也可以使用门面：
        use Bkqw\Mes\Facades\MesAction; 
        MesAction::send($mobile, $content);        
```

##### 完整代码示例：
```php
try{
    $mobile = ['your mobile 1', 'your mobile 2'];
    $content = '【八块钱网】我是一条短信';
    $res = MesAction::send($mobile, $content);
}catch (\Exception $e){
    return $e->getMessage();
}
return $res;
```