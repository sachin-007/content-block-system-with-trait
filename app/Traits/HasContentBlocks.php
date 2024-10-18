<?php

namespace App\Traits;

use App\Models\ContentBlock;

trait HasContentBlocks
{
    // Polymorphic relationship to ContentBlock model
    public function contentBlocks()
    {
        return $this->morphMany(ContentBlock::class, 'blockable');
    }

    // Method to add a content block
    public function addContentBlock($type, $content)
    {
        return $this->contentBlocks()->create([
            'type' => $type,
            'content' => $content,
        ]);
    }

    // Method to remove a content block
    public function removeContentBlock($blockId)
    {
        $this->contentBlocks()->findOrFail($blockId)->delete();
    }
}
