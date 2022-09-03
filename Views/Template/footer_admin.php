   
    <!-- Essential javascripts for application to work-->
    <script src="<?= JS; ?>/jquery-3.3.1.min.js"></script>

    <script src="<?= JS; ?>/popper.min.js"></script>
    <script src="<?= JS; ?>/popper.min.js.map"></script>
    <script src="<?= JS; ?>/bootstrap.min.js"></script>
    <script src="<?= JS; ?>/main.js"></script>
    <script src="<?= JS; ?>/fontawesome.js"></script>
    <script src="<?= JS; ?>/functions_admin.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= JS; ?>/plugins/pace.min.js"></script>

    <!-- Noty plugin -->
    <script src="<?= PLUGINS; ?>/notify/noty.min.js"></script>
    <script src="<?= PLUGINS; ?>/notify/noty.min.js.map"></script>

    <script src="<?= PLUGINS; ?>/select2-4.0.13/dist/js/select2.min.js"></script>

    <!-- Url para javascritp -->
    <script>
      const base_url = "<?= BASE_URL?>";
    </script>
    

    <!-- Data table plugins -->
    <script type="text/javascript" src="<?=DATATABLE?>/datatables.min.js"></script>

    <!-- Scripts por parametros a un controlador -->
    <script src="<?= APP ?>/js<?=$data['function_js']?>"></script>

    <!-- Scripts para graficos  Chartjs -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.esm.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/helpers.esm.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>