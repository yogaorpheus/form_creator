    <section class="content-header">
      <h1>
        Pengaturan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form id="" action="<?php echo base_url('pengaturan/insert_set_attribute'); ?>" method="POST">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Pengaturan Input dan Attribute pada HTML</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body">
                
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>Tipe Input</label>
                    <select class="form-control select2" style="width: 100%;" name="input_type[]" multiple>
                      <?php
                      foreach ($input_type as $key => $one_type) {
                        echo "<option value='".$one_type['id_input_type']."'>";
                        echo $one_type['show_input_type'];
                        echo "</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-md-6 form-group">
                    <label>Atribut Input</label>
                    <select class="form-control select2" style="width: 100%;" name="attribute[]" multiple>
                      <?php
                      foreach ($attributes as $key => $one_attr) {
                        echo "<option value='".$one_attr['id_attribute']."'>";
                        echo $one_attr['show_attribute'];
                        echo "</option>";
                      }
                      ?>
                    </select>
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