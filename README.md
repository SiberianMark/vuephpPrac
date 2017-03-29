VueThink
===============

## 项目介绍
VueThink是一套基于Vue全家桶（Vue2.x + Vue-router2.x + Vuex）+ Thinkphp的前后端分离框架。
脚手架构建也可以通过vue官方的vue-cli脚手架工具构建
实现了一般后台所需要的功能模块

VueThink不仅适用于管理后台或管理系统开发，且广泛适用于B/S架构的项目开发。VueThink是对前后端分离技术的应用实践，2016年由洪睿科技的技术团队研发并投入商业开发使用，已有许多的商业项目实践。而今框架开源，希望能有更多志同道合的伙伴参与VueThink的迭代 ^_^

## 使用许可：
VueThink是基于MIT协议的开源框架，它完全免费。你可以免费下载VueThink，用来搭建自己的或者团体的软件。

##主要适用技术栈
* 后端框架：ThinkPHP 5.x
* 前端MVVM框架：Vue.JS 2.x
* 开发工作流：Webpack 1.x
* 路由：Vue-Router 2.x
* 数据交互：Axios
* 代码风格检测：Eslint
* UI框架：Element-UI 1.1.6
* JS函数库：Lodash

> VueThink的运行环境要求PHP5.4以上。

详细开发文档参考 [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)


* 登录、退出登录
* 修改密码、记住密码
* 菜单管理
* 系统参数
* 权限节点
* 岗位管理
* 部门管理
* 用户组管理
* 用户管理

### Demo
演示地址：<http://demo.vuethink.com>

用户名：user01

密码：user01

### QQ群交流
欢迎加入qq群：340506819

### 开发依赖
* vue <https://vuefe.cn/v2/guide/>
* element-ui@1.1.3  <http://element.eleme.io/1.1/#/zh-CN/component/installation>
* axios  <https://github.com/mzabriskie/axios>
* fontawesome <http://fontawesome.io/icons/>
* js-cookie  <https://github.com/js-cookie/js-cookie>
* lockr  <https://github.com/tsironis/lockr>
* lodash  <http://lodashjs.com/docs/>
* moment  <http://momentjs.cn/>


### 数据交互
数据交互通过axios以及RESTful架构来实现

用户校验通过登录返回的auth_key放在header

值得注意的一点是：跨域的情况下，会有预请求OPTION的情况

附上接口文档：<http://api.vuethink.com>

### Server搭建
服务端使用的框架为thinkphp5.搭建前请确保拥有lamp/lnmp/wamp环境。

集成环境推荐使用phpstudy：<http://www.phpstudy.net/> 

这里所说的搭建其实就是把server框架放入WEB运行环境，并使用80端口。

导入服务端根文件夹数据库文件install.sql，并修改config/database.php配置文件。

* PHP >= 5.4.0
* PDO PHP Extension
* MBstring PHP Extension
* CURL PHP Extension

服务端开发手册请参考：<http://www.kancloud.cn/manual/thinkphp5/118003>

当访问 <http://localhost>, 出现“vuethink接口”即代表后端接口搭建成功。

p.s 如果使用的nginx服务，请设置重写规则
```
location / {

    if (!-e $request_filename) {

        rewrite ^(.*)$ /index.php?s=$1 last;

        break;

    }
}
```





搭建步骤：
	确保已安装nodejs以及服务器集成开发环境upupw或者phpstudy或者WAMP等等
```1.下载代码包，解压文件夹



2.### 前端搭建
	cmd 进入frontEnd文件夹
	运行npm install
	之后运行npm run dev

请参考frontEnd里的README文件
```



3. ####
   ##########建立本地模板数据库：复制用数据库客户端平台navicat在本地数据库打开install.sql文件，运行sql代码建立本地数据库
   ##########配置数据库文件：php/config/database.php映射到本地数据库，填写本地数据库的地址
   							 // 服务器地址
						    'hostname'       => '127.0.0.1',
						    // 数据库名
						    'database'       => 'vuethink',
						    // 用户名
						    'username'       => 'root',
						    // 密码
						    'password'       => 'root',
						    // 端口
						    'hostport'       => '3306',
4. 修改前端服务器连接地址： frontEnd/build/webpack.base.conf.js/修改
							var DEV_HOST = JSON.stringify('http://www.vuethink.jm:80/')//为本地主机地址以及端口号
							var PUB_HOST = JSON.stringify('http://www.vuethink.jm:80/')//为部署主机地址以及端口号
5. 重启npn run dev



### 前端目录导航
	--fontEnd
		--build	//流程管理相配置
			build.js         	 //打包执行文件
			check-versions.js    //版本控制文件
			dev-client.js
			dev.server.js
			utils.js
			webpack.base.conf.js //webpack基础配置
			webpack.dev.conf.js  //webpack开发环境配置
			webpack.prod.conf.js //webpack生产环境配置
		--config  //环境相关配置
			dev.env.js
			index.js    
			prod.env.js
		--node_modules  //项目依赖模块
		--src
			--assets          //应用相关静态文件
				--css
				--fonts
				--images
				--js
					.DS_Store
					filter.js
					form_com.js
					global.js       //共用方法封装
					http.js 	    //Ajax方法封装
					list_com.js
				--plugins
				.DS_Story
			--components   //应用页面组件
				--Account          //账号相关
				--Administrative   //
					--personnel
						--users
						.DS_Story
					--structures
						--groups
						--position
						--structures
						.DS_Store
					--system
						--config
						--menu
						--rule
				--Common         //可复用组件
				DS_Store
				Home.vue         //首页
				refresh.vue      //

			--Vuex         //应用状态管理
			.DS_Store
			App.vue    //应用入口组件
			main.js    //应用入口
			routes.js  //应用路由
		.babelrc       //es6转换配置文件
		.eslintrc.json //代码风格检测配置文件
		index.html     //vue应用入口文件 在webpack中配置
		package.json   //nodejs项目配置文件
		README.md      //项目说明文件

### 前端运行逻辑节点汇总
	1. main.js 作为入口文件在webpack工具下 /build/webpack.base.conf.js下进行配置
	2. login.vue 作为运行首页面主要由路由所决定，在/src/routes.js下配置为根目录，而后在main.js中通过路由注入激活整个app的路由配置
	3. routes.js 定义了整个app的路由跳转
	4. /src/js/http.js 中resetCommonData用于接收用户登录之后返回的菜单等权限信息之后进行路由重定义处理并跳转到权限默认界面（通过router.replace()特性进行跳转）


