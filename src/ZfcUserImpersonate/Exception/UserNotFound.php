<?php
/**
 * UserNotFound exception, thrown when a User could not be mapped using the given search parameters.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Exception;

class UserNotFound extends \RuntimeException implements ZfcUserImpersonate
{
}
