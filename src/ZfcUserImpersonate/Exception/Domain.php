<?php
/**
 * Domain exception, thrown when a variable does not fall into the expected domain / type.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace ZfcUserImpersonate\Exception;

use LmcUser\Exception\DomainException;

class Domain extends DomainException implements ZfcUserImpersonate
{
}
