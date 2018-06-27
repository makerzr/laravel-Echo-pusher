## laravel框架结合laravelEcho+pusher驱动制作一个简单的聊天室项目
-
### ①安装依赖,执行下面的命令
```
composer install
```
### ②复制.env.example 重新命名为.env
```
cp .env.production .env
```
### ③进入.env文件,修改BROADCAST_DRIVER为pusher
```
BROADCAST_DRIVER=pusher
```
### ④开启广播服务提供者的服务器
进入config文件夹下,找到app.php,并且打开它,对下面的进行取消注释
```
App\Providers\BroadcastServiceProvider::class,
```
