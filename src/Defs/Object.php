<?php

/**
 * @file
 * Object structure definition.
 *
 * @see Itafroma\Zork\Prim\Struc
 * @see Itafroma\Zork\newstruc()
 */

namespace Itafroma\Zork\Defs;

use Itafroma\Zork\Prim\Struc;

class Object implements Struc
{
    /** @var <UVECTOR [REST PSTRING]> $onames Synonyms */
    public $onames;

    /** @var <UVECTOR [REST ADJECTIVE]> $oadjs Adjectives for this object */
    public $oadjs;

    /** @var string $odesc2 Short description */
    public $odesc2;

    /**
     * @var int $oflags Flags
     *
     * This must be the same offset as $aflags.
     */
    public $oflags;

    /** @var RAPPLIC $oaction Object-action */
    public $oaction;

    /** @var Itafroma\Zork\Defs\Object[] $ocontents List of contents */
    public $ocontents = [];

    /** @var Itafroma\Zork\Defs\Room What contains this */
    public $room = false;

    /** @var array $oprops Property list */
    public $oprops = [];
}