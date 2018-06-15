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
	0. npm run dev 开启整个项目（运行package.json下的script命令：node dev-server.js）开启开发服务器
		0.1 dev-server.js作为整个项目运行启动执行文件，主要是任务是加载webpack配置打包部署文件；并开启开发服务器监听部署路径,
			

	1. 打包完的路径包含index.html以及几个打包好的js文件
		1.1 index.html作为程序的入口文件，当用户访问部署路径时进行初始化，后续工作由应用内部逻辑决定
	2. 程序内部逻辑，与打包入口文件相对应的main.js作为应用的内部逻辑入口文件，主要完成应用的初始化工作
		2.1 包括应用所依赖的所有静态文件的模块引入
		2.2 vue路由注入
		2.3 vue状态管理注入
		2.4 模板注入
		2.5 节点挂载
		2.6 vue实例初始化
	3. login.vue 作为运行首页面主要由路由所决定，在/src/routes.js下配置为根目录，而后在main.js中通过路由注入激活整个app的路由配置

	4. routes.js 定义了整个app的路由跳转
	5. /src/js/http.js 中resetCommonData用于接收用户登录之后返回的菜单等权限信息之后进行路由重定义处理并跳转到权限默认界面（通过router.replace()特性进行跳转）

### 前端打包逻辑节点汇总
	0. npm run build 开启整个webpack项目（运行package.json下的script命令：node build.js）启动打包执行文件
		0.1 build.js作为整个webpack打包项目的启动运行文件，主要是任务是加载webpack配置文件并执行webpack命令启动webpack管理任务
				（webpack(webpackConfig, function (err, stats) {var webpackConfig=require('./webpack.prod.conf');
				  spinner.stop()
				  if (err) throw err
				  process.stdout.write(stats.toString({
				    colors: true,
				    modules: false,
				    children: false,
				    chunks: false,
				    chunkModules: false
				  }) + '\n')
				})）
 	1.在package.json定义入口命令：node build.js
 	2.在入口执行文件build.js引入webpack特定环境配置文件webpack.prod.conf.js以及执行webpack启动api:webpack(conf,function(){})
 	3.webpack文件配置一般分为两个环境，开发环境webpack配置webpack.dev.conf.js，生产webpack配置；第二步用的就是生产环境的webpack配置webpack.prod.conf.js；新建这两个文件并将特定环境的配置在这两个环境配置
 	  3.1配置将打包的js路径插入到filename的html模板中
 	  3.2具体工作插件配置
 	4.抽离出两个环境共用的webpack配置项成为webpack.base.conf.js并在webpack.prod.conf.js/webpack.dev.conf.js中引入并合并到对应的环境配置中
 	  共用配置文件配置项：
 	  4.1 开发以及部署服务器地址
 	  4.2 入口文件 main.js 
 	  4.3 打包文件输出路径
 	  4.4 代码风格检查eslint
 	  4.5 插件定义HOST
 	  4.6 共用路径重定向resolve
 	  4.7 模块依赖
 	  	  4.7.1 loader加载器
 	  	  		4.7.1.1 eslint,css,json babel等
 	  4.8 vue

### 各个环境基本配置项目
	1. 入口文件entry:[string | array | object]
	2. 输出文件output:
		output.path:[string]  //路径
		output.filename:[string] //文件名
		output.name:[string]  //模块集名
		output.hash
		output.chunkhash
		output.chunckFileName:[string]
	3. 模块依赖：module:
			module.loader:[{name:loadername}] //库list-of-loaders
	4. 重定向：resolve
	5. 插件：plugins:

#### vue运行逻辑
	1. 源代码入口文件为main.js
	   1.1 引入vue web依赖的模块
	   		1.1.1   import 'babel-polyfill' //配合Babel(只转化ES句法)使用，用于将ES6的新特性方法转化为浏览器可用的ES5JavaScript
			1.1.2	import Vue from 'vue'   //Vue框架
			1.1.3	import App from './App' //Vue挂载根节点入口文件
			1.1.4	import axios from 'axios'//基于Promise对象的Http通信模块，负责与后台数据交互
			1.1.5	import Lockr from 'lockr' //轻量级的LocalStorage交互模块，负责进行LocalStorage的增删查改
			1.1.6	import Cookies from 'js-cookie'//A simple, lightweight JavaScript API for handling browser cookies
			1.1.7	import _ from 'lodash' //JavaScript实用程序库，提供模块化，性能和附加功能。
			1.1.8	import moment from 'moment'//JavaScript 日期处理类库
			1.1.9	import ElementUI from 'element-ui'//基于Vue2.0基础框架实现的组件库，它面向企业级的后台应用，能够帮助你快速地搭建网站
			1.1.10	import 'element-ui/lib/theme-default/index.css'//element ui样式文件
			1.1.11	import routes from './routes' //自定义webapp应用路由
			1.1.12	import VueRouter from 'vue-router'//路由模块
			1.1.13	import store from './vuex/store' //vuex是vue组件的状态管理模块，用于管理组件生命周期内的数据以及方法各种状态
			1.1.14	import filter from './assets/js/filter'//Vue提供的一种自定义过滤器模式，用于自定义一些过滤器函数，处理输入的参数并输出处理结果
			1.1.15	import _g from './assets/js/global'//自定义公用JavaScript函数模块
			1.1.16	import NProgress from 'nprogress'//进度条模块
			1.1.17	import 'nprogress/nprogress.css'
			1.1.18	import 'assets/css/global.css'//公用css文件
			1.1.19	import 'assets/css/base.css'//公用css文件
	  1.2 数据交互http全局配置 
	  		1.2.1 地址
	  		1.2.2 timeout
	  		1.2.3 请求头
	  		1.2.4 请求方式
	  		...
	  1.3 路由注入前处理
	  1.4 路由注入后处理
	  1.5 路由注册
	  1.6 Vue实例化
	  	  1.6.1 根节点挂载
	  	  1.6.2 模板挂载
	  	  1.6.3 过滤器注入
	  	  1.6.4 路由注入
	  	  1.6.5 vuex插件状态管理注入
	2.Vue实例化后应用启动，应用根据注入路由动态加载渲染并发送对应的模块插件用于前端展示
	3.routes 定义如果访问根目录则渲染login.vue模板
	4.登录成功之后获取用户权限菜单根据菜单路由跳转到对应的权限页面
	5.vue目前的架构原理采用的是官方推荐的单文件组件设计模式
	6.模块化用的是ES6的export以及import特性：export导出模块，import引入模块，export default导出默认模块,当其他模块引用时没有指明则默认使用默认的
