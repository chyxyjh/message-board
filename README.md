# message-board
基于PHP和redis实现的极简易留言板

# 服务器端
服务器后端基于PHP Slim框架实现，初步实现了查看留言的GET接口和提交留言的POST接口。

（提交留言按照REST规范PUT接口语义化更好，不过为了简化对于跨域请求的处理，初步采用POST接口）

## 代码结构

/php/src 服务器端代码目录

/php/src/index.php controller入口

/php/src/redis redis相关代码

/php/src/utils 工具类代码



# Web前端
基于JQuery和BootStrap实现，负责前端展示留言与提交留言

## 代码结构

/web/index.html 前端入口

/web/index.js JavaScript脚本

>请根据部署情况，修改/web/index.js 中`url`变量对应value