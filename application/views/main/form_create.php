    <section class="content-header">
      <h1>
        Membuat Form HTML
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <a href="<?php echo base_url('pengaturan/set_attribute'); ?>"><button type="button" class="btn btn-warning pull-right">Set Attribute</button></a>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Atur Form HTML mu sebebas mungkin!</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body" id="form_generator"></div>
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
                  <div class="col-md-12" id="formResult"></div>
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
  // Global variable initialization
  var allType;
  var allAttribute;
  var fieldWrapper;
  var mainField;
  var secondField;
  var extraField;
  var typeSelector;
  var attributeFixed;
  var fieldLabel;

  var previewInput;
  // Stop here

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

  function prepareRadioInput(secondField, intId) {
    divInputNum = $("<div class='form-group'><label>Total Radio Button</label></div>");
    inputNum = $("<input type='number' class='form-control inputNum' min='1'>");
    divInputNum.append(inputNum);
    divInputValues = $("<div class='form-group radioValues'><label>Values</label></div>");

    inputNum.change(function() {
      parentField = $(this).parents("div.oneInput").find("div.radioValues");
      parentField.empty();
      parentField.append("<label>Values</label>");
      totalRadioButton = $(this).val();

      if (totalRadioButton < 1) {
        $(this).val(1);
        totalRadioButton = $(this).val();
      }

      countRadioButton = 1;
      while (countRadioButton <= totalRadioButton) {
        valueRadioButton = $("<input type='text' class='form-control' id='radioButtonValue"+intId+"_"+countRadioButton+"'>");
        countRadioButton += 1;
        parentField.append(valueRadioButton);
        parentField.append("<br>");
      }
    });

    secondField.append(divInputNum);
    secondField.append(divInputValues);

    return secondField;
  }

  function prepareSelectInput(secondField, intId) {
    divInputNum = $("<div class='form-group'><label>Total Option</label></div>");
    inputNum = $("<input type='number' class='form-control inputNum' min='1'>");
    divInputNum.append(inputNum);
    divInputValues = $("<div class='form-group optionValues'><label>Option Values</label></div>");

    inputNum.change(function() {
      parentField = $(this).parents("div.oneInput").find("div.optionValues");
      parentField.empty();
      parentField.append("<label>Option Values</label>");
      totalOption = $(this).val();

      if (totalOption < 1) {
        $(this).val(1);
        totalOption = $(this).val();
      }
      countOption = 1;
      while (countOption <= totalOption) {
        valueOption = $("<input type='text' class='form-control' id='valueOption"+intId+"_"+countOption+"'>");
        countOption += 1;
        parentField.append(valueOption);
        parentField.append("<br>");
      }
    });

    secondField.append(divInputNum);
    secondField.append(divInputValues);

    return secondField;
  }

  function prepareTextareaInput(secondField) {
    divInputRow = $("<div class='form-group'><label>Row (Optional)</label></div>");
    inputRow = $("<input type='number' class='form-control inputRow' min='1'>");
    divInputRow.append(inputRow);

    inputRow.change(function() {
      rowTextArea = inputRow.val();

      if (rowTextArea < 1) {
        inputRow.val(1);
        rowTextArea = inputRow.val();
      }
    })

    secondField.append(divInputRow);

    return secondField;
  }

  function prepareHiddenInput(secondField) {
    parentField = secondField.parents("div.oneInput");
    parentField.find("select.attributeFixed").prop("disabled", true);

    divInputValue = $("<div class='form-group'><label>Input Value</label></div>");
    inputValue = $("<input type='text' class='form-control inputValue'>");
    divInputValue.append(inputValue);
    secondField.append(divInputValue);

    return secondField;
  }

  function showTextareaInput(tagName, closingTagName, nameField, fixedAttributeName) {
    rowTextArea = previewInput.find("input.inputRow").first().val();
    inputSyntax = $("<"+tagName+" class='form-control' name='"+nameField+"' row='"+rowTextArea+"' "+fixedAttributeName+">"+closingTagName);

    return inputSyntax;
  }

  function showSelectInput(tagName, closingTagName, nameField, fixedAttributeName) {
    inputSyntax = $("<"+tagName+" class='form-control select2' name='"+nameField+"' "+fixedAttributeName+">"+closingTagName);
    totalOption = previewInput.find("input.inputNum").first().val();
    idInput = previewInput.data("idx");

    for (count = 1; count <= totalOption; count++)
    {
      optionValue = $("#valueOption"+idInput+"_"+count).val();
      optionSyntax = $("<option value='"+optionValue+"'>"+optionValue+"</option>");
      inputSyntax.append("\n\t\t");
      inputSyntax.append(optionSyntax);
    }
    inputSyntax.append("\n\t");

    return inputSyntax;
  }

  function showRadioButtonInput(tagName, typeName, nameField, fixedAttributeName, field_div) {
    totalRadioButton = previewInput.find("input.inputNum").first().val();
    idInput = previewInput.data("idx");
    
    for (count = 1; count <= totalRadioButton; count++)
    {
      radioButtonValue = $("#radioButtonValue"+idInput+"_"+count).val();
      divRadioButton = $("<div class='radio'></div>");
      radioButtonSyntax = $("<label><"+tagName+" type='"+typeName+"' value='"+radioButtonValue+"' name='"+nameField+"'>"+radioButtonValue+"</label>");
      divRadioButton.append("\n\t\t\t");
      divRadioButton.append(radioButtonSyntax);
      divRadioButton.append("\n\t\t");
      field_div.append("\n\t\t");
      field_div.append(divRadioButton);
      // field_div.append(radioButtonValue);
    }

    return field_div;
  }

  function showHiddenInput(tagName, typeName, nameField, field_div) {
    inputValue = previewInput.find("input.inputValue").val();
    inputSyntax = $("<"+tagName+" type='"+typeName+"' name='"+nameField+"' value='"+inputValue+"'>");
    field_div.append("\n\t");
    field_div.append(inputSyntax);

    return field_div;
  }

  function showCheckboxInput(tagName, typeName, nameField, labelField, field_div) {
    divCheckboxInput = $("<div class='checkbox'></div>");
    checkboxInputSyntax = $("<label><"+tagName+" type='"+typeName+"' name='"+nameField+"'>"+labelField+"</label>");

    divCheckboxInput.append("\n\t\t");
    divCheckboxInput.append(checkboxInputSyntax);
    divCheckboxInput.append("\n\t");

    field_div.append("\n\t");
    field_div.append(divCheckboxInput);

    return field_div;
  }

  function prepareMainField(intId) {
    mainField = $("<div class='col-md-3'></div>");
      
      var divTypeSelector = $("<div class='form-group'><label>Field Type</label></div>");
      typeSelector = $("<select class='form-control select2 inputType' id='inputType"+intId+"' style='width: 100%;'></select>");
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
      divTypeSelector.append(typeSelector);

      var divAttributeFixed = $("<div class='form-group'><label>Field Attribute</label></div>");
      attributeFixed = $("<select class='form-control select2 attributeFixed'></select>");
      <?php
        foreach ($attributes as $key => $one_attr) {
        ?>
          idValue = <?php echo $one_attr['id_attribute']; ?>;
          nameValue = "<?php echo $one_attr['show_attribute']; ?>";
          attrOption = $("<option value='"+idValue+"'>"+nameValue+"</option>");
          attributeFixed.append(attrOption);
        <?php
        }
      ?>
      divAttributeFixed.append(attributeFixed);

      fieldLabel = $("<div class='form-group'><label>Field Name</label><br><input type='text' class='form-control fieldLabel' /></div>");
      mainField.append(divTypeSelector);
      mainField.append(fieldLabel);
      mainField.append(divAttributeFixed);
    //return mainField;
  }

  function prepareSecondField() {
    secondField = $("<div class='col-md-3 secondField'></div>");

    typeSelector.change(function() {
      $(this).parents("div.oneInput").find("select.attributeFixed").prop("disabled", false);
      secondField = $(this).parents("div.oneInput").find("div.secondField");
      secondField.empty();
            
      intId = $(this).parents("div.oneInput").data("idx");
      idValue = $(this).parents("div.oneInput").find("select.inputType").val();
      nameValue = allType[idValue].code_input_type;
                
      switch (nameValue) {
        case "radio":
          secondField = prepareRadioInput(secondField, intId);
          break;
        case "hidden":
          secondField = prepareHiddenInput(secondField);
          break;
        case "textarea":
          secondField = prepareTextareaInput(secondField);
          break;
        case "select":
          secondField = prepareSelectInput(secondField, intId);
          break;
        default:
          break;
      }  
    })
    //return secondField;
  }

  function prepareExtraField() {
    extraField = $("<div class='col-md-3' extraField></div>");

    //return extraField;
  }

  $(document).ready(function() {
    allType = <?php echo json_encode($input_type); ?>;
    allAttribute = <?php echo json_encode($attributes); ?>;
    allTag = <?php echo json_encode($tags); ?>;

    $("#add_element").click(function() {
        var lastField = $("#form_generator div.oneInput:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        
        fieldWrapper = $("<div class='row oneInput' id='input"+intId+"'></div>");
        fieldWrapper.data("idx", intId);
        console.log(intId);
        
        prepareMainField(intId);
        prepareSecondField();
        prepareExtraField();

        var removeButton = $("<div class='col-md-3 form-group'><button type='button' class='btn btn-danger pull-right' value='Remove'>Hapus</button></div>");
        removeButton.click(function() {
            $(this).parent().remove();
        });

        fieldWrapper.append(mainField);
        fieldWrapper.append(secondField);
        fieldWrapper.append(extraField);
        fieldWrapper.append(removeButton);
        fieldWrapper.append("<div class='col-md-12'><hr></div>");

        $("#form_generator").append(fieldWrapper);
        $(".select2").select2();
    });

    $("#preview_form").click(function() {
        // $(".fieldResult").remove();
        $("#formResult").empty();
        // var parentField = $("#parentResult");
        // parentField.append("<div class='col-md-12' id='formResult'></div>");

        var fieldSet = $("#formResult");
        
        $("#form_generator div.oneInput").each(function() {
            console.log("COUNT");
            field_div = $("<div class='form-group fieldResult'></div>")
            idField = $(this).attr("id");

            needLabel = true;
            labelField = $(this).find("input.fieldLabel").first().val();
            typeField = $(this).find("select.inputType").first().val();
            
            nameField = labelField.toLowerCase();
            nameField = nameField.replace(" ", "_");

            idTag = allType[typeField].id_tag;
            tagName = allTag[idTag].code_tag;
            closingTagName = allTag[idTag].closing_tag;
            typeName = allType[typeField].code_input_type;

            if (typeName == "hidden" || typeName == "checkbox") {
              console.log("MASUK HIDDEN atau CHECKBOX");
              needLabel = false;
            }
            
            if (typeName != "hidden") {
              fixedAttributeField = $(this).find("select.attributeFixed").first().val();
              fixedAttributeName = allAttribute[fixedAttributeField].code_attribute;
              inputSyntax = $("<"+tagName+" type='"+typeName+"' class='form-control' name='"+nameField+"' "+fixedAttributeName+">"+closingTagName);
            }
            
            previewInput = $(this);

            labelSyntax = $("<label for=\"" + idField + "\">" + labelField + "</label>");

            switch(tagName) {
              case "textarea":
                inputSyntax = showTextareaInput(tagName, closingTagName, nameField, fixedAttributeName);
                break;
              case "select":
                inputSyntax = showSelectInput(tagName, closingTagName, nameField, fixedAttributeName);
                break;
              default:
                break;
            }
            
            if (needLabel) {
              field_div.append("\n\t");
              field_div.append(labelSyntax);
            }
            
            switch(typeName) {
              case "radio":
                field_div = showRadioButtonInput(tagName, typeName, nameField, fixedAttributeName, field_div);
                break;
              case "hidden":
                field_div = showHiddenInput(tagName, typeName, nameField, field_div);
                break;
              case "checkbox":
                field_div = showCheckboxInput(tagName, typeName, nameField, labelField, field_div);
                break;
              default:
                field_div.append("\n\t");
                field_div.append(inputSyntax);
                break;
            }

            field_div.append("\n");
            fieldSet.append(field_div);
            fieldSet.append("\n");
        });
        
        var syntax = $("#formResult").html();
        $("#syntax_code").val(syntax);
    });
  });
</script>