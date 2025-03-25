<div id="editProductModal" class="modal">
  <div class="modal-content edit-modal">
    <span class="close">&times;</span>
    <h2 class="modal-title">Редактирование товара</h2>

    <form class="edit-form" action="update_product.php" method="POST" enctype="multipart/form-data">
      <div class="edit-modal-grid">
        <!-- Строка: изображение -->
        <label class="edit-label">Изображения</label>
        <div class="edit-field">
          <div class="img-upload">
            <img src="./img/adidas.png" alt="Товар" class="preview-image">
            <input type="file" name="image" id="productImage" hidden>
            <div>
                <label for="productImage" class="upload-btn">Загрузить</label>
            </div>
          </div>
        </div>

        <label class="edit-label">Артикул</label>
        <input class="edit-field" type="text" name="sku" value="H03471" required>

        <label class="edit-label">Название</label>
        <input class="edit-field" type="text" name="name" value="Adidas / Кеды мужские / GRAY" required>

        <label class="edit-label">Описание</label>
        <input class="edit-field" type="text" name="description" value="Кроссовки adidas Campus в расцветке «Gray White» ..." required>

        <label class="edit-label">Цена</label>
        <input class="edit-field" type="number" name="price" value="9645" required>

        <label class="edit-label">Статус заказа</label>
        <select class="edit-field" name="order_status">
            <option value="Ожидает">Ожидает</option>
            <option value="В обработке">В обработке</option>
            <option value="Доставляется">Доставляется</option>
            <option value="Доставлен" selected>Доставлен</option>
            <option value="Отменён">Отменён</option>
        </select>

        <label class="edit-label">Статус оплаты</label>
        <select class="edit-field" name="payment_status">
            <option value="Не оплачен">Не оплачен</option>
            <option value="Оплачен" selected>Оплачен</option>
            <option value="Возврат">Возврат</option>
        </select>
      </div>

      <div class="edit-btn-wrapper">
        <button type="submit" class="modal-button">Сохранить</button>
      </div>
    </form>
  </div>
</div>