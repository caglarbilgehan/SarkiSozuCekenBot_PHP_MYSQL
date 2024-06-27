<?php include './header.php';?>
<?php 

?>

<div class="container">
    <div class="row">
        <div class="col-12 pt-3 border-bottom border-start border-end">
            <p class="text-center fs-5 fw-bolder">TEST > ŞARKI FORM</p>
        </div>
        <div class="col-12 border p-3">
        <p class="text-center fs-2">Lütfen veri tabanına çekmek istediğiniz şarkının bağlantısını (URL) aşağıya yapıştırınız!</p>
        <form class="row" g-12 action="test_sarki.php" method="GET">
            <div class="input-group mb-3">
                <input class="form-control" name="sarki" placeholder="Lütfen şarkının URL bağlantısını giriniz...">
                    
                <button type="submit" class="btn btn-primary">Gönder</button>
            </div>
        </form>
        </div>
    
    </div>
</div>
<?php include './footer.php';?>