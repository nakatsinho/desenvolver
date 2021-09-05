<?php

namespace APDS\Helpers;

class OrderDataHelper
{
    public static function getOrderData(&$dataArray, &$requestObj, &$authUser, $courseTitle, $transactionId)
    {
        $dataArray["user_id"] = $authUser->id;
        $dataArray["curso_id"] = $requestObj->curso_id;
        $dataArray["curso_titulo"] = $courseTitle;
        $dataArray["nome_cliente"] = $requestObj->nome . " " . $requestObj->sobrenome;
        $dataArray["user_email"] = $authUser->email;
        $dataArray["preco"] = $requestObj->total;
        $dataArray["transaction_id"] = $transactionId ?: bin2hex(random_bytes(6));
        $dataArray["local"] = $requestObj->local;
        $dataArray["distrito_id"] = $requestObj->distrito_id;
        $dataArray["zip"] = $requestObj->zip;
        $dataArray["pais_id"] = $requestObj->pais_id;
        $dataArray["casa"] = $requestObj->casa;
        $dataArray["provincia_id"] = $requestObj->provincia_id;
        $dataArray["contacto"] = $requestObj->numero;
    }
}
