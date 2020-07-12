function ajax_form(form) {
  var btn = form.find(":submit");
	/*var btnText = btn.html();
	btn.html(btn.data("ing"));*/
	btn.prop("disabled", true);
  var formdata = false;
  if (window.FormData) {
    formdata = new FormData(form[0]);
  }
  $.ajax({
    url: form.attr("action"),
    data: formdata ? formdata : form.serialize(),
    cache: false,
    contentType: false,
    processData: false,
    type: "POST",
    success: function (data) {
      console.log(data);
      data = JSON.parse(data);
      if (data.success) {
        toastr.success(data.message);
        form[0].reset();
        if (form.data("type") == "login") {
          window.location.reload();
        }
        if (form.data("type") == "table") {
          table.ajax.reload();
        }
      } else {
        toastr.error(data.message);
      }
			btn.prop("disabled", false);
      //return data;
      /*btn.html(btnText);
			$("#extra_fields").hide();
			$("#message").html("Product inserted");
			data = JSON.parse(data);
                if (data['status'] == true) {
                    $('#id').val(data['id']);
                    submitbtn.prop('disabled', false);
                    $.notify("Successfuly submitted", {
                        className: 'success',
                        globalPosition: 'right bottom'
                    });
                } */
    },
  });
}
function slugify(slug) {
  return slug
    .trim()
    .replace(/[^a-z0-9-]/gi, "-")
    .replace(/-+/g, "-")
    .replace(/^-|-$/g, "")
    .toLowerCase();
}
$(document).on("submit", ".ajax-form", function () {
  event.preventDefault();
  ajax_form($(this));
});
$(document).on("click", ".modal-dismiss", function () {
  jQuery.noConflict();
  $(this).parents(".modal").modal("hide");
});
