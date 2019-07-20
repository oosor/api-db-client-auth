<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 18:22
 */

namespace Oosor\AuthApiDatabase\Contracts;


interface PersonalToken extends BaseBuild
{
    /** set name personal token
     * @param string $name
     * @return $this
     * */
    public function nameToken(string $name);
}