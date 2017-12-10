<?php

use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use yii\web\NotFoundHttpException;

if (!function_exists('request'))
{
    function request()
    {
        return Yii::$app->request;
    }
}


if (!function_exists('debug'))
{
    function debug($x)
    {
        die(var_dump($x));
    }
}


if (!function_exists('dd'))
{
    function dd()
    {
        array_map(function ($x)
        {
            $dumper = 'cli' === PHP_SAPI ? new CliDumper : new HtmlDumper;

            $dumper->dump((new VarCloner)->cloneVar($x));

        }, func_get_args());

        die;
    }
}


if (!function_exists('app'))
{
    function app()
    {
        return Yii::$app;
    }
}


if (!function_exists('sessionHasSuccess'))
{
    function sessionHasSuccess()
    {
        return (bool) Yii::$app->session->hasFlash('success');
    }
}


if (!function_exists('successFlash'))
{
    function successFlash()
    {
        return Yii::$app->session->getFlash('success');
    }
}


if (!function_exists('abort'))
{
    function abort($code, $message = '', array $headers = [])
    {
        if ($code == 404)
        {
            throw new NotFoundHttpException($message);
        }

        throw new HttpException($code, $message, null, $headers);
    }
}


if (!function_exists('env'))
{
    function env()
    {
        return YII_ENV;
    }
}
