<?php
/**
 * Created by IntelliJ IDEA.
 * User: jarvis
 * Date: 20.07.19
 * Time: 15:41
 */

namespace Oosor\AuthApiDatabase\Contracts;


interface BaseBuild
{
    /** add select scope
     * @return $this
     * */
    public function addSelectScope();

    /** add insert scope
     * @return $this
     * */
    public function addInsertScope();

    /** add update scope
     * @return $this
     * */
    public function addUpdateScope();

    /** add delete scope
     * @return $this
     * */
    public function addDeleteScope();

    /** get token
     * @return \Oosor\AuthApiDatabase\Models\Bearer
     * */
    public function get();
}