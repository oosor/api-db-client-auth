<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 14:03
 */

namespace Oosor\AuthApiDatabase\Contracts;


interface Configuration
{
    /** optional (password token and client token)
     * @return int
     * */
    public function getClientId();

    /** optional (password token and client token)
     * @return string
     * */
    public function getClientSecret();

    /** optional (password token)
     * @return string
     * */
    public function userName();

    /** optional (password token)
     * @return string
     * */
    public function userPassword();

    /** optional (personal token)
     * @return string
     * */
    public function accessToken();
}