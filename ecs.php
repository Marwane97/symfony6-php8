<?php

declare(strict_types=1);

use Symplify\EasyCodingStandard\Config\ECSConfig;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;
use PhpCsFixer\Fixer\Basic\BracesFixer;
use PhpCsFixer\Fixer\Basic\CurlyBracesPositionFixer;
use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->paths([
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $ecsConfig->ruleWithConfiguration(
        YodaStyleFixer::class,
        [
            'equal' => true,
            'identical' => true,
            'less_and_greater' => false,
        ]
    );

    // this way you can add sets - group of rules
    $ecsConfig->sets([
        SetList::SPACES,
        SetList::ARRAY,
        SetList::DOCBLOCK,
        SetList::NAMESPACES,
        SetList::COMMENTS,
        SetList::PSR_12,
    ]);

    $ecsConfig->skip([
        DeclareStrictTypesFixer::class,
        TrailingCommaInMultilineFixer::class,
        BracesFixer::class,
        CurlyBracesPositionFixer::class,

        // Exclude symfony files
        'config/preload.php',
        'config/bundles.php',
        'public/index.php',
        'tests/bootstrap.php',
    ]);
};
