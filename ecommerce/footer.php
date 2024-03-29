<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container-fluid mt-5">
    <?php if (basename($_SERVER['PHP_SELF']) !== 'dashboard.php' && basename($_SERVER['PHP_SELF']) !== 'products.php' && basename($_SERVER['PHP_SELF']) !== 'orders.php' && basename($_SERVER['PHP_SELF']) !== 'customers.php' && basename($_SERVER['PHP_SELF']) !== 'settings.php') { ?>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white row " style="background-color: #1c2331">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
                <!-- Left -->
                <div class="me-5">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Company name</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">MDBootstrap</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">MDWordPress</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">BrandFlow</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Bootstrap Angular</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    <?php } ?>
</div>
<!-- End of .container -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        // update cart length
        $('#cartCount').text(Cookies.get('cart') ? Cookies.get('cart').split(',').length : 0);

        $('.addCartBtn').click(function() {
            var id = $(this).data('id');
            toastr.success(id + " Product added to cart!");
            // get cookie if exicts
            var cart = Cookies.get('cart');
            if (cart) {
                cart = cart.split(',');
                cart.push(id);
                Cookies.set('cart', cart, {
                    expires: 1
                });
                $('#cartCount').text(cart.length);
            } else {
                Cookies.set('cart', id, {
                    expires: 1
                });
                $('#cartCount').text(1);
            }

        });
    });

    // ajax for cart info
    $(document).ready(function() {
        // get product ids from cookies
        const checkCart = () => {
            var cart = Cookies.get('cart');
            if (cart) {
                $.ajax({
                    url: './classes/cart-info.php',
                    type: 'GET',
                    data: {
                        cart: cart
                    },
                    success: function(data) {
                        // $('#cartInfo').html(data);
                        data = JSON.parse(data);
                        var products = data.products;
                        var total = data.total;
                        var html = '';
                        products.forEach(product => {
                            html += `
                            <tr>
                                <td>${product.name}</td>
                                <td><img src="./Assets/images/${product.img}" alt="${product.name}" style="width: 50px;"></td>
                                <td>${product.discount_price}</td>
                                <td>${product.count}</td>
                                <td>${product.discount_price * product.count}</td>
                                <td>
                                    <button class="btn btn-danger removeProduct" data-id="${product.id}" >Remove</button>
                                </td>
                            </tr>
                            `;
                        });
                        $('#productsInCart').html(html);
                        $('#total').text(total);
                        $('#cartCount').text(Cookies.get('cart') ? Cookies.get('cart').split(',').length : 0);
                    }
                }).then(() => {
                    $(".removeProduct").click(function() {
                        var id = $(this).data('id');
                        cart = Cookies.get('cart').split(',');
                        cart = Array.from(cart);
                        cart = cart.filter(item => item != id);
                        Cookies.set('cart', cart, {
                            expires: 1
                        });
                        toastr.success("Product removed successfully!");
                        checkCart();
                        $('#cartCount').text(Cookies.get('cart') ? Cookies.get('cart').split(',').length : 0);
                    });
                });
            }
        }
        checkCart();
    });
</script>

</body>

</html>