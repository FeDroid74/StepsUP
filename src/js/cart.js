document.addEventListener("DOMContentLoaded", () => {
    const addToCartBtn = document.querySelector(".add-to-cart");
    const cartModal = document.getElementById("cartModal");
    const cartModalContent = document.getElementById("cartModalContent");
    const openCartBtn = document.querySelector(".open-cart");
    const closeCartBtn = document.getElementById("closeCart");
    const cartCount = document.querySelector(".cart-count");

    // Обновить счётчик
    function updateCartCount(count) {
        if (cartCount) {
            if (count > 0) {
                cartCount.style.display = "inline-block";
                cartCount.textContent = count;
            } else {
                cartCount.style.display = "none";
            }
        }
    }

    // Загрузить содержимое корзины
    function loadCart() {
        fetch("/server/cart_content.php")
            .then(res => res.text())
            .then(html => {
                cartModalContent.innerHTML = html;
                cartModal.style.display = "block";

                attachRemoveHandlers(); // привязываем удаление
            })
            .catch(err => console.error("Ошибка загрузки корзины:", err));
    }

    // Удаление товара
    function attachRemoveHandlers() {
        const removeButtons = cartModalContent.querySelectorAll(".remove-from-cart");
        removeButtons.forEach(button => {
            button.addEventListener("click", () => {
                const sku = button.dataset.sku;

                fetch("/server/remove_cart.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ sku })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        updateCartCount(data.cartCount);
                        loadCart();
                    } else {
                        alert(data.message || "Ошибка при удалении");
                    }
                })
                .catch(err => {
                    console.error("Ошибка удаления:", err);
                });
            });
        });
    }

    // Кнопка добавления
    if (addToCartBtn) {
        addToCartBtn.addEventListener("click", () => {
            const sku = addToCartBtn.dataset.sku;

            fetch("/server/add_cart.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ sku })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.cartCount);
                    alert("Товар добавлен в корзину!");
                }
            })
            .catch(err => console.error("Ошибка при добавлении:", err));
        });
    }

    // Открытие корзины
    if (openCartBtn && cartModal) {
        openCartBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            loadCart();
        });
    }

    // Закрытие по кнопке
    document.addEventListener("click", (e) => {
        if (
            cartModal.style.display === "block" &&
            !cartModal.contains(e.target) &&
            e.target !== openCartBtn &&
            !openCartBtn.contains(e.target)
        ) {
            cartModal.style.display = "none";
        }
    });

    // Начальное обновление счётчика
    updateCartCount(parseInt(cartCount?.textContent || 0));
});