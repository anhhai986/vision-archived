<?php
namespace App\Traits;

use Spatie\ModelStatus\HasStatuses as BaseTrait;

trait HasStatuses
{
    use BaseTrait;

    /**
     * Pre-defined statuses.
     *
     * @var array $statuses
     */
    private $statuses = [
        'inbox', 'backlog', 'todo', 'progressing', 'completed', 'canceled', 'archived', 'deleted', 'failed'
    ];

    /**
     * Boot model class.
     */
    protected static function bootHasStatuses()
    {
        static::created(function ($model) {
            /*
             * @var \Illuminate\Database\Eloquent\Model
             */
            /**
             * @todo Reason on created might change
             */
            $model->setStatus('inbox', __('status.reasons.default'));
        });
    }

    /**
     * Custom status validation.
     *
     * @param string $name
     * @param string|null $reason
     * @return bool
     */
    public function isValidStatus(string $name, ?string $reason = null): bool
    {
        return in_array($name, $this->statuses);
    }

    /**
     * Available statuses. (note: override if there is a workflow or business logic)
     *
     * @return array
     */
    public function availableStatuses(): array
    {
        return $this->statuses;
    }
}