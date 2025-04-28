 
 <footer class="row">
                <hr class="col-12">
                <!-- <div class="col-md-6 col-12 tm-color-gray">
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
                </div> -->
                <div class="col-12 tm-color-gray tm-copyright">
                    Copyright 2020 Mesha Blog Company Co. Ltd.
                </div>
            </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    <?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
    <script>
    <?php
    if (isset($_SESSION['success'])) {
        echo "toastr.success('".$_SESSION['success']."');";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo "toastr.error('".$_SESSION['error']."');";
        unset($_SESSION['error']);
    }
    ?>
    </script>
    <?php endif; ?>
</body>
</html>