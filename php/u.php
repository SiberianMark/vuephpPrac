<?php
error_reporting(E_ALL);
define('TimeZone', +8.0);
function _GET($n) { return isset($_GET[$n]) ? $_GET[$n] : NULL; }
function _SERVER($n) { return isset($_SERVER[$n]) ? $_SERVER[$n] : '[undefine]'; }
if (_GET('act') == 'phpinfo') {
if (function_exists('phpinfo')) phpinfo();
else echo 'phpinfo() Function has been disabled.';
exit;
}
$Info = array();
$Info['php_ini_file'] = function_exists('php_ini_loaded_file') ? php_ini_loaded_file() : '[undefine]';
function get_ea_info($name) { $ea_info = eaccelerator_info(); return $ea_info[$name]; }
function get_gd_info($name) { $gd_info = gd_info(); return $gd_info[$name]; }
function memory_usage() { $memory  = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB'; return $memory;}
function micro_time_float() { $mtime = microtime(); $mtime = explode(' ', $mtime); return $mtime[1] + $mtime[0];}
define('YES', '<span style="color: #008000; font-weight : bold;">Yes</span>');
define('NO', '<span style="color: #ff0000; font-weight : bold;">No</span>');
$up_start = micro_time_float();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP探针-UPUPW环境集成包APACHE专用版</title>
<meta name="keywords" content="PHP探针,PHP组件,UPUPW,UPUPW集成包,apache php,ionCube,memcache,APC,SendMail" />
<meta name="description" content="UPUPW环境集成包APACHE专用版PHP探针可检测ionCube,memcache,APC,SendMail等PHP组件." />
<meta name="author" content="UPUPW" />
<meta name="reply-to" content="webmaster@upupw.net" />
<meta name="copyright" content="UPUPW Team" />
<style type="text/css">
<!--
*{ margin:0px; padding:0px;}
body {background-color:#ffffff;color:#000000;margin:0px;font-family:"微软雅黑", Tahoma, sans-serif;}
input {text-align:center;}
a:link {color: #ff0000; text-decoration: none;}
a:visited {color: #ff0000; text-decoration: none;}
a:active {color: #aa0000; text-decoration: none;}
a:hover {color: #aa0000; text-decoration: none;}
table {border-collapse:collapse; margin-bottom:10px; clear:both;}
.tablex1{display:inline;float:left; width:500px;}
.tablex2{display:inline;float:right; width:500px; clear:right;}
.info tr td {padding:3px 10px 3px 10px;vertical-align:center;height:30px; border:3px #FFFFFF solid;}
.info th {font-weight:bold;border:3px #FFFFFF solid;height:24px;padding:3px 10px 3px 10px;background-color:#A9CFDD;}
.inp tr td {padding:3px 0px 3px 0px;vertical-align:center;text-align:center;height:30px; border:3px #FFFFFF solid;}
.head1 {background-color:#62ADC2;width:100%;font-size:36px;color:#ffffff;padding-top:20px; text-align:center; font-family: Georgia, "Times New Roman", Times, serif; font-weight:bold;}
.head2 {background-color:#A9CFDD; width: 100%; font-size: 18px; height:18px;color: #ffffff;border-top: #ffffff 2px solid;}
.el {text-align:left;background-color:#e1eff8;}
.er {text-align:right;background-color:#e1eff8;}
.ec {text-align:center;background-color:#A9CFDD; font-weight:bold;}
.fl {text-align:left;background-color:#efefef;color:#505050;}
.fr {text-align:right;background-color:#efefef;color:#505050;}
.fc {text-align:center;background-color:#efefef;color:#505050;}
.ft {text-align:center;background-color: #D9F9DE;color:#060;}
a.arrow {font-family:webdings,sans-serif;font-size:10px;}
a.arrow:hover {color:#ff0000;text-decoration:none;}
-->
</style>
</head>
<body>
<div class="head1">UPUPW PHP 探针</div>
<div class="head2"></div>
<div style="margin:0 auto;width:1001px; overflow:hidden;">
<br />
<table class="info tablex1">
  <tr>
    <th colspan="2">服务器信息</th>
  </tr>
  <tr>
    <td width="120" class="er">服务器域名</td>
    <td width="380" class="fl"><?=_SERVER('SERVER_NAME')?></td>
  </tr>
  <tr>
    <td class="er">服务器端口</td>
    <td class="fl"><?=_SERVER('SERVER_ADDR').':'._SERVER('SERVER_PORT')?></td>
  </tr>
  <tr>
    <td class="er">服务器环境</td>
    <td class="fl"><?=stripos(_SERVER('SERVER_SOFTWARE'), 'PHP')?_SERVER('SERVER_SOFTWARE'):_SERVER('SERVER_SOFTWARE')?></td>
  </tr>
  <tr>
    <td class="er">PHP运行环境</td>
    <td class="fl"><?=PHP_SAPI .' PHP/'.PHP_VERSION?></td>
  </tr>
  <tr>
    <td class="er" style="color: #ff0000;">PHP配置文件</td>
    <td class="fl"><?=$Info['php_ini_file']?></td>
  </tr>
  <tr>
    <td width="165" class="er">当前网站目录</td>
    <td width="235" class="fl"><?=_SERVER('DOCUMENT_ROOT')?></td>
  </tr>
  <tr>
    <td class="er">服务器标准时</td>
    <td class="fl">
	<?=gmdate('Y-m-d', time()+TimeZone*3600)?> <?=gmdate('H:i:s', time()+TimeZone*3600)?> <span style="color: #999999;">(<?=(TimeZone<0?'-':'+').gmdate('H:i', abs(TimeZone)*3600)?>)</span>
    </td>
  </tr>
  <tr>
    <td class="er">软件管理设置</td>
    <td class="fl">
    <a target="_blank" href='<?=_SERVER('PHP_SELF')?>?act=phpinfo'>PHP详细信息</a> | <a target="_blank" href="/pmd">phpMyAdmin管理</a>
    </td>
  </tr>
</table>

<table class="info tablex2">
  <tr>
    <th colspan="2">PHP功能组件开启状态</th>
  </tr>
  <tr>
    <td class="er">MySQL Client组件</td>
    <td class="fl"><?=function_exists('mysql_close') ? YES : NO ?></td>
  </tr>
  <tr>
    <td class="er">SQLite Client组件</td>
    <td class="fl"><?=phpversion('pdo_sqlite') ? YES : NO ?></td>
  </tr>
  <tr>
    <td class="er">SQLServer Client组件</td>
    <td class="fl"><?=function_exists('sqlsrv_close') ? YES : NO ?></td>
  </tr>
  <tr>
    <td class="er">GD library组件</td>
    <td class="fl"><?=function_exists('gd_info') ? YES : NO ?></td>
  </tr>
  <tr>
    <td class="er">EXIF信息查看组件</td>
    <td class="fl"><?=phpversion('exif') ? YES : NO ?></td>
  </tr>
  <tr>
    <td class="er">oAuth协议组件</td>
    <td class="fl"><?=phpversion('oAuth') ? YES : NO ?></td>
  </tr> 
  <tr>
    <td class="er" >IMAP电子邮件函数库</td>
    <td class="fl"><?=function_exists('imap_close') ? YES : NO ?></td>
  </tr>
  <tr>
    <td width="190" class="er">SendMail电子邮件支持</td>
    <td width="310" class="fl"><?=phpversion('standard') ? YES : NO ?></td>
  </tr>  
</table>

<table width="100%" class="inp">
<tr>
<td colspan="1" class="ec" width="25%">PHP 多线程组件</td>
<td colspan="1" class="ec" width="25%">PHP Zend解密组件</td>
<td colspan="2" class="ec">PHP 缓存优化组件</td>
</tr>
<tr>
<td class="el">PHP Pthreads</td>
<td class="el">ionCube Loader</td>
<td class="el" width="25%">APC</td>
<td class="el">Memcache</td>
</tr>
<tr>
<td class="fc"><?=phpversion('Pthreads') ? YES : NO ?></td>
<td class="fc"><?=function_exists('ionCube_Loader_version') ? YES : NO ?></td>
<td class="fc"><?=phpversion('APC') ? YES : NO ?></td>
<td class="fc"><?=function_exists('memcache_close') ? YES : NO ?></td>
</tr>
<tr>
  <td colspan="4" class="ft">UPUPW APACHE版<?=PHP_SAPI .' PHP/'.PHP_VERSION?>系列全部包含以上组件，默认未开启的请根据需要在UPUPW面板PHP功能选项里配置</td>
  </tr>
</table>

<table width="100%" class="info">
<tr>
<th>PHP已编译模块检测</th>
</tr>
<tr>
<td class="fl" style="text-align:center;">
<?php
$able=get_loaded_extensions();
foreach ($able as $key=>$value) {
	if ($key!=0 && $key%13==0) {
		echo '<br />';
	}
	echo "$value&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
</td>
</tr>
</table>

<form method="post" action="<?=_SERVER('PHP_SELF')?>">
<table width="100%" class="info">
  <tr>
    <th colspan="4">MySQL 连接测试</th>
  </tr>
   <tr>
    <td colspan="4" class="ft">请及时登录phpMyAdmin修改数据库默认用户名和密码</td>
  </tr>
  <tr>
    <td class="er">MySQL 服务器</td>
    <td class="fl"><input type="text" name="mysqlHost" value="localhost" /></td>
    <td class="er">MySQL 数据库名</td>
    <td class="fl"><input type="text" name="mysqlDb" value="test" /></td>
  </tr>
  <tr>
    <td class="er">MySQL 用户名</td>
    <td class="fl"><input type="text" name="mysqlUser" value="root" /></td>
    <td class="er">MySQL 用户密码</td>
    <td class="fl"><input type="text" name="mysqlPassword" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" value=" 连 接 " name="act" style="height:30px;" /> &nbsp;</td>
  </tr>
</table>
</form>

<?php if(isset($_POST['act'])) {?>
<br />
<table width="100%" class="info">
  <tr>
    <th colspan="4">MySQL 测试结果</th>
  </tr>
<?php
$link = @mysql_connect($_POST['mysqlHost'], $_POST['mysqlUser'], $_POST['mysqlPassword']);
$errno = mysql_errno();
if ($link) $str1 = '<span style="color: #008000; font-weight: bold;">OK</span> ('.mysql_get_server_info($link).')';
else $str1 = '<span style="color: #ff0000; font-weight: bold;">Failed</span><br />'.mysql_error();
?>
  <tr>
    <td colspan="2" class="er">MySQL <?=$_POST['mysqlHost']?></td>
    <td colspan="2" class="fl"><?=$str1?></td>
  </tr>
  <tr>
    <td colspan="2" class="er">数据库 <?=$_POST['mysqlDb']?></td>
    <td colspan="2" class="fl"><?=(@mysql_select_db($_POST['mysqlDb'],$link))?'<span style="color: #008000; font-weight: bold;">OK</span>':'<span style="color: #ff0000; font-weight: bold;">Failed</span>'?></td>
  </tr>
</table>
<?}?>
 <p style="color:#62ADC2;font-size:14px;text-align:center; margin-bottom:3px;">
 <?php $up_time = sprintf('%0.6f', micro_time_float() - $up_start);?>页面执行时间 <?php echo $up_time?> 秒&nbsp;&nbsp;&nbsp;消耗内存 <?php echo memory_usage();?>
 </p>
 <hr style="width:100%; color:#cdcdcd" noshade="noshade" size="1" />
 <p style="color:#505050; font-size:14px; text-align:center;">&copy;2014 <a href="http://www.upupw.net">WWW.UPUPW.NET</a> 版权所有</p>
</div>
</body>
</html>
