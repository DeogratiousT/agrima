@if ($commodity->in_stock == 1)
    <span class="badge badge-success">In Stock</span>
@elseif ($commodity->in_stock == 0)
    <span class="badge badge-warning">Out of Stock</span>
@endif