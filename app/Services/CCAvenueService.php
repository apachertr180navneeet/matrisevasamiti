<?php

namespace App\Services;

class CCAvenueService
{
    protected string $workingKey;
    protected string $accessCode;
    protected string $merchantId;
    protected string $actionUrl;

    public function __construct()
    {
        $this->workingKey = (string) config('services.ccavenue.working_key');
        $this->accessCode = (string) config('services.ccavenue.access_code');
        $this->merchantId = (string) config('services.ccavenue.merchant_id');
        $this->actionUrl = (string) config('services.ccavenue.action_url');
    }

    public function getAccessCode(): string
    {
        return $this->accessCode;
    }

    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    public function getActionUrl(): string
    {
        return $this->actionUrl;
    }

    public function encrypt(string $plainText, ?string $key = null): string
    {
        $key = $key ?: $this->workingKey;
        $binKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $binKey, OPENSSL_RAW_DATA, $initVector);
        return bin2hex($openMode);
    }

    public function decrypt(string $encryptedText, ?string $key = null): string
    {
        $key = $key ?: $this->workingKey;
        $binKey = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedBinary = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedBinary, 'AES-128-CBC', $binKey, OPENSSL_RAW_DATA, $initVector);
        return (string) $decryptedText;
    }

    public function parseResponse(string $encryptedResponse): array
    {
        if (empty($encryptedResponse)) {
            return [];
        }

        $decryptedString = $this->decrypt($encryptedResponse);
        $values = explode('&', $decryptedString);
        $responseData = [];

        foreach ($values as $item) {
            $parts = explode('=', $item, 2);
            if (count($parts) === 2) {
                $responseData[$parts[0]] = $parts[1];
            }
        }

        return $responseData;
    }

    protected function hextobin(string $hexString): string
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            $binString .= $packedString;
            $count += 2;
        }
        return $binString;
    }
}
