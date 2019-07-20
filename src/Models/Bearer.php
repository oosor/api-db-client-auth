<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 14:41
 */

namespace Oosor\AuthApiDatabase\Models;


class Bearer
{
    private $token;

    /**
     * @param string $srcToken
     * @return void
     * */
    public function __construct($srcToken)
    {
        $this->token = json_decode($srcToken, true);
    }

    /** type token Bearer (only password token and client token)
     * @return string
     * */
    public function tokenType()
    {
        return $this->token['token_type'] ?? null;
    }

    /** expires_in (only password token and client token)
     * @return int
     * */
    public function tokenExpiresIn()
    {
        return $this->token['expires_in'] ?? null;
    }

    /** access_token
     * @return string
     * */
    public function accessToken()
    {
        return $this->token['access_token'] ?? $this->token['accessToken'] ?? null;
    }

    /** refresh_token (only password token)
     * @return string
     * */
    public function refreshToken()
    {
        return $this->token['refresh_token'] ?? null;
    }

    /** support only personal access token
     * @return array
     * */
    public function token()
    {
        return $this->token['token'] ?? null;
    }

    public function __toString()
    {
        return json_encode($this->token);
    }

    /** all in array
     * @return array
     * */
    public function toArray()
    {
        return $this->token ?? null;
    }
}