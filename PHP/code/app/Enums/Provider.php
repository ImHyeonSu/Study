<?php

namespace App\Enums;

/**
 * ソーシャルサービスを提供するための定義
 * ソーシャルサービス場合クライアントが提供する情報は基本的にメール、名前、プロピルに限定されている
 */
enum Provider: string
{
    case Github = 'github';
    //case Facebook = 'facebook';
}
