
<div class="slider-range style-2 clearfix" data-value="1" data-min="0" data-max="<?=sizeof($PriceTable)?>">
    <div class="range">
        <div class="slider-range-skew"><span></span></div>
        <div class="slider-range-parts">
<? if (sizeof($PriceTable)) foreach ($PriceTable as $val) {?>
            <span></span>
<? }  ?>
        </div>
    </div>
    <div class="simple-text size-2 bold-style-2">
        <b class="slider-range-group">Мілкі</b> (б`юджет до <input type="text" class="amount-value"  id="customerregistration-price_range" name="CustomerRegistration[price_range]" value="1000"> грн.)
    </div>
</div>


