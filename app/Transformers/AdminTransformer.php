<?php

namespace App\Transformers;

use App\Models\Admin;
use Flugg\Responder\Transformers\Transformer;

class AdminTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param \App\Models\Admin $admin
     * @return array
     */
    public function transform(Admin $admin)
    {
        return [
            'id'       => (int) $admin->id,
            'name'     => (string) $admin->name,
            'email'    => (string) $admin->email,
        ];
    }
}
