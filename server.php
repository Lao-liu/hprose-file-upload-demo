<?php
/**
 * Project ~ HproseExample
 * FileName: server.php
 *
 * @author:  Liujian <laoliu@lanmv.com>
 *
 * Date: 2016/10/12 下午1:27
 */

use Hprose\Http\Service;

require_once dirname(__FILE__) . "/vendor/autoload.php";

function upload($filename, $content)
{

    try {

        $path = pathinfo($filename);

        $saveFileName = dirname(__FILE__) . "/uploads/" . $path["basename"];

        if (file_put_contents($saveFileName, $content)) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }

}

$service = new Service();
$service->setDebugEnabled(true);
$service->setCrossDomainEnabled(true);
$service->setP3PEnabled(true);

$service->addFunction("upload");
$service->handle();