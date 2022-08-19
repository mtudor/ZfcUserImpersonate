<?php
/**
 * NotImpersonating exception, thrown when an action is attempted that affects the current impersonation, but no
 * impersonation is currently in progress.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Exception;

class NotImpersonating extends \RuntimeException implements ZfcUserImpersonate
{
}
