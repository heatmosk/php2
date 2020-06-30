<div class="cart">
  <?php if (empty($cart->getAllPositions())) : ?>
    Корзина пуста
  <?php else : ?>
    <table cellpaddin="0" cellspacing="0">
      <tr>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Стоимость</th>
        <th>Действия</th>
      </tr>
      <?php foreach ($cart->getAllPositions() as $position) : ?>
        <tr class="cart__product">
          <td><?= $position->getProduct()->getName() ?></td>
          <td><?= $position->getAmount() ?></td>
          <td><?= $position->getProduct()->getPrice() ?></td>
          <td><?= $position->getAmount() * $position->getProduct()->getPrice() ?></td>
          <td>
            <form action="/index.php?c=cart&a=add" method="POST">
              <input type="hidden" name="product_id" value="<?= $position->getProduct()->getId() ?>" />
              <input class='catalog__item__link' type="submit" value="Добавить" />
            </form>
            <form action="/index.php?c=cart&a=remove" method="POST">
              <input type="hidden" name="product_id" value="<?= $position->getProduct()->getId() ?>" />
              <input class='catalog__item__link' type="submit" value="Убрать" />
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
    <div>Итого: <?= $cart->getTotalCost() ?> </div>
    <hr />
    <div>
      <form action="/index.php?a=create&c=order" enctype="multipart/form-data" method="post">
        <input type="hidden" name="cart_id" value="<?= 1 ?>" />
        <input type="submit" value="Оформить заказ" />
      </form>
    </div>
  <?php endif; ?>
</div>