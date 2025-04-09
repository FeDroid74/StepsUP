<div id="editProductModal" class="modal">
  <div class="modal-content edit-modal">
    <span class="close">&times;</span>
    <h2 class="modal-title">Редактирование товара</h2>

    <form class="edit-form" action="server/update_product.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" id="edit-id">
      <input type="hidden" name="existing_image" id="edit-existing-image">

      <div class="edit-modal-grid">
        <label class="edit-label">Изображения</label>
        <div class="edit-field">
          <div class="img-upload">
            <img src="" alt="Товар" id="edit-preview" class="preview-image">
            <input type="file" name="image" id="productImage" accept="image/*" style="display: none;">
            <div>
              <button type="button" class="upload-btn" id="uploadTrigger">Загрузить</button>
            </div>
          </div>
        </div>

        <label class="edit-label">Название</label>
        <input class="edit-field" type="text" name="name" id="edit-name" required>

        <label class="edit-label">Описание</label>
        <input class="edit-field" type="text" name="description" id="edit-description" required>

        <label class="edit-label">Цена</label>
        <input class="edit-field" type="number" name="price" id="edit-price" required>

        <label class="edit-label">Наличие</label>
        <input class="edit-field" type="number" name="stock" id="edit-stock">

        <label class="edit-label">Бренд</label>
        <input class="edit-field" type="text" name="brand" id="edit-brand" required>

        <label class="edit-label">Категория</label>
        <select class="edit-field" name="category" id="edit-category">
          <option value="Бренд">Бренд</option>
          <option value="Распродажа">Распродажа</option>
          <option value="Детская">Детская</option>
        </select>

        <label class="edit-label">Пол</label>
        <select class="edit-field" name="gender" id="edit-gender">
          <option value="1">Мужской</option>
          <option value="0">Женский</option>
        </select>

        <label class="edit-label">Размер</label>
        <select class="edit-field" name="size" id="edit-size" required>
          <?php for ($i = 36; $i <= 45; $i++): ?>
            <option value="<?= $i ?>"><?= $i ?></option>
          <?php endfor; ?>
        </select>

        <label class="edit-label">Статус заказа</label>
        <select class="edit-field" name="order_status" id="edit-order-status">
          <option value="Ожидает">Ожидает</option>
          <option value="В обработке">В обработке</option>
          <option value="Доставляется">Доставляется</option>
          <option value="Доставлен">Доставлен</option>
          <option value="Отменён">Отменён</option>
        </select>

        <label class="edit-label">Статус оплаты</label>
        <select class="edit-field" name="payment_status" id="edit-payment-status">
          <option value="Не оплачен">Не оплачен</option>
          <option value="Оплачен">Оплачен</option>
          <option value="Возврат">Возврат</option>
        </select>
      </div>

      <div class="edit-btn-wrapper">
        <button type="submit" class="modal-button">Сохранить</button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Функция предпросмотра изображения
    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('edit-preview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Основной код модального окна
    const modal = document.getElementById("editProductModal");
    const imageInput = document.getElementById("productImage");
    const uploadTrigger = document.getElementById("uploadTrigger");

    // Активируем input по клику на кнопку
    if (uploadTrigger && imageInput) {
        uploadTrigger.addEventListener('click', function() {
            imageInput.click();
        });
    }

    // Добавляем обработчик события для предпросмотра
    if (imageInput) {
        imageInput.addEventListener('change', previewImage);
    }

    // Открытие модального окна для редактирования
    document.querySelectorAll(".admin-edit").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelector(".modal-title").textContent = "Панель редактирования";
            document.querySelector(".edit-form").action = "server/update_product.php";

            document.getElementById("edit-id").value = this.dataset.id;
            document.getElementById("edit-name").value = this.dataset.name;
            document.getElementById("edit-description").value = this.dataset.description;
            document.getElementById("edit-price").value = this.dataset.price;
            document.getElementById("edit-stock").value = this.dataset.stock;
            document.getElementById("edit-brand").value = this.dataset.brand;
            document.getElementById("edit-category").value = this.dataset.category;
            document.getElementById("edit-gender").value = this.dataset.gender;
            document.getElementById("edit-size").value = this.dataset.size;
            document.getElementById("edit-preview").src = this.dataset.image;
            document.getElementById("edit-existing-image").value = this.dataset.image;
            document.getElementById("edit-order-status").value = this.dataset.orderstatus;
            document.getElementById("edit-payment-status").value = this.dataset.paymentstatus;
            modal.style.display = "flex";
        });
    });

    // Открытие модального окна для добавления
    document.querySelector(".admin-add").addEventListener("click", () => {
        document.querySelector(".modal-title").textContent = "Добавить товар";
        document.querySelector(".edit-form").action = "server/add_product.php";
        
        document.getElementById("edit-id").value = "";
        document.getElementById("edit-name").value = "";
        document.getElementById("edit-description").value = "";
        document.getElementById("edit-price").value = "";
        document.getElementById("edit-stock").value = "";
        document.getElementById("edit-brand").value = "";
        document.getElementById("edit-category").value = "";
        document.getElementById("edit-gender").value = "1";
        document.getElementById("edit-size").value = "36";
        document.getElementById("edit-preview").src = "";
        document.getElementById("edit-existing-image").value = "";
        document.getElementById("edit-order-status").value = "Ожидает";
        document.getElementById("edit-payment-status").value = "Не оплачен";
        modal.style.display = "flex";
    });

    // Закрытие модального окна
    document.querySelector("#editProductModal .close").addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", e => {
        if (e.target === modal) modal.style.display = "none";
    });
});
</script>