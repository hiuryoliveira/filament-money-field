<?php

namespace Pelmered\FilamentMoneyField\Tables\Columns;

use Filament\Tables\Columns\TextColumn;
use Pelmered\FilamentMoneyField\hasMoneyAttributes;
use Pelmered\FilamentMoneyField\MoneyFormatter;

class MoneyColumn extends TextColumn
{
    use hasMoneyAttributes;

    /**
     * Setup component.
     * 
     * @var string
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->isMoney = true;
        $this->numeric();

        $this->formatStateUsing(function (MoneyColumn $column, $state): ?string {
            $currency = $column->getCurrency();
            $locale   = $column->getLocale();

            return MoneyFormatter::format($state, $currency, $locale);
        });

    }
}
