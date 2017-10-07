<div class="tt-table-responsive">
    <table class="tt-table">
        <thead>
        <tr>
            <th>Максимальний бюджет замовлень</th>
            <th>Вартість доступа</th>
            <th>Скільки контактів доступно</th>
        </tr>
        </thead>
        <tbody>

<? if (sizeof($PriceTable)) foreach ($PriceTable as $val) {?>
        <tr>
            <td data-title="Максимальний бюджет замовлень"><b><?=$val['name']?></b> (до <?=number_format($val['budget_to'], 0, ',', ' ')?> грн.)</td>
            <td data-title="Вартість доступа"><?=number_format($val['price'], 0, ',', ' ')?> грн.</td>
            <td data-title="Скільки контактів доступно">
                xx
                <div class="tt-info-btn tt-tooltip" data-tooltip="Документи та достовірність внесеної інформації перевірені адміністраціює сайту">?</div>
            </td>
        </tr>
<? } ?>


        </tbody>
    </table>
</div>