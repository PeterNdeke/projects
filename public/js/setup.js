(function($) {
    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            industry: {
                required: true
            },
            jobtitle: {
                required: true
            },
            company: {
                required: true
            },
            membershiptype: {
                required: true
            },
            interest: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                email:
                    'Not a valid email address <i class="zmdi zmdi-info"></i>'
            }
        },
        onfocusout: function(element) {
            $(element).valid();
        }
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        labels: {
            previous: "Previous",
            next: "Next",
            finish: "Submit",
            current: ""
        },
        titleTemplate:
            '<div class="title"><span class="number">#index#</span>#title#</div>',
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            // console.log(form.steps("getCurrentIndex"));
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            // console.log(getCurrentIndex);
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        }
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    $.dobPicker({
        daySelector: "#expiry_date",
        monthSelector: "#expiry_month",
        yearSelector: "#expiry_year",
        dayDefault: "DD",
        yearDefault: "YYYY",
        minimumAge: 0,
        maximumAge: 120
    });

    $("#password").pwstrength();

    $("#button").click(function() {
        $("input[type='file']").trigger("click");
    });

    $("input[type='file']").change(function() {
        $("#val").text(this.value.replace(/C:\\fakepath\\/i, ""));
    });

    $(".imgAdd").click(function() {
        $(this)
            .closest(".row")
            .find(".imgAdd")
            .before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
    });
    $(document).on("click", "i.del", function() {
        $(this)
            .parent()
            .remove();
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) {
                // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() {
                    // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile
                        .closest(".imgUp")
                        .find(".imagePreview")
                        .css("background-image", "url(" + this.result + ")");
                };
            }
        });
    });
})(jQuery);
