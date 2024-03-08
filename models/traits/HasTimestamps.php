<?php

namespace app\models\traits;

/**
 * @property bool $isNewRecord
 * @property string $created_at
 * @property string $updated_at
 */
trait HasTimestamps
{
    public function setTimestamps(): void
    {
        $this->updated_at = $this->now();
        if ($this->isNewRecord) {
            $this->created_at = $this->now();
        }
    }

    private function now(): string
    {
        return date('Y-m-d H:i:s');
    }
}