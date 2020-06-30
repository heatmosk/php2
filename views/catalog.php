<div class='catalog'>
  <?php foreach ($products as $product) : ?>
    <div class='catalog__item'>
      <div>
        <a class='catalog__item__link' href='/index.php?c=product&a=card&id=<?= $product->getId() ?>'>
          <?= $product->getName() ?>
        </a>
      </div>

      <form action="/index.php?c=cart&a=add" method="POST">
        <input type="hidden" name="product_id" value="<?= $product->getId() ?>" /> 
        <input class='catalog__item__link' type="submit" value="Добавить в корзину" />
      </form>
    </div>
  <?php endforeach; ?>
</div>