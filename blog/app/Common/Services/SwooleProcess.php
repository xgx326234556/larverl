<?php
$http = new Swoole\Http\Server("127.0.0.1", 9508);
$worker = [];
$array = [];
echo "process-start-time" . date("Y-m-d H:i:s");
$urls = [1, 2, 3, 4, 5, 6];
for ($i = 0; $i < 6; $i++) {

    $process = new swoole_process(function (swoole_process $worker) use ($i, $urls) {
        $res = urlsData($urls[$i]);
        echo $res . PHP_EOL;
    }, true);
    $pid = $process->start();
    $worker[$pid] = $process;
}
/**
 * 获取管道的数据
 */
foreach ($worker as $process) {
    $array[] = $process->read();
}
/**
 * 模拟url请求
 * @param $url
 * @return string
 */
echo "process-end-time" . date("Y-m-d H:i:s");
function urlsData($url)
{
    sleep(1);
    return $url . "success" . PHP_EOL;
}
$http->on('request', function ($request, $response) use($array){
    $response->end(json_encode($array));
});
$http->start();