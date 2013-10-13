<?php
/**
 * UserNotLoggedIn exception, thrown when an action is attempted that requires a logged in user, such as impersonation.
 *
 * @created 20131013
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Exception;

use ZfcUserImpersonate\Exception\ZfcUserImpersonate;

class UserNotLoggedIn extends \RuntimeException implements ZfcUserImpersonate
{
}
