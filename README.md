### 基于laravel的联通短信群发包
##### 使用前说明：
- 请确保你已经安装了laravel，且版本>=5.5
- 请使用PHP7版本
- 默认发送验证码类型短信:type=yzm，还可以发送营销类短信:type=yx，只需传入send()方法第三个参数指定即可,但是使用前，你需要找到配置文件(/config/mes.php)，进行配置
- 短信支持两种签名模式：sendGWMsg -> 不带系统签名，需要再内容前面加【签名】；sendNormMsg -> 自带系统签名；通过send()方法传入第4个参数指定

##### 如何使用？
```php
1. composer require bkqw/mes
2. php artisan vendor:publish 
   选择 Bkqw\Mes\Providers\MesServiceProvider 
   该命令会在config目录下生成mes.php配置文件，请根据实际情况修改配置
3. 你可以这样调用： 
        use Bkqw\Mes\MesAction;
        app()->make(MesAction::class)->send($mobile, $content, $type, $method);
   也可以使用门面：
        use Bkqw\Mes\Facades\MesAction; 
        MesAction::send($mobile, $content, $type, $method);        
```

##### 完整代码示例：
```php
<?php

namespace App\Http\Controllers;

use Bkqw\Mes\Facades\MesAction;

class MesController extends Controller
{
    public function send()
    {
        try{
            $mobile = ['your mobile 1', 'your mobile 2', '...'];
            $content = '【八块钱网】下午好';
            $type = 'yx';
            $method = 'sendGWMsg';
            $res = MesAction::send($mobile, $content, $type, $method);
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return $res;
    }
}
```