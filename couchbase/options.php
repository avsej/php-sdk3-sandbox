<?php
// vim: et ts=4 sw=4 sts=4

namespace Couchbase;

class Options
{
    const PERSIST_TO_ONE = 1;
    const PERSIST_TO_TWO = 2;
    const PERSIST_TO_THREE = 3;
    const REPLICATE_TO_ONE = 1;
    const REPLICATE_TO_TWO = 2;

    const DURABILITY_LEVEL_MAJORITY = 1;
    const DURABILITY_LEVEL_MAJORITY_AND_PERSIST_ACTIVE = 2;
    const DURABILITY_LEVEL_PERSIST_TO_MAJORITY = 3;

    public static function getOptions(): GetOptions
    {
        return new GetOptions();
    }

    public static function replaceOptions(): ReplaceOptions
    {
        return new ReplaceOptions();
    }

    public static function lookupOptions(): LookupOptions
    {
        return new LookupOptions();
    }

    public static function mutateOptions(): MutateOptions
    {
        return new MutateOptions();
    }

    public static function removeOptions(): RemoveOptions
    {
        return new RemoveOptions();
    }
}
