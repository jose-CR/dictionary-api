<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_id', 'letter', 'word', 'definition', 'spanish_sentence', 'sentence'];

    protected $cast = ['definition' => 'array'];

    public function subcategory(): BelongsTo{
        return $this->belongsTo(subCategory::class);
    }

    public function getStringDefinitionAttribute(): string
    {
        if (is_string($this->definition)) {
            $decodedValue = json_decode($this->definition, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedValue)) {
                return implode(', ', $decodedValue);
            } else {
                Log::error('No se pudo decodificar la definición JSON: ' . $this->definition);
            }
        }
        else
        {
            error('no es un string si no un array'. $this->definition);
        }

        return is_array($this->definition) ? implode(', ', $this->definition) : $this->definition;
    }
}