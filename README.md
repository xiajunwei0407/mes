### 基于laravel的联通短信群发包
##### 使用前说明：
- 请确保你已经安装了laravel，且版本>=5.5
- 请使用PHP7版本


##### 如何使用？
```php
1. composer require bkqw/mes
2. php artisan vendor:pulish    
   该命令会在config目录下生成mes.php配置文件，请根据实际情况修改配置
3. 你可以这样调用： 
        app()->make(MesAction::class)->send($mobile, $content);
   也可以这样： 
        MesAction::send($mobile, $content);
   记得use命名空间： 
        use Bkqw\Mes\MesAction;
```