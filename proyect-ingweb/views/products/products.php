<?php

include_once('templates/cabecera.php');
?>

<section class="products-section">
    <div class="product-container">
        <h1>Selecciona los productos que deseas</h1>
        <div class="filter">
            <ul class="ul-filters">
                <li class="li-filter filter-active" id="filter-all">
                    <span>All</span>
                </li>
                <li class="li-filter" id="filter-frenos">
                    <span>Freno</span>
                </li>
                <li class="li-filter" id="filter-pastilla">
                    <span>Pastilla</span>
                </li>
            </ul>
        </div>

        <div class="products" id="products-container">
        </div>
    </div>

    </div>
</section>


<?php

include_once('templates/pie.php');
?>
