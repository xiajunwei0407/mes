<?php


namespace Bkqw\Mes;


class Response
{
    // 成功返回码
    const SUCCESS_CODE = 1;
    // 失败返回码
    const FAIL_CODE = 0;

    private static function formatReturn($code, $mes)
    {
        return json_encode(['code' => $code, 'mes' => $mes], JSON_UNESCAPED_UNICODE);
    }

    public static function success($mes = 'success', $code = self::SUCCESS_CODE)
    {
        return self::formatReturn($code, $mes);
    }

    public static function fail($mes = 'fail', $code = self::FAIL_CODE)
    {
        return self::formatReturn($code, $mes);
    }
}
