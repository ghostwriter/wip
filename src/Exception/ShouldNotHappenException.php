<?php

declare(strict_types=1);

namespace Ghostwriter\Wip\Exception;

use Ghostwriter\Wip\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
