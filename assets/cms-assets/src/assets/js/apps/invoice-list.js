var invoiceList = $("#invoice-list").DataTable({
  dom:
    "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f<'dt-action-buttons align-self-center'B>>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
  headerCallback: function (e) {
    e.getElementsByTagName("th")[0].innerHTML = `
        <div class="form-check form-check-primary d-block new-control">
          <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
        </div>`;
  },
  buttons: [
    {
      text: "Add New",
      className: "btn btn-primary mb-2 me-2",
      action: function () {
        $("#registerUserModal").modal("show");
      },
    },
    {
      text: "Delete Selected",
      className: "btn btn-danger mb-2",
      attr: {
        id: "bulkDeleteBtn",
      },
    },
  ],
  order: [[1, "asc"]],
  oLanguage: {
    oPaginate: {
      sPrevious: '<svg ... class="feather feather-arrow-right">...</svg>',
      sNext: '<svg ... class="feather feather-arrow-left">...</svg>',
    },
    sInfo: "Showing page _PAGE_ of _PAGES_",
    sSearch: '<svg ... class="feather feather-search">...</svg>',
    sSearchPlaceholder: "...Search",
    sLengthMenu: "Results: _MENU_",
  },
  stripeClasses: [],
  lengthMenu: [7, 10, 20, 50],
  pageLength: 10,
});
// Bulk delete button logic
$(document).on("click", "#bulkDeleteBtn", function () {
  const checked = $(".row-check:checked");
  if (checked.length === 0) {
    Swal.fire({
      icon: "warning",
      title: "No users selected",
      text: "Please select at least one user to delete.",
      confirmButtonText: "OK",
    });
    return;
  }
  const userIds = [];
  const userNames = [];
  checked.each(function () {
    userIds.push($(this).val());
    const usernameText = $(this)
      .closest("tr")
      .find("p.text-muted")
      .text()
      .trim();
    if (usernameText) userNames.push(usernameText);
  });
  Swal.fire({
    title: "Are you sure?",
    text: `Delete the following users: ${userNames.join(", ")}`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e7515a",
    cancelButtonColor: "#888ea8",
    confirmButtonText: "Yes, delete",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "/admin/delete_users",
        method: "POST",
        data: { user_ids: userIds },
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            checked.each(function () {
              invoiceList.row($(this).closest("tr")).remove().draw(false);
            });
            Swal.fire("Deleted!", response.message, "success");
          } else {
            Swal.fire("Error", response.message, "error");
          }
        },
        error: function () {
          Swal.fire("Error", "Something went wrong.", "error");
        },
      });
    }
  });
});
// Single delete
$(document).on("click", ".action-delete", function () {
  const $row = $(this).closest("tr");
  const userId = $row.find(".row-check").val();
  const username = $row.find("p.text-muted").text().trim();
  Swal.fire({
    title: "Are you sure?",
    text: `Delete user ${username}?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#e7515a",
    cancelButtonColor: "#888ea8",
    confirmButtonText: "Yes, delete",
    cancelButtonText: "Cancel",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "/admin/delete_users",
        method: "POST",
        data: { user_ids: [userId] },
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            invoiceList.row($row).remove().draw(false);
            Swal.fire("Deleted!", response.message, "success");
          } else {
            Swal.fire("Error", response.message, "error");
          }
        },
        error: function () {
          Swal.fire("Error", "Something went wrong.", "error");
        },
      });
    }
  });
});
// Checkbox logic
$(document).on("change", "#form-check-default, #check-all", function () {
  $(".row-check").prop("checked", this.checked);
});
$(document).on("change", ".row-check", function () {
  const allChecked = $(".row-check").length === $(".row-check:checked").length;
  $("#form-check-default").prop("checked", allChecked);
});
$(document).ready(function () {
  // Your existing DataTable setup stays as-is above this block
  // ✅ This replaces your previous #registerForm submit handler
  $("#registerForm")
    .off("submit")
    .on("submit", function (e) {
      e.preventDefault();
      let form = this;
      let formData = new FormData(form);
      $.ajax({
        url: $(form).attr("action"),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            Swal.fire({
              icon: "success",
              title: "Success!",
              html: response.message,
              timer: 2000,
              showConfirmButton: false,
            });
            $("#registerUserModal").modal("hide");
            invoiceList.draw(false);
            form.reset();
          } else {
            Swal.fire({
              icon: "error",
              title: "Registration Failed",
              html: response.message,
            });
          }
        },
        error: function () {
          Swal.fire({
            icon: "error",
            title: "Server Error",
            text: "Could not register user. Try again.",
          });
        },
      });
    });
  // ✅ All your other DataTable logic stays below or above this — unchanged
});
