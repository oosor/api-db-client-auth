<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 16:45
 */

namespace Oosor\AuthApiDatabase\Contracts;


interface PasswordToken extends BaseBuild
{
    /** add construct scope
     * @return $this
     * */
    public function addConstructScope();
}