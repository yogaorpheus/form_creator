    <section class="content-header">
      <h1>
        Pengaturan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form id="" action="<?php echo base_url('pengaturan/insert_input_type'); ?>" method="POST">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pengaturan Tipe Input pada HTML</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                
                <div class="row">
                  <div class="col-md-3 form-group">
                    <label>Jenis Tag</label>
                    <select class="form-control select2" style="width: 100%;" name="tag">
                      <?php
                      foreach ($tags as $key => $one_tag) {
                        echo "<option value='".$one_tag['id_tag']."'>";
                        echo $one_tag['show_tag'];
                        echo "</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-3 form-group">
                    <label>Syntax Type</label><br>
                    <input class="form-control" type="text" name="code_input_type" />
                  </div>

                  <div class="col-md-3 form-group">
                    <label>Nama Type</label><br>
                    <input class="form-control" type="text" name="show_input_type" />
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary pull-left">Tambah Pengaturan</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })

    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })

  });
</script>