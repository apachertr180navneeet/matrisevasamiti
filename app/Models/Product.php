<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'original_price',
        'category',
        'sku',
        'image',
        'short_description',
        'description',
        'whatsapp_number',
        'whatsapp_link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) . '-' . Str::random(4);
            }
        });
    }

    /**
     * Get computed WhatsApp Purchase / Inquiry link
     */
    public function getWhatsappUrlAttribute(): string
    {
        if (!empty($this->whatsapp_link) && filter_var($this->whatsapp_link, FILTER_VALIDATE_URL)) {
            return $this->whatsapp_link;
        }

        // Clean phone number
        $rawPhone = $this->whatsapp_number ?: config('site.contact_phone_primary', config('site.phone_primary', '919415451910'));
        $digits = preg_replace('/[^0-9]/', '', (string)$rawPhone);

        if (strlen($digits) === 10) {
            $digits = '91' . $digits;
        } elseif (empty($digits)) {
            $digits = '919415451910';
        }

        $priceText = $this->price > 0 ? ' (Price: ₹' . number_format($this->price, 2) . ')' : '';
        $message = "Namaste Matri Seva Samiti, I am interested in purchasing:\n*" . $this->name . "*" . $priceText . "\n\nPlease let me know the availability and how to place the order.";

        return 'https://wa.me/' . $digits . '?text=' . urlencode($message);
    }

    /**
     * Calculate discount percentage if original price is provided
     */
    public function getDiscountPercentAttribute(): ?int
    {
        if ($this->original_price && $this->original_price > $this->price && $this->original_price > 0) {
            return (int) round((($this->original_price - $this->price) / $this->original_price) * 100);
        }
        return null;
    }
}
