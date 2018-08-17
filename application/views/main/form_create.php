    <section class="content-header">
      <h1>
        Membuat Form HTML
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Atur Form HTML mu sebebas mungkin!</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body" id="form_generator">
                
              </div>

              <div class="box-footer">
                <div class="col-md-12">
                  <button id="add_element" type="button" class="btn btn-primary pull-left">Tambah Field</button>
                  <button id="preview_form" type="button" class="btn btn-success pull-right">Lihat Form</button>
                </div>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Hasil Form</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body" id="formPreview">
                
                <div class="row" id="parentResult">
                  <div class="col-md-12" id="formResult">

                  </div>
                </div>
              </div>
            </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Syntax Form</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>

              <div class="box-body" id="formPreview">
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Syntax Code</label>
                      <textarea class="form-control" id="syntax_code" rows="10" readonly></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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

  $(document).ready(function() {
    
    $("#add_element").click(function() {
        var lastField = $("#form_generator div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        
        var fieldWrapper = $("<div class='row' id='input"+intId+"'></div>");
        fieldWrapper.data("idx", intId);
        
        var fieldType = $("<div class='col-md-3 form-group'><label>Jenis Field</label></div>");
          var typeSelector = $("<select class='form-control select2 inputType' style='width: 100%;'></select>");
          <?php
          foreach ($input_type as $key => $one_type) {
            ?>
            idValue = <?php echo $one_type['id_input_type']; ?>;
            nameValue = "<?php echo $one_type['show_input_type']; ?>"; 
            typeOption = $("<option value='"+idValue+"'>"+nameValue+"</option>");
            typeSelector.append(typeOption);
            <?php
          }
          ?>
          fieldType.append(typeSelector);

        var columnMaker = $("<div class='col-md-3'></div>");
          var fieldLabel = $("<div class='form-group'><label>Label Field</label><br><input type='text' class='form-control fieldLabel' /></div>");
          var fieldName = $("<div class='form-group'><label>Nama Field</label><input type='text' class='form-control fieldName' /></div>");
          columnMaker.append(fieldLabel);
          columnMaker.append(fieldName);

        var removeButton = $("<div class='col-md-3 form-group'><button type='button' class='btn btn-danger pull-right' value='Remove'>Hapus</button></div>");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fieldType);
        fieldWrapper.append(columnMaker);
        fieldWrapper.append(removeButton);

        $("#form_generator").append(fieldWrapper);
        $(".select2").select2();
    });

    $("#preview_form").click(function() {
        $(".fieldResult").remove();
        var fieldSet = $("#formResult");
        
        $("#form_generator div.row").each(function() {
            console.log("COUNT");
            field_div = $("<div class='form-group fieldResult'></div>")
            idField = $(this).attr("id");
            labelField = $(this).find("input.fieldLabel").first().val();
            nameField = $(this).find("input.fieldName").first().val();
            typeField = $(this).find("select.inputType").first().val();

            var tagName = "";
            var typeName = "";
            var closingTagName = "";

            <?php
            $id_tag = 0;
            foreach ($input_type as $key => $onetype) {
              ?>
              if (typeField == <?php echo $onetype['id_input_type']; ?>)
              {
                typeName = "<?php echo $onetype['code_input_type']; ?>";
                <?php $id_tag = $onetype['id_tag']; ?>
                tagName = "<?php echo $tags[$id_tag]['code_tag']; ?>";
                closingTagName = "<?php echo $tags[$id_tag]['closing_tag']; ?>";
              }
              <?php
            }
            ?>

            labelSyntax = $("<label for=\"" + idField + "\">" + labelField + "</label>");
            inputSyntax = $("<"+tagName+" type='"+typeName+"' class='form-control' name='"+nameField+"'>"+closingTagName);
            
            field_div.append(labelSyntax);
            field_div.append(inputSyntax);
            fieldSet.append(field_div);
            fieldSet.append("\n");
        });

        //console.log($("#formResult").html());
        var syntax = $("#formResult").html();
        // syntax = syntax.split('\n').join('');

        console.log(syntax);
        $("#syntax_code").val(syntax);
    });
  });
</script>