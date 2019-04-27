<?php
$worker = [];
$array = [];
echo "process-start-time".date("Y-m-d H:i:s");
$urls = [1,2,3,4,5,6];
/**
 * 多进程
 */
for($i=0;$i<6;$i++)
{

  $process =  new swoole_process(function (swoole_process $worker) use($i,$urls){
      $res = urlsData($urls[$i]);
      echo $res.PHP_EOL;
  }, true);
  $pid = $process->start();
  $worker[$pid] = $process;
}
/**
 * 获取管道的数据
 */
foreach ($worker as $process)
{
    $array[] = $process->read();

}
/**
 * 模拟url请求耗时
 * @param $url
 * @return string
 */
function urlsData($url)
{
    sleep(1);
    return $url."success".PHP_EOL;
}
echo "process-end-time".date("Y-m-d H:i:s");
var_dump($array);