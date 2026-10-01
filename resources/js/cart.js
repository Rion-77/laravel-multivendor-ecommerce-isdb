// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import { add, list, quantity, remove, total, destroy } from "cart-localstorage";

const cartItemCounter = document.querySelector(".cart-item-counter");
const itemshiddenInput = document.querySelector("input[name='order_items']");

// Cart Item Counter and display counter
function resetCounter() {
    cartItemCounter.innerText = list().reduce((sum, item) => {
        return sum + item.quantity;
    }, 0);
}

resetCounter();

// Adding to cart
document.addEventListener("click", (event) => {
    const addToCartButton = event.target.closest(".add-to-cart-btn");
    if (!addToCartButton) return;

    const product = JSON.parse(addToCartButton.dataset.product);
    const cartItemInput = document.querySelector(".cart-item-input");
    if (cartItemInput && cartItemInput.value > 0) {
        add(product, Number(cartItemInput.value));
    } else {
        add(product);
    }

    resetCounter();
});

// ////////////////////////////////////////////////////
// For Cart Page
if (document.querySelector(".cart-table-body")) {
    const cartWrapper = document.querySelector(".cart-wrapper");
    const cartTableBody = document.querySelector(".cart-table-body");
    const subtotal = document.querySelector(".subtotal");
    const totalWithCharges = document.querySelector(".total");
    const emptyCartMessage = document.querySelector(".empty-cart-message");

    console.log(list());
    // Cart display fucntion for cart page
    function displayCart() {
        if (list().length > 0) {
            cartTableBody.innerHTML = list()
                .map(
                    (item) => `
                 <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="${item.image}" class="img-fluid me-5 rounded-circle"
                                                style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">${item.name}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">${item.price}৳</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus rounded-circle bg-light border cart-decrease" data-id=${item.id}>
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0"
                                                value="${item.quantity}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus rounded-circle bg-light border cart-increase" data-id=${item.id}>
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">${Math.round(item.price * item.quantity)}৳</p>
                                    </td>
                                    <td>
                                        <button class="btn btn-md rounded-circle bg-light border mt-4 cart-remove" data-id=${item.id}>
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>

                                </tr>
					`,
                )
                .join("");

            emptyCartMessage.classList.add("d-none");
            cartWrapper.classList.remove("d-none");
            subtotal.innerText = Math.round(total()) + "৳";
            totalWithCharges.innerText = Math.round(total() + 120) + "৳";
        } else {
            emptyCartMessage.classList.remove("d-none");
            cartWrapper.classList.add("d-none");
            subtotal.innerText = 0 + "৳";
            totalWithCharges.innerText = 0 + "৳";
        }
    }
    displayCart();

    cartTableBody.addEventListener("click", (e) => {
        const increase = e.target.closest(".cart-increase");
        const decrease = e.target.closest(".cart-decrease");
        const itemDelete = e.target.closest(".cart-remove");

        // increase item
        if (increase) {
            quantity(Number(increase.dataset.id), 1);
            resetCounter();
            displayCart();
        }

        // decrease item
        if (decrease) {
            quantity(Number(decrease.dataset.id), -1);
            resetCounter();
            displayCart();
        }

        // remove item
        if (itemDelete) {
            remove(Number(itemDelete.dataset.id));
            resetCounter();
            displayCart();
        }
    });
    // const cartIncrease = document.querySelectorAll(".cart-increase");
    // console.log(cartIncrease);
}

// ////////////////////////////////////////////////////
// For Checkout Page
if (document.querySelector("#checkout-products-table-body")) {
    const checkoutWrapper = document.querySelector("#checkout-wrapper");
    const emptyCheckoutMessage = document.querySelector(".empty-checkout-message");
    const checkoutProductTableBody = document.querySelector(
        "#checkout-products-table-body",
    );
    const checkoutSubtotal = document.querySelector("#checkoutSubtotalText");
    const checkoutTotal = document.querySelector("#checkoutTotalText");

    console.log(list());
    // Cart display fucntion for checkoout page
    function displayCheckoutProducts() {
        if (list().length > 0) {
            checkoutProductTableBody.innerHTML = list()
                .map(
                    (item) => `

                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="${item.image}" class="img-fluid rounded-circle"
                                                        style="width:56px;height:56px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-2">${item.name}</td>
                                            <td class="py-2">${item.price}৳</td>
                                            <td class="py-2">${item.quantity}</td>
                                            <td class="py-2 line-total">${(item.price * item.quantity).toFixed(2)}৳</td>
                                        </tr>

					`,
                )
                .join("");

            emptyCheckoutMessage.classList.add("d-none");
            checkoutWrapper.classList.remove("d-none");
            checkoutSubtotal.innerText = total().toFixed(2) + "৳";
            checkoutTotal.innerText = (total() + 120).toFixed(2) + "৳";
        } else {
            emptyCheckoutMessage.classList.remove("d-none");
            checkoutWrapper.classList.add("d-none");
            checkoutSubtotal.innerText = 0 + "৳";
            checkoutTotal.innerText = 0 + "৳";
        }
    }
    displayCheckoutProducts();
}

if (itemshiddenInput) {
    itemshiddenInput.value = JSON.stringify(list());
}

// Clreaing the card
function clearCart() {
    destroy();
    resetCounter();
}

window.clearCart = clearCart;
