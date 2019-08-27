<?php

namespace Lucid\Foundation;

use Illuminate\Support\Collection;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Lucid\Foundation\Events\FeatureStarted;

trait ServesFeaturesTrait
{
    use MarshalTrait;
    use DispatchesJobs;

    /**
     * Serve the given feature with the given arguments.
     *
     * @param \Lucid\Foundation\AbstractFeature $feature
     * @param array                           $arguments
     *
     * @return mixed
     */
    public function serve($feature, $arguments = [])
    {
        event(new FeatureStarted($feature, $arguments));

        return $this->dispatch($this->marshal($feature, new Collection(), $arguments));
    }
}
