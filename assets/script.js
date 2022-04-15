$(document).ready(function() {
  $(".select2").select2();
  var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timerProgressBar: true,
    timer: 5000
  });

  //   Swal Bootstrap btn
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger"
    },
    buttonsStyling: true
  });

  // Function of Table Data Table
  function datatable(id) {
    $(id)
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        retrieve: true,
        paging: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo(id + "_wrapper .col-md-6:eq(0)");
  }
  // Delete Data Function
  function deleteData(action, id, fetchFunction) {
    swalWithBootstrapButtons
      .fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
      })
      .then(result => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "lib/action.php",
            data: { action: action, id: id },
            success: function(response) {
              // console.log(response);
              swalWithBootstrapButtons.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
              );
              fetchFunction();
            }
          });
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            "Cancelled",
            "Your imaginary file is safe :)",
            "error"
          );
        }
      });
  }

  // Logout Operation
  $("#logout").click(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "logout" },
      success: function(response) {
        Toast.fire({
          icon: "success",
          title: "Logout Successfully...!"
        });
        setTimeout(() => {
          window.location = "index.php";
        }, 1000);
      }
    });
  });

  /*********************** Category Section **************************************/

  //   Fetch Category
  fetchCategory();
  function fetchCategory() {
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "fetchCategory" },
      success: function(response) {
        $("#category_table_body").html(response);
        datatable("#category_table");
      }
    });
  }

  // Add Category
  $("#category_add_btn").click(function(e) {
    $("#category_add_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#category_add_form").serialize() + "&action=add_category",
      success: function(response) {
        $("#category_add_btn").val("Add Category");
        $("#category_add_form")[0].reset();
        $("#add_category_modal").modal("hide");
        if (response == "insert") {
          Toast.fire({
            icon: "success",
            title: "Category Added Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchCategory();
      }
    });
  });

  // Edit Category
  $("body").on("click", ".editCategory", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "edit_category", id: id },
      success: function(response) {
        data = JSON.parse(response);
        $("#id").val(data.category_id);
        $("#category_name").val(data.category_name);
        if (data.category_status === "Enable") {
          $("#customSwitch4").prop("checked", true);
        } else {
          $("#customSwitch4").prop("checked", false);
        }
      }
    });
  });

  // Update Category
  $("#category_update_btn").click(function(e) {
    $("#category_update_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#category_edit_form").serialize() + "&action=update_category",
      success: function(response) {
        // console.log(response);
        $("#category_update_btn").val("Update Category");
        $("#category_edit_form")[0].reset();
        $("#edit_category_modal").modal("hide");
        if (response == "update") {
          Toast.fire({
            icon: "success",
            title: "Category Updated Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchCategory();
      }
    });
  });

  // Delete Category
  $("body").on("click", ".dltCategory", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    deleteData("dltCategory", id, fetchCategory);
  });

  /*********************** Author Section **************************************/

  //   Fetch Author
  fetchAuthor();
  function fetchAuthor() {
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "fetchAuthor" },
      success: function(response) {
        $("#author_table_body").html(response);
        datatable("#author_table");
      }
    });
  }

  // Add Author
  $("#author_add_btn").click(function(e) {
    $("#author_add_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#author_add_form").serialize() + "&action=add_author",
      success: function(response) {
        $("#author_add_btn").val("Add Author");
        $("#author_add_form")[0].reset();
        $("#add_author_modal").modal("hide");
        if (response == "insert") {
          Toast.fire({
            icon: "success",
            title: "Author Added Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchAuthor();
      }
    });
  });

  // Edit AUthor
  $("body").on("click", ".editauthor", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "edit_author", id: id },
      success: function(response) {
        data = JSON.parse(response);
        $("#id").val(data.author_id);
        $("#author_name").val(data.author_name);
        if (data.author_status === "Enable") {
          $("#customSwitch4").prop("checked", true);
        } else {
          $("#customSwitch4").prop("checked", false);
        }
      }
    });
  });

  // Update Author
  $("#author_update_btn").click(function(e) {
    $("#author_update_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#author_edit_form").serialize() + "&action=update_author",
      success: function(response) {
        // console.log(response);
        $("#author_update_btn").val("Update Author");
        $("#author_edit_form")[0].reset();
        $("#edit_author_modal").modal("hide");
        if (response == "update") {
          Toast.fire({
            icon: "success",
            title: "Author Updated Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchAuthor();
      }
    });
  });

  // Delete Author
  $("body").on("click", ".dltauthor", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    deleteData("dltAuthor", id, fetchAuthor);
  });

  /*********************** Location Rack Section **************************************/

  // Fetch Location Rack
  fetchLocation_rack();
  function fetchLocation_rack() {
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "fetchLocation_rack" },
      success: function(response) {
        $("#location_rack_table_body").html(response);
        datatable("#location_rack_table");
      }
    });
  }

  // Add Location Rack
  $("#location_rack_add_btn").click(function(e) {
    $("#location_rack_add_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data:
        $("#location_rack_add_form").serialize() + "&action=add_location_rack",
      success: function(response) {
        $("#location_rack_add_btn").val("Add Location Rack");
        $("#location_rack_add_form")[0].reset();
        $("#add_location_rack_modal").modal("hide");
        if (response == "insert") {
          Toast.fire({
            icon: "success",
            title: "Location Rack Added Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchLocation_rack();
      }
    });
  });

  // Edit location rack
  $("body").on("click", ".editlocation_rack", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "edit_location_rack", id: id },
      success: function(response) {
        data = JSON.parse(response);
        $("#id").val(data.location_rack_id);
        $("#location_rack_name").val(data.location_rack_name);
        if (data.location_rack_status === "Enable") {
          $("#customSwitch4").prop("checked", true);
        } else {
          $("#customSwitch4").prop("checked", false);
        }
      }
    });
  });

  // Update Location Rack
  $("#location_rack_update_btn").click(function(e) {
    $("#location_rack_update_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data:
        $("#location_rack_edit_form").serialize() +
        "&action=update_location_rack",
      success: function(response) {
        // console.log(response);
        $("#location_rack_update_btn").val("Update Location Rack");
        $("#location_rack_edit_form")[0].reset();
        $("#edit_location_rack_modal").modal("hide");
        if (response == "update") {
          Toast.fire({
            icon: "success",
            title: "Location Rack Updated Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchLocation_rack();
      }
    });
  });

  // Delete Location Rack
  $("body").on("click", ".dltlocation_rack", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    deleteData("dltLocation_rack", id, fetchLocation_rack);
  });

  /*********************** Book Section **************************************/

  // Fetch Book
  fetchBook();
  function fetchBook() {
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "fetchBook" },
      success: function(response) {
        $("#book_table_body").html(response);
        datatable("#book_table");
      }
    });
  }

  // Add Book
  $("#book_add_btn").click(function(e) {
    $("#book_add_btn").val("Please Wait...");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: $("#book_add_form").serialize() + "&action=add_book",
      success: function(response) {
        $("#book_add_btn").val("Add Location Rack");
        $("#book_add_form")[0].reset();
        $("#add_book_modal").modal("hide");
        if (response == "insert") {
          Toast.fire({
            icon: "success",
            title: "Book Added Successfully!"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response
          });
        }
        fetchBook();
      }
    });
  });

  // Edit Book
  $("body").on("click", ".editbook", function(e) {
    e.preventDefault();
    id = $(this).attr("id");
    $.ajax({
      type: "POST",
      url: "lib/action.php",
      data: { action: "edit_book", id: id },
      success: function(response) {
        data = JSON.parse(response);
        $("#id").val(data.book_id);
        $("#book_name").val(data.book_name);
        $('#book_author option[value="' + data.book_author + '"]').prop("selected", true);
        $('#book_author_badge').text(data.book_author);
        $('#book_category option[value="' + data.book_category + '"]').prop("selected", true);
        $('#book_category_badge').text(data.book_category);
        $('#book_location_rack option[value="' + data.book_location_rack + '"]').prop("selected", true);
        $('#book_location_rack_badge').text(data.book_location_rack);
        $("#book_isbn_number").val(data.book_isbn_number);
        $("#book_no_of_copy").val(data.book_no_of_copy);
        if (data.book_status === "Enable") {
          $("#customSwitch4").prop("checked", true);
        } else {
          $("#customSwitch4").prop("checked", false);
        }
      }
    });
  });
});
